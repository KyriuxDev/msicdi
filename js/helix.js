// js/helix.js

var helixTipoActivo        = 'wo';
var helixEncargadoAsignado = '';
var helixLoginReportador   = '';

/* ── Mapa de categorías por servicio ─────────────────────────────
   Fuente: Informacion_integracion_MSL_Oaxaca.xlsx — hoja "Categorias"
   Para agregar o modificar un servicio solo editar este objeto
   (y el archivo protected/helix/categorias.php que es su espejo en PHP).
────────────────────────────────────────────────────────────────── */
var helixCategorias = {
    'OAX CAST': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'COMPUTO PERSONAL',
            cat_prod_3: 'PC'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'COMPUTO PERSONAL',
            cat_prod_3: 'PC'
        }
    },
    'OAX CORREO ELECTRONICO': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'SW TECNOLOGIA DE INFORMACION',
            cat_prod_2: 'MENSAJERIA INSTITUCIONAL',
            cat_prod_3: 'EXCHANGE'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'SW TECNOLOGIA DE INFORMACION',
            cat_prod_2: 'MENSAJERIA INSTITUCIONAL',
            cat_prod_3: 'EXCHANGE'
        }
    },
    'OAX DIRECTORIO ACTIVO': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'SW TECNOLOGIA DE INFORMACION',
            cat_prod_2: 'ARQUITECTURA DE SERVICIOS',
            cat_prod_3: 'ACTIVE DIRECTORY'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'SW TECNOLOGIA DE INFORMACION',
            cat_prod_2: 'ARQUITECTURA DE SERVICIOS',
            cat_prod_3: 'ACTIVE DIRECTORY'
        }
    },
    'OAX IMPRESION LOCAL': {
        wo: {
            cat_ope_1: 'INFRAESTRUCTURA DE COMPUTO E IMPRESION',
            cat_ope_2: 'IMPRESION',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'IMPRESION, FOTOCOPIADO Y DIGITALIZACION',
            cat_prod_3: 'IMPRESORA'
        },
        incidente: {
            cat_ope_1: 'INFRAESTRUCTURA DE COMPUTO E IMPRESION',
            cat_ope_2: 'IMPRESION',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'IMPRESION, FOTOCOPIADO Y DIGITALIZACION',
            cat_prod_3: 'IMPRESORA'
        }
    },
    'OAX NSSA': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'SW PRESTACIONES ECONOMICAS Y SOCIALES',
            cat_prod_2: 'SUBSIDIOS Y AYUDAS',
            cat_prod_3: 'NSSA'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'SW PRESTACIONES ECONOMICAS Y SOCIALES',
            cat_prod_2: 'SUBSIDIOS Y AYUDAS',
            cat_prod_3: 'NSSA'
        }
    },
    'OAX REDES Y CABLEADO': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'CABLEADO'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'CABLEADO'
        }
    },
    'OAX SIAP': {
        wo: {
            cat_ope_1: 'INFRAESTRUCTURA DE SERVIDORES',
            cat_ope_2: 'SERVIDORES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'SW ABASTO Y RH',
            cat_prod_2: 'RECURSOS HUMANOS',
            cat_prod_3: 'SIAP (SISTEMA INTEGRAL DE ADMINISTRACION DE PERSONAL)'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'SW ABASTO Y RH',
            cat_prod_2: 'RECURSOS HUMANOS',
            cat_prod_3: 'SIAP (SISTEMA INTEGRAL DE ADMINISTRACION DE PERSONAL)'
        }
    },
    'OAX SIMF': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'ACTUALIZAR MSL',
            cat_prod_1: 'SW MEDICO',
            cat_prod_2: 'PROVISION DE SERVICIOS MEDICOS',
            cat_prod_3: 'SIMF (SISTEMA DE INFORMACION DE MEDICINA FAMILIAR)'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR MSL',
            cat_prod_1: 'SW MEDICO',
            cat_prod_2: 'PROVISION DE SERVICIOS MEDICOS',
            cat_prod_3: 'SIMF (SISTEMA DE INFORMACION DE MEDICINA FAMILIAR)'
        }
    },
    'OAX TELEFONIA': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'CONFIGURAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'TELEFONIA MOVIL'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'TELEFONIA MOVIL'
        }
    },
    'OAX VIDEO CONFERENCIA': {
        wo: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'ACTUALIZAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'VIDEOCONFERENCIA'
        },
        incidente: {
            cat_ope_1: 'APLICACIONES',
            cat_ope_2: 'ATENCION DE APLICACIONES',
            cat_ope_3: 'SOPORTAR',
            cat_prod_1: 'HARDWARE',
            cat_prod_2: 'TELECOMUNICACIONES',
            cat_prod_3: 'VIDEOCONFERENCIA'
        }
    }
};

/* ── Actualizar campos ocultos y resumen según servicio + tipo ── */
function helixActualizarCategorias() {
    var servicio = $('#helix_servicio').val();
    var tipo     = helixTipoActivo;

    if (!servicio || !helixCategorias[servicio]) {
        $('#helix_cat_resumen').hide();
        $('#helix_cat_ope_1,#helix_cat_ope_2,#helix_cat_ope_3').val('');
        $('#helix_cat_prod_1,#helix_cat_prod_2,#helix_cat_prod_3').val('');
        return;
    }

    var cats = helixCategorias[servicio][tipo] || helixCategorias[servicio]['wo'];

    // Llenar campos ocultos que viajan al servidor
    $('#helix_cat_ope_1').val(cats.cat_ope_1);
    $('#helix_cat_ope_2').val(cats.cat_ope_2);
    $('#helix_cat_ope_3').val(cats.cat_ope_3);
    $('#helix_cat_prod_1').val(cats.cat_prod_1);
    $('#helix_cat_prod_2').val(cats.cat_prod_2);
    $('#helix_cat_prod_3').val(cats.cat_prod_3);

    // Actualizar tabla resumen visible
    $('#resumen_cat_ope_1').text(cats.cat_ope_1);
    $('#resumen_cat_ope_2').text(cats.cat_ope_2);
    $('#resumen_cat_ope_3').text(cats.cat_ope_3);
    $('#resumen_cat_prod_1').text(cats.cat_prod_1);
    $('#resumen_cat_prod_2').text(cats.cat_prod_2);
    $('#resumen_cat_prod_3').text(cats.cat_prod_3);

    $('#helix_cat_resumen').show();
}

/* ── Init ─────────────────────────────────────────────────────── */
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

    if (tipo === 'incidente') {
        $('#helix_panel_impacto').show();
        $('#helix_panel_urgencia').show();
    } else {
        $('#helix_panel_impacto').hide();
        $('#helix_panel_urgencia').hide();
    }

    // Refrescar categorías según el nuevo tipo
    helixActualizarCategorias();
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
    if (!$('#helix_servicio').val()) {
        alert('Debe seleccionar el tipo de servicio antes de continuar.');
        $('#helix_servicio').focus();
        return false;
    }
    if (!datos.cat_ope_1 || !datos.cat_ope_2 || !datos.cat_ope_3 ||
        !datos.cat_prod_1 || !datos.cat_prod_2 || !datos.cat_prod_3) {
        alert('No se pudieron cargar las categorías del servicio seleccionado. Seleccione el servicio nuevamente.');
        $('#helix_servicio').focus();
        return false;
    }
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
    // Forzar actualización de categorías antes de leer los valores,
    // por si el onchange del select no se disparó correctamente.
    helixActualizarCategorias();

    var datos = helixRecopilarDatos();
    if (!helixValidar(datos)) return;

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
                helixMostrarExito(resp.codigoHelix || '');

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
            helixMostrarError(msg);
        }
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