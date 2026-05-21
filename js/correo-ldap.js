// js/correo-ldap.js

var ncorrLdapTimer         = null;
var ncorrLdapXhr           = null;
var ncorrLdapMaxReintentos = 3;
var ncorrLdapReintento     = 0;
var ncorrDominioDefault    = 'imss.gob.mx';
var ncorrBorrando          = false;   // true mientras el usuario borra con Backspace/Delete

// Detectar si el usuario está borrando para no autocompletar en ese caso
$(document).on('keydown', '#ncorr', function(e) {
    ncorrBorrando = (e.key === 'Backspace' || e.key === 'Delete');
});

/* ── toggleSinCorreo ─────────────────────────────────────────── */
function toggleSinCorreo(cb) {
    var $input = $('#ncorr');
    var $hint  = $('#ncorr_hint');
    var $fb    = $('#ncorr_ldap_feedback');

    if (cb.checked) {
        $input.val('sin@correo').prop('disabled', true);
        $hint.hide().html('');
        $fb.show().html(
            '<span style="color:#888;">'
            + '<span class="glyphicon glyphicon-minus-sign"></span> '
            + 'Sin correo institucional registrado.</span>'
        );
        $('#ldap_nombre').val('');
        clearTimeout(ncorrLdapTimer);
        if (ncorrLdapXhr) {
            ncorrLdapXhr.abort();
            ncorrLdapXhr = null;
        }
        ncorrLdapReintento = 0;
        $('#errorLogger4').html('');
    } else {
        $input.val('').prop('disabled', false).focus();
        $fb.hide().html('');
        $hint.hide().html('');
        $('#ldap_nombre').val('');
        ncorrLdapReintento = 0;
    }
}

/* ── correoMostrarHint (oninput) ─────────────────────────────────
   - Si el valor termina en '@' y NO se está borrando autocompleta dominio.
   - Si ya hay correo completo (tiene '@' con algo después) verifica LDAP.
   - Si se está borrando y el valor llega al '@' no hace nada (fix del bug). */
function correoMostrarHint() {
    var val = $.trim($('#ncorr').val());
    var $fb = $('#ncorr_ldap_feedback');

    clearTimeout(ncorrLdapTimer);

    if (val.length === 0) {
        $fb.hide().html('');
        $('#ldap_nombre').val('');
        return;
    }

    if (val.indexOf('@') !== -1) {

        // El usuario acaba de escribir '@' y no está borrando autocompletar
        if (val.slice(-1) === '@' && !ncorrBorrando) {
            val = val + ncorrDominioDefault;
            $('#ncorr').val(val);
        }

        // Verificar en LDAP solo si ya hay algo después del '@'
        var dominioParte = (val.split('@')[1] || '').trim();
        if (dominioParte.length > 0) {
            ncorrLdapReintento = 0;
            correoVerificarLdap(val);
        } else {
            // Queda 'usuario@' sin dominio todavía, esperar
            $fb.hide().html('');
            $('#ldap_nombre').val('');
        }

    } else {
        // Todavía escribe el usuario, sin '@' aún
        $fb.hide().html('');
        $('#ldap_nombre').val('');
    }
}

/* ── correoCompletarYValidar (onblur) ────────────────────────────
   - Si no tiene '@' autocompleta con el dominio por defecto y verifica.
   - Si termina en '@' agrega el dominio y verifica.
   - Si ya tiene correo completo verifica directamente. */
function correoCompletarYValidar() {
    var val = $.trim($('#ncorr').val());

    $('#ncorr_hint').hide().html('');

    if (val.length === 0) {
        $('#ncorr_ldap_feedback').hide().html('');
        $('#ldap_nombre').val('');
        return;
    }

    // Sin '@' autocompletar al salir del campo
    if (val.indexOf('@') === -1) {
        val = val + '@' + ncorrDominioDefault;
        $('#ncorr').val(val);
    }

    // Termina en '@' (sin dominio) agregar dominio
    if (val.slice(-1) === '@') {
        val = val + ncorrDominioDefault;
        $('#ncorr').val(val);
    }

    ncorrLdapReintento = 0;
    correoVerificarLdap(val);
}

/* ── correoVerificarLdap ─────────────────────────────────────────
   Busca el correo completo en LDAP (atributo mail). Sin restricción de dominio. */
function correoVerificarLdap(valor, esReintento) {
    clearTimeout(ncorrLdapTimer);
    if (ncorrLdapXhr) {
        ncorrLdapXhr.abort();
        ncorrLdapXhr = null;
    }

    if (!esReintento) {
        ncorrLdapReintento = 0;
    }

    valor = $.trim(valor);
    var $fb = $('#ncorr_ldap_feedback');

    if (valor.length === 0 || valor.indexOf('@') === -1) {
        $fb.hide().html('');
        $('#ldap_nombre').val('');
        return;
    }

    var msgVerificando = ncorrLdapReintento > 0
        ? '<span style="color:#888;"><span class="glyphicon glyphicon-refresh"></span> Reintentando...</span>'
        : '<span style="color:#888;"><span class="glyphicon glyphicon-refresh"></span> Verificando correo...</span>';

    $fb.show().html(msgVerificando);

    ncorrLdapTimer = setTimeout(function() {
        ncorrLdapXhr = $.ajax({
            url     : '/msicdi/helix/buscarLdap.html',
            type    : 'POST',
            data    : { email: valor },
            timeout : 10000,
            success : function(resp) {
                ncorrLdapXhr       = null;
                ncorrLdapReintento = 0;
                if (resp && resp.encontrado) {
                    $fb.html(
                        '<span style="color:#2e7d32;">'
                        + '<span class="glyphicon glyphicon-ok-circle"></span> '
                        + '<strong>Encontrado:</strong> ' + resp.displayname + '</span>'
                    );
                    $('#ldap_nombre').val(resp.displayname);
                    $('#errorLogger4').html('');
                } else {
                    $fb.html(
                        '<span style="color:#c62828;">'
                        + '<span class="glyphicon glyphicon-remove-circle"></span> '
                        + 'No se encontró el correo en el directorio.</span>'
                    );
                    $('#ldap_nombre').val('');
                }
            },
            error : function(xhr, status) {
                ncorrLdapXhr = null;
                if (status === 'abort') return;

                if (status === 'timeout' && ncorrLdapReintento < ncorrLdapMaxReintentos) {
                    ncorrLdapReintento++;
                    $fb.html(
                        '<span style="color:#e65100;">'
                        + '<span class="glyphicon glyphicon-time"></span> '
                        + 'Tiempo agotado. Reintentando ...</span>'
                    );
                    ncorrLdapTimer = setTimeout(function() {
                        correoVerificarLdap(valor, true);
                    }, 1000);
                    return;
                }

                ncorrLdapReintento = 0;
                var msg = (status === 'timeout')
                    ? 'Tiempo de espera agotado. No fue posible conectar con el directorio.'
                    : 'No se pudo consultar el directorio.';
                $fb.html(
                    '<span style="color:#c62828;">'
                    + '<span class="glyphicon glyphicon-warning-sign"></span> '
                    + msg + '</span>'
                );
                $('#ldap_nombre').val('');
            }
        });
    }, 300);
}