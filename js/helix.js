// js/helix.js

var helixTipoActivo        = 'wo';
var helixEncargadoAsignado = '';
var helixLoginReportador   = '';

function helixInit(encargado, loginReportador, sinCorreo) {
    helixEncargadoAsignado = encargado;
    helixLoginReportador   = loginReportador;

    $.getJSON('/msicdi/helix/personal.html', function(personal) {
        var selCliente  = $('#helix_sel_cliente');
        var selContacto = $('#helix_sel_contacto');

        selCliente.empty().append('<option value="">— Seleccione —</option>');
        selContacto.empty().append('<option value="">— Seleccione —</option>');

        $.each(personal, function(i, us) {
            var opt = $('<option>')
                .val(us.Matricula)
                .attr('data-login', us.login)
                .prop('selected', us.nom === helixEncargadoAsignado)
                .text(us.nom);

            selCliente.append(opt.clone());
            selContacto.append(opt);
        });

        if (helixEncargadoAsignado !== '' && selContacto.find('option:selected').val() !== '') {
            helixCargarLogin('contacto');
        }

        if (helixLoginReportador !== '' && helixLoginReportador !== 'sin') {
            $('#helix_login_cliente').val(helixLoginReportador);
        }
    });

    if (sinCorreo) {
        $('#helixMensaje')
            .addClass('mensaje-error')
            .html('<table><tbody><tr>'
                + '<td><img src="/msicdi/images/alert.png"></td>'
                + '<td><strong>&nbsp;&nbsp;Aviso:&nbsp;&nbsp;</strong></td>'
                + '<td>El reportador no tiene correo institucional registrado. '
                + 'Ingrese el ID Login Cliente manualmente.</td>'
                + '</tr></tbody></table>')
            .show();
    }
}

/* ── Tipo WO / Incidente ──────────────────────────────────────── */
function helixCambiarTipo(tipo) {
    helixTipoActivo = tipo;

    $('#btnTipoWO').toggleClass('helix-activo', tipo === 'wo');
    $('#btnTipoInc').toggleClass('helix-activo', tipo === 'incidente');

    var selOpe3 = $('#helix_cat_ope_3');

    if (tipo === 'incidente') {
        $('#helix_panel_impacto').show();
        $('#helix_panel_urgencia').show();
        selOpe3.empty().append('<option value="SOPORTAR" selected>SOPORTAR</option>');
    } else {
        $('#helix_panel_impacto').hide();
        $('#helix_panel_urgencia').hide();
        selOpe3.empty().append('<option value="CONFIGURAR" selected>CONFIGURAR</option>');
    }
}

/* ── Login desde dropdown ─────────────────────────────────────── */
function helixCargarLogin(tipo) {
    var sel   = (tipo === 'cliente') ? $('#helix_sel_cliente')   : $('#helix_sel_contacto');
    var input = (tipo === 'cliente') ? $('#helix_login_cliente') : $('#helix_login_contacto');
    var login = sel.find('option:selected').data('login') || '';

    if (login) {
        input.val(login);
    }
}

/* ── Recopilar datos del formulario ───────────────────────────── */
function helixRecopilarDatos() {
    var datos = {
        tipo           : helixTipoActivo,
        nRastreo       : $('#helix_nRastreo').val(),
        ticket_msl     : $('#helix_ticket').val(),
        proveedor      : $('#helix_proveedor').val(),
        resumen        : $.trim($('#helix_resumen').val()),
        notas          : $('#helix_notas').val(),
        nombre_prod    : $('#helix_nombre_prod').val(),
        prioridad      : $('#helix_prioridad').val(),
        cat_ope_1      : $('#helix_cat_ope_1').val(),
        cat_ope_2      : $('#helix_cat_ope_2').val(),
        cat_ope_3      : $('#helix_cat_ope_3').val(),
        cat_prod_1     : $('#helix_cat_prod_1').val(),
        cat_prod_2     : $('#helix_cat_prod_2').val(),
        cat_prod_3     : $('#helix_cat_prod_3').val(),
        login_cliente  : $.trim($('#helix_login_cliente').val()),
        login_contacto : $.trim($('#helix_login_contacto').val())
    };

    if (helixTipoActivo === 'incidente') {
        datos.impacto  = $('#helix_impacto').val();
        datos.urgencia = $('#helix_urgencia').val();
    }

    return datos;
}

/* ── Validación ───────────────────────────────────────────────── */
function helixValidar(datos) {
    if (datos.resumen.length === 0) {
        alert('El campo Resumen es obligatorio.');
        return false;
    }
    if (datos.login_cliente.length === 0 || datos.login_contacto.length === 0) {
        alert('Los campos ID Login Cliente e ID Login Contacto son obligatorios.');
        return false;
    }
    return true;
}

/* ── Paneles colapsables ──────────────────────────────────────── */
function helixTogglePanel(bodyId, heading) {
    var $body    = $('#' + bodyId);
    var $heading = $(heading);
    if ($body.is(':visible')) {
        $body.slideUp(200);
        $heading.addClass('collapsed');
    } else {
        $body.slideDown(200);
        $heading.removeClass('collapsed');
    }
}

/* ── Estados de la UI ─────────────────────────────────────────── */
function helixMostrarLoading() {
    $('#helixFormContenedor').hide();
    $('#helixExito').hide();
    $('#helixLoading').show();
}

function helixMostrarFormulario() {
    $('#helixLoading').hide();
    $('#helixExito').hide();
    $('#helixFormContenedor').show();
}

function helixMostrarExito(codigo) {
    $('#helixLoading').hide();
    $('#helixFormContenedor').hide();
    $('#helixCodigoMostrado').text(codigo || '(sin número)');
    $('#helixExito').show();
}

function helixCerrarYRecargar() {
    $('#divHelixWO').hide();
    location.reload();
}

function helixMostrarError(mensajeCompleto) {
    $('#helixLoading').hide();
    $('#helixFormContenedor').hide();
    $('#helixExito').hide();

    // Separar código y mensaje  →  "Error (10005): El cliente no existe…"
    var codigoMatch = mensajeCompleto.match(/Error\s*\((\d+)\)/i);
    var codigo      = codigoMatch ? 'Código Helix: ' + codigoMatch[1] : '';
    var texto       = mensajeCompleto.replace(/^"?(Error\s*\(\d+\):\s*)?/i, '').replace(/"$/, '');

    $('#helixErrorMensaje').text(texto || mensajeCompleto);
    $('#helixErrorCodigo').text(codigo).toggle(codigo !== '');
    $('#helixError').show();
}

function helixVolverFormulario() {
    $('#helixError').hide();
    $('#helixFormContenedor').show();
    $('#helixBtnEnviar').prop('disabled', false).text('Enviar a Helix');
}

/* ── Envío principal ──────────────────────────────────────────── */
function enviarHelixWO() {
    var datos = helixRecopilarDatos();
    if (!helixValidar(datos)) return;

    // Deshabilitar botón para evitar doble envío
    $('#helixBtnEnviar').prop('disabled', true).text('Enviando...');

    helixMostrarLoading();

    $.ajax({
        url      : '/msicdi/helix/enviar.html',
        type     : 'POST',
        data     : datos,
        dataType : 'json',
        timeout  : 40000,
        success: function(resp) {
        if (resp && resp.ok) {
            // ── Helix OK ──────────────────────────────────────────────
            helixMostrarExito(resp.codigoHelix || '');
            
            // ── Correo: aviso separado si falló ───────────────────────
            if (resp.correo_ok === false) {
                setTimeout(function() {
                    $('#helixAvisoCorreo')
                        .text('El ticket fue creado correctamente, pero no se pudo enviar el correo de notificación.')
                        .show();
                }, 300);
            }
        } else {
            var detalle = (resp && resp.mensajeHelix && resp.mensajeHelix !== '')
                ? resp.mensajeHelix
                : 'El servidor Helix rechazó la solicitud. Verifique los datos e intente nuevamente.';
            helixMostrarError(detalle);
            if (resp && resp.respuesta) {
                $('#helixXMLContenido').text(resp.respuesta);
            }
        }
    },
        error: function(xhr, status) {
            var msg = (status === 'timeout')
                ? 'La solicitud tardó demasiado. Verifique la conexión con el servidor Helix.'
                : 'Error de comunicación (' + status + '). Intente nuevamente.';

            helixMostrarError(msg);   //también para errores de red
        },
    });
}

/* ── Abrir / Cerrar panel ─────────────────────────────────────── */
function abrirHelixWO() {
    $('#rastreo-principal').hide();
    $('#control-rastreo').hide();
    $('#rastreo-mensajes').hide();
    $('#rastreo-respuesta').hide();
    $('#div-historial').hide();

    $('#helixError').hide();
    $('#helixExito').hide();
    $('#helixLoading').hide();
    $('#helixFormContenedor').show();

    $('#helixMensaje').hide().removeClass('mensaje-correcto mensaje-error').html('');
    $('#helixRespuestaXML').hide();
    $('#helixBtnEnviar').prop('disabled', false).text('Enviar a Helix');
    $('#divHelixWO').show();
}

function cerrarHelixWO() {
    $('#divHelixWO').hide();
    $('#rastreo-principal').show();
    $('#control-rastreo').show();
    $('#rastreo-mensajes').show();
    $('#rastreo-respuesta').show();
    $('#div-historial').show();
}