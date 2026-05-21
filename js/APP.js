//Variable global que controla los diferentes modales abiertos
var open = false;
var htmlDiv = "";
var contadorGrupos = 1;

/**
 * [solicitudAjaxMatr Solicita al servidor informacion de los ecargados]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxMatr(){
        cr = jQuery.trim($('#criterioMatr').val());
        $('#logger-matr').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getmatr.html', type: 'post', 
             beforeSend: function(){
                $('#logger-matr').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaMatr, 
            error: function(e){
                $('#logger-matr').html(e.responseText);
            }
        });    
    }
/**
 * [toTablaFondo Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los ecargados]
 */
function toTablaMatr(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Matricula</th>';
    cad += '<th>Nombre (s)</th>';
    cad += '<th>Apellido Paterno</th>';
    cad += '<th>Apellido Materno</th>';
    cad += '<th>Adscripción</th>';
    cad += '<th>Categoria</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['Matricula'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'Matricula\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-matr');
    log.html(cad);
}
/**
 * [solicitudAjaxHw Solicita al servidor informacion de los equipos]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxHw(){
        cr = jQuery.trim($('#criterioHw').val());
        $('#logger-hw').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/gethard.html', type: 'post', 
             beforeSend: function(){
                $('#logger-hw').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaHw, 
            error: function(e){
                $('#logger-hw').html(e.responseText);
            }
        });    
    }
/**
 * [toTablaFondo Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los equipos]
 */
function toTablaHw(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Id Hardware</th>';
    cad += '<th>Descripción</th>';
    cad += '<th>Marca</th>';
    cad += '<th>Modelo</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['id_hw'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'id_hw\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-hw');
    log.html(cad);
}
/**
 * [solicitudAjaxFondo Solicita al servidor informacion de los fondos]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxFondo(){
        cr = jQuery.trim($('#criterioFondo').val());
        $('#logger-fondo').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getfondo.html', type: 'post', 
             beforeSend: function(){
                $('#logger-fondo').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaFondo, 
            error: function(e){
                $('#logger-fondo').html(e.responseText);
            }
        });    
    }
/**
 * [toTablaFondo Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los fondos]
 */
function toTablaFondo(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Clave Fondo</th>';
    cad += '<th>Id Fondo</th>';
    cad += '<th>Descripción Fondo</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveFondo'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'ClaveFondo\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-fondo');
    log.html(cad);
}
/**
 * [solicitudAjaxUi Solicita al servidor informacion de los UI]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxUi(){
        cr = jQuery.trim($('#criterioUi').val());
        $('#logger-ui').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getui.html', type: 'post', 
             beforeSend: function(){
                $('#logger-ui').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaUi, 
            error: function(e){
                $('#logger-ui').html(e.responseText);
            }
        });    
    }
/**
 * [toTablaUi Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los UI]
 */
function toTablaUi(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>UI</th>';
    cad += '<th>Clave Adscripción</th>';
    cad += '<th>Id UI</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['UI'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'UI\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-ui');
    log.html(cad);
}
/**
 * [solicitudAjaxReg Solicita al servidor informacion de los regimenes]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxReg(){
        cr = jQuery.trim($('#criterioReg').val());
        $('#logger-reg').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getreg.html', type: 'post', 
             beforeSend: function(){
                $('#logger-reg').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaReg, 
            error: function(e){
                $('#logger-reg').html(e.responseText);
            }
        });    
    }
/**
 * [toTablastat Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los estados]
 */
function toTablaReg(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Clave Regimen</th>';
    cad += '<th>Id Regimen</th>';
    cad += '<th>Regimen</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveRegimen'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'ClaveRegimen\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-reg');
    log.html(cad);
}
/**
 * [solicitudAjaxStat Solicita al servidor informacion de los estados]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxStat(){
        cr = jQuery.trim($('#criterioStat').val());
        $('#logger-stat').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getstat.html', type: 'post', 
             beforeSend: function(){
                $('#logger-stat').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablastat, 
            error: function(e){
                $('#logger-stat').html(e.responseText);
            }
        });    
    }
/**
 * [toTablastat Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los estados]
 */
function toTablastat(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Clave Status</th>';
    cad += '<th>Id Status</th>';
    cad += '<th>Status</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveStatus'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'ClaveStatus\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-stat');
    log.html(cad);
}
/**
 * [solicitudAjaxCC Solicita al servidor informacion de los CC]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxCC(){
        cr = jQuery.trim($('#criterioCC').val());
        $('#logger-cc').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getcc.html', type: 'post', 
             beforeSend: function(){
                $('#logger-cc').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaCC, 
            error: function(e){
                $('#logger-cc').html(e.responseText);
            }
        });    
    }

/**
 * [toTablaCC Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los CC]
 */
function toTablaCC(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>CC</th>';
    cad += '<th>Id CC</th>';
    cad += '<th>Descripción</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['CC'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'CC\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-cc');
    log.html(cad);
}
/**
 * [solicitudAjaxSO Solicita al servidor informacion de los Sistemas Operativos]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxSO(){
        cr = jQuery.trim($('#criterioSO').val());
        $('#logger-so').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getso.html', type: 'post', 
             beforeSend: function(){
                $('#logger-so').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaSO, 
            error: function(e){
                $('#logger-so').html(e.responseText);
            }
        });    
    }

/**
 * [toTablaSO Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de los Sistemas Operativos]
 */
function toTablaSO(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Clave SO</th>';
    cad += '<th>Id SO</th>';
    cad += '<th>Descripción</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveSO'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'ClaveSO\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-so');
    log.html(cad);
}
/**
 * [solicitudAjaxReferencia Solicita al servidor informacion de las Referencias]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxReferencia(){
        cr = jQuery.trim($('#criterioReferencia').val());
        $('#logger-referencia').html('<br/>');
        $.ajax({
            url: '/msicdi/admin/getreferencia.html', type: 'post', 
             beforeSend: function(){
                $('#logger-referencia').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaReferencia, 
            error: function(e){
                $('#logger-referencia').html(e.responseText);
            }
        });    
    }

/**
 * [toTablaReferencia Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de las Referencias]
 */
function toTablaReferencia(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr class="success">';
    cad += '<th>Referencia</th>';
    cad += '<th>Clave Municipio</th>';
    cad += '<th>IdInmueble</th>';
    cad += '<th>ClaveAdscripcion</th>';
    cad += '<th>SegmentoIP01</th>';
    cad += '<th>SegmentoIP02</th>';
    cad += '<th>CodigoVPN</th>';
    cad += '<th>UI</th>';
    cad += '<th>CC</th>';
    cad += '<th>Dirección</th>';
    cad += '<th>Número</th>';
    cad += '</tr>';
    $.each(resp, function(primaryKey, atributos){
        id = atributos['Referencia'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarForaneo(this.id,\'Referencia\');" style="height:35px;">';
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-referencia');
    log.html(cad);
}

function ajaxRepInv(donde){
    $('#cns').val(donde);
    $.ajax({
        url: '/msicdi/site/repres.html', type: 'post',
        data: { criterio: donde},
        success: mostraResRep,
        error: function(e){
            console.log("Error Interno");
        }
    });
}

function seleccionarForaneo(id,modal){
    $('#inptCriterio').val(id);
    $("#"+modal).dialog("close");
}

function mostraResRep(resp){
    if( resp.length >0){
        cad = '<table class="table"><tr class="success"><th>NNI</th><th>Serie</th><th>IP</th><th>Descripcion</th><th>Marca</th><th>Modelo</th><th>Municipio</th><th>Comentarios</th></tr>';
        resp.forEach(function(item,index){
            cad += '<tr>';
            cad += '<td>'+item['NNI']+'</td>';
            cad += '<td>'+item['Serie']+'</td>';
            cad += '<td>'+item['IP']+'</td>';
            cad += '<td>'+item['Descripcion']+'</td>';
            cad += '<td>'+item['Marca']+'</td>';
            cad += '<td>'+item['Modelo']+'</td>';
            cad += '<td>'+item['Municipio']+'</td>';
            cad += '<td>'+item['Comentarios']+'</td>';
            cad += '<tr>';
        });
        cad += '</table>';
        $('#divExcel').html(cad);
        $('#mySmallModalLabel').removeClass('fade');
        $('body').removeClass('modal-open');
        $('#mySmallModalLabel').removeClass('in');
        $('#mySmallModalLabel').css('display','none');
        $( "#tmp" ).detach();
        window.location.hash = '#divExcel';
    }else{
        $('#mySmallModalLabel').removeClass('fade');
        $('body').removeClass('modal-open');
        $('#mySmallModalLabel').removeClass('in');
        $('#mySmallModalLabel').css('display','none');
        $( "#tmp" ).detach();
        alert('No se han encontrado resultados !!');
    }
}

function ajaxBack(){
    cr = jQuery.trim($('#criterioReporte').val());

    $.ajax({
        url: '/msicdi/site/GetInformacionReporte.html', type: 'post',
        data: { criterio: cr },
        success: mostrarReporte,
        error: function(e){
            console.log("Error Interno");
        }
    });
}

function mostrarReporte(resp){
    if( resp.length > 0 ){
        $('#divBack').show(2000);
        $('#folio').val(resp[0]['NRastreo']);
        $('#mail').val(resp[0]['eMail']);
        $('#nserie').val(resp[0]['nSerie']);
        $('#falla').val(resp[0]['descripcionFalla']);
        $('#iporigen').val(resp[0]['ipOrigen']);
        $('#telefono').val(resp[0]['Telefono']);
        $('#usuario').val(resp[0]['usuario']);
        $('#contrasena').val(resp[0]['contrasena']);
        $('#ipequipo').val(resp[0]['ipEquipo']);

    }else {
        alert("No se ha encontrado reportes con el folio introducido");
    }
}

function obtenerNotificaciones(){
    matricula = $('#usuarioLogueado').val()
     $.ajax({
            url: '/msicdi/site/GetNotificaciones.html', type: 'post', 
            data: { matr: matricula},
            success: mostrarNoticias,
            error: function(e){
                console.log('No se pueden obtener actualizaciones');
            }
        }); 
}

function mostrarNoticias(resp){
    if(resp.length == 1){
        cad = "El reporte: "+resp[0]['NRastreo']+", ha sido asignado a ti. "
        mostrarNotificacion(cad);
    }

}

function mostrarNotificacion(Mensaje) {
    var notice = new PNotify({
            title: 'Nueva reporte.',
            text: Mensaje,
            type: 'success',
            icon: 'picon picon-flag-green',
            animation: 'show',
            hide: false,
            opacity: .95,
            buttons: {
                closer: false,
                sticker: false,
            }
          
    });
    notice.get().click(function(){ notice.remove(); });
}

function limpiaFormFiltrado(){
    placeholder = 'Número de seguimiento / Matrícula / Número de Serie / Nombre';
    valorActual = $('#nSegAvanz').val();
    if( placeholder==valorActual )
        $('#nSegAvanz').val('');
    return true;
}
function showDialogImg(arg){
    $("body").addClass("modal-open");
    $("#imgViewModal").dialog("open");
    $("#imgModal").attr("src",arg.src);
}

function iniciarDiv(){
    htmlDiv = $('#contenedorImagenes').html();
    $('#contenedorImagenes').html("");
}

function validarFormEdicion(){
    if( $('#_contra').val() == '' ){
        $('#divErrContra').html('<font color="red">La contraseña no puede estar vacía</font>');
        return false;
    }else
        return true;
}
function radioClick()
{
    this.blur();  
    this.focus();  
}

function limpiaForm(){
    $('#resMatr').html('');
    $('#divUsuarioCont').html('');
    $('#errMatrNV').html('');
    $('#errContrNV').html('');
}

function limpiarFormReporte(){
    $('#infoMatricula').html('');
    $('#errorLogger').html('');
    $('#errorLogger2').html('');
    $('#errorLogger3').html('');
}

function validaFormUsuario(){
    div = $('#resMatr').html().toLowerCase();
    correctIE = '<font style="margin-left: 30%" color=green>Correcto - Matricula Valida</font>'.toLowerCase();
    correctOther = '<font style="margin-left:30%" color="Green">Correcto - Matricula Valida</font>'.toLowerCase();
    contr = $('#contra').val();
    if ( div == correctIE || div == correctOther ){
        p1 = true;
        $('#errMatrNV').html('');
    }
    else{
        p1 = false;
        $('#errMatrNV').html('<font color="red">Ingrese una matricula válida</font>');
    }
    if ( contr.length > 0 && contr != 'Ingrese Una Contraseña'){
        p2 = true;
        $('#errContrNV').html('');
    }
    else{
        p2 = false;
        $('#errContrNV').html('<font color="red">Ingrese una Contraseña</font>');
    }
    if( p1&&p2 ){
        ant = $('#email').val();
        err = 'Ingrese Un Correo Electronico (Opcional)';
        if( ant== err )
            $('#email').val('');
    } 
    return p1&&p2;
}

function redirigeCheckList(){
    //idConst = $("#id_const_rep").val();
    $("#checklist").dialog("close");
   // window.location.href = "/msicdi/soporte/GenerarConstancia?idReporte="+idConst;
}

function showDialogCheckList(arg){
    $("body").addClass("modal-open");
    $("#checklist").dialog("open");
    $("#id_const_rep").val(arg);
}

function createR(){
    $("#createReport").show();
    $("#showReport").hide();
}

function showR(){
   $("#createReport").hide();
   $("#showReport").show();
}

function actualizarVisibilidad(radioNombre){
    valor = $("input[name="+radioNombre+"]:checked").val();
    partes = radioNombre.split('_');
    idRadio = partes[0];
     $.ajax({
            url: '/msicdi/site/cambiarVisibilidad.html', type: 'post', 
            data: { id: idRadio, val:valor },
            success: function(){
            }, 
            error: function(e){
                $('#infoMatricula').html(e.responseText);
            }
        }); 
}

/**
 * [noMatricula Oculta el div de matricula y muestra la del nombre]
 * @param  {[type]} checkbox [Objeto checkbox]
 */
function noMatricula(checkbox){
    $("#infoMatricula").html("");
    matricula = checkbox.checked;
    divNombre = $("#nNombre");
    divMatricula = $("#nMatricula");
    if( matricula ){
        divMatricula.addClass("div-temporal");
        divNombre.removeClass("div-temporal");
    }else{
        divMatricula.removeClass("div-temporal");
        divNombre.addClass("div-temporal");
    }
}

/**
 * [getInformacionMatricula description]
 * @return {[type]}         [description]
 */
function getInformacionMatricula(){
    matricula = jQuery.trim($('#nmatr').val());
   // alert(matricula);
    $('#infoMatricula').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetNombreByMatricula.html', type: 'post', 
             beforeSend: function(){
                $('#infoMatricula').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { matr: matricula },
            success: mostrarResMatricula, 
            error: function(e){
                $('#infoMatricula').html(e.responseText);
            }
        }); 
}

/**
 * [mostrarResMatricula Muestra si la matricula introducida es correcta]
 * @param  {[JSON]} resp    [Objeto Json con la informacion]
 */
function mostrarResMatricula(resp){
    info = $('#infoMatricula');
    if( resp.length!=0 ){
        cad = "</br><h5 id='matriculaCorrecto'>"+resp[0]['n']+"</h5></br>";
    }else{
        cad = "</br><h5 id='errorSerie'>OOOPS, La matricula introducida no es válido.</h5></br>";
    }
   info.html(cad);
}

/**
 * [getResueltos Obtiene todos los reporte que tengan status Resuelto]
 * @param  {[JSON]} dataset1    [Objeto Json con datos de todos los reportes]
 * @param  {[INTEGER]} tipo     [Tipo de grafica]
 * @return {[JSON]}             [Objeto Json con los reportes anuales]
 */
function getResueltos(dataset1,tipo, anio){
    $.ajax({
        url: '/msicdi/site/ReporteAnualResueltos.html', type: 'post', data: { anioReporte: anio },  // Mandar el aio
        success: function(data){ 
            crearChart(dataset1,tipo,data);
            //crearChart(data,tipo);
        },
        error: function(e){
           alert('Error Interno');
        }
    }); 
} 

/**
 * [solicitudAjaxChart Obtiene todos los reportes que llegan al sistema]
 * @param  {[BOOLEAN]} change [Si se ha seleccioando un año especifico]
 * @return {[JSON]}           [Objeto Json con datos de todos los reportes]
 */
function solicitudAjaxChart(change){
    // siempre leer el año del select, en ambos casos
    tipo = change ? parseInt($('#selectTipo').val()) : 1;
    anio = $('#selectAnio').val();

    $.ajax({
        url: '/msicdi/site/ReporteAnual.html', 
        type: 'post', 
        data: { anioReporte: anio },  // siempre manda el año
        success: function(data){ 
            if($('#checkboxResuelto').is(':checked'))
                getResueltos(data, tipo, anio);  // siempre pasa el año
            else
                crearChart(data, tipo);
        },
        error: function(e){
            alert('Error Interno');
        }
    }); 
}

/**
 * [crearChart Crea la grafica con dos datasets]
 * @param  {[JSON]} resp        [Objeto json con informacion del primer dataset]
 * @param  {[INTEGER]} tipo     [Define el tipo de grafico]
 * @param  {[JSON]} resp2       [Objeto json con informacion del segundo dataset]
 */
function crearChart(resp,tipo,resp2){
    if( resp2 != null){
        dat2 = [];
            for ( i = 1 ; i <= 12; i++) {
                dat2.push(0)
            };

            resp2.forEach(function (entry){
                dat2[entry['m1']-1] = entry['c1'];
                })
        for ( i = dat2.length; i<12; i++) {
                    dat2.push(0);
                };
        dataset2 =  {
                        //label: "Primer Dataset",
                        fillColor: "rgba(226,90,48,0.2)",
                        strokeColor: "rgba(226,90,48,1)",
                        pointColor: "rgba(226,90,48,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: dat2
                    }
    }
    
    if ( typeof miGrafica != "undefined" && miGrafica != null )
        miGrafica.destroy();
    dat = [];
 
    for ( i = 1 ; i <= 12; i++) {
        dat.push(0)
    };

    resp.forEach(function (entry){
        dat[entry['m']-1] = entry['c'];
        })

    data = {
                labels: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul","Ago","Sep","Oct","Nov","Dic"],
                datasets: [
                    {
                        //label: "Primer Dataset",
                        fillColor: "rgba(151,187,205,0.2)",
                        strokeColor: "rgba(151,187,205,1)",
                        pointColor: "rgba(151,187,205,1)",
                        pointStrokeColor: "#fff",
                        pointHighlightFill: "#fff",
                        pointHighlightStroke: "rgba(151,187,205,1)",
                        data: dat
                    }
                    ]
            };
    if( resp2 != null){
        data['datasets'].push(dataset2);
        sum1 = 0;
        for (i = 0; i < data['datasets'][0]['data'].length; i++) {
            sum1 += parseInt(data['datasets'][0]['data'][i]);
        };
        sum2 = 0;
        for (i = 0; i < data['datasets'][1]['data'].length; i++) {
            sum2 += parseInt(data['datasets'][1]['data'][i]);
        };
        eficiencia = sum2*(100/sum1);
        $('#eficiencia').html("Eficiencia de trabajo: "+eficiencia.toFixed(2)+"%");
        $('#recibidos').html("Reportes Recibidos: "+sum1);
        $('#solucionados').html("Reportes Solucionados: "+sum2);
    }
    ctx = $("#myChart").get(0).getContext("2d");
    switch(tipo){
        case 1:
                miGrafica = new Chart(ctx).Line(data, {bezierCurve: true});
                break;
        case 2: 
                miGrafica = new Chart(ctx).Bar(data, {bezierCurve: true});
                break;
        case 3: 
                miGrafica = new Chart(ctx).Radar(data, {bezierCurve: true});
                break;
    }
}

/**
 * [showDialogAdscripcionPerfil Abre el modal para elegir la adscripcion]
 */
function showDialogAdscripcionPerfil(){
    open = true;
    $("body").addClass("modal-open");
    $("#adscripcion").dialog("open");
}

/**
 * [showDialogCategoriaPerfil Abre el modal para elegir la categoria]
 */
function showDialogCategoriaPerfil(){
    open = true;
    $("body").addClass("modal-open");
    $("#categoria").dialog("open"); 
}

/**
 * [abCategoria Muestra modadal para mostrar informacion.]
 */
function abCategoria(){
    alert("Aqui serás capaz de manejar las categorias. Las categorias son útiles para ver el estado de cada reporte.");
}

/**
 * [ajaxGetDatos Obtien informacion de los usuarios]
 * @param  {[STRING]} matr [Matricula del usuario del cual se desea obtener informacion]
 * @return {[JSON]}      [Objeto Json con los datos del personal]
 */
function ajaxGetDatos(matr){
    $.ajax({
        url: '/msicdi/site/GetInfo.html', type: 'post', 
        data: { matricula: matr },
        success: ponerInfo, 
        error: function(e){
            alert("Error Interno.");
       }
    });   
}

/**
 * [ponerInfo Llena la tabla con la informacion obtenida]
 * @param  {[JSON]} resp [Objeto Json con los datos de la consulta]
 */
function ponerInfo(resp){
    
    $('#_nombres').val(resp['nom']);
    $('#_apPaterno').val(resp['ap']);
    $('#_apMaterno').val(resp['am']);
    $('#_contra').val('sincambios');
    $('#_adscrip').val(resp['cad']);
    $('#_catego').val(resp['ccat']);
    $('#_email').val(resp['correo']);
    cad = "";
    if( resp['rol']=='user' )
        cad += "<option value='user' selected>Usuario Estandar</option>";
    else
        cad += "<option value='user' >Usuario Estandar</option>";
    if( resp['rol']=='coadmin' )
        cad += "<option value='coadmin' selected>Co Administrador</option>";
    else
        cad += "<option value='coadmin' >Co Administrador</option>";
    if( resp['rol']=='admin' )
        cad += "<option value='admin' selected>Administrador</option>";
    else
        cad += "<option value='admin'>Administrador</option>";
    $("#_rol").html(cad);
}

/**
 * [showDialogEdicion Abre el modal para ver la ventana de edicion de informacion]
 * @param  {[STRING]} arg [Identificador para poder obtener la consulta]
 */
function showDialogEdicion(arg){
    $("body").addClass("modal-open");
    $('#_matr').val(arg);
    ajaxGetDatos(arg);
    open = true;
    $("#edicion").dialog("open"); 
}

/**
 * [confirmarEliminacion Confirma la decision del usuario de eliminar al usuario actual]
 * @param  {[EVENT]} e [Evento del documento]
 */
function confirmarEliminacion(e){
    r = confirm("Realmente Desea Eliminar Este Usuario?!");
    if (r == true) {
        window.location.href = "/msicdi/site/eliminarUsuario.html?id="+e;
    }
}

/**
 * [desactivarScroll Desactiva el uso del scroll en segundo plano]
 * @param  {[BOOLEAN]} arg [Parametro para activar o desactivar el scroll]
 */
function desactivarScroll(arg){
    if(arg==1)
        $("body").addClass("odal-open");
    else
        $("body").removeClass("modal-open");
}

/**
 * [tipoUsuario Muestra de manera apropiada el tipo de usuario]
 * @param  {[STRING]} arg [Clave del rol de usuario]
 * @return {[STRING]} us   [Descripcion apropiada del rol ]
 */
function tipoUsuario(arg){
    us = 'Administrador';
    if( arg=='coadmin' )
        us = 'Co Administrador';
    if( arg=='user' )
        us = 'Usuario Estándar';
    return us;
}

/**
 * [solicitudAjaxUsuarios solicita informacion al servidor de los usuarios actuales.]
 * @return {[JSON]} [Objeto Json con los registros de lo usuarios]
 */
function solicitudAjaxUsuarios(){
        cr = jQuery.trim($('#criterioUsuario').val());
        $('#logger-usuarios').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetUsuarios.html', type: 'post', 
             beforeSend: function(){
                $('#logger-usuarios').html('<img style="margin-left: 45%;" height="100" width="100" src="/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaUsuarios, 
            error: function(e){
                $('#logger-usuarios').html(e.responseText);
            }
        });    
}

/**
 * [toTablaUsuarios Convierte el objeto Json a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con los registros de usuarios]
 */
function toTablaUsuarios(resp){
    cad = '<table style="width:100%" class="table table-striped table-hover">';
    cad += '<tr >';
    cad += '<th>Matricula</th>';
    cad += '<th>Nombre Completo</th>';
    cad += '<th>Correo</th>';
    cad += '<th>Rol</th>';
    cad += '<th>Acciones</th>';
    cad += '</tr>';
    cont = 0;
    $.each(resp, function(primaryKey, atributos){
        id = atributos['Matricula'];
        cad += '<tr>';
        cont++;
        $.each(atributos, function(attr_name, attr_value){
            if(attr_name=='rol')
                 cad += '<td><p >'+tipoUsuario(attr_value)+'</p></td>';
                else
                    cad += '<td><p >'+attr_value+'</p></td>';
        });
        cad += '<td><a href="javascript:showDialogEdicion('+id+');"><img src="/msicdi/images/editar.png"></a>&nbsp&nbsp&nbsp<a href="javascript:confirmarEliminacion('+id+');" ><img src="/msicdi/images/eliminar.png"></a></td>';
        cad+= '</tr>';
    });
    for ( i = cont; i < 10; i++) {
        cad += '<tr style="font-size:1px; height:45px;"><td></td><td></td><td></td><td></td><td></td></tr>';
    };
    cad += '</table>';
    log = $('#logger-usuarios');
    log.html(cad);
}

/**
 * [ajaxIsMatriculaValida Envia una peticion al servidor para verificar la validez de una matricula]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function ajaxIsMatriculaValida(){
    matr = jQuery.trim($('#matricula').val());
    $.ajax({
    url: '/msicdi/site/matriculaValida.html', type: 'post', 
    data: { matricula: matr },
    success: matriculaRes, 
    error: function(e){
        $('#logger-categoria').html(e.responseText);
    }
    }); 
}

/**
 * [matriculaRes Informa al usuario si la matricula es correcta o incorrecta]
 * @param  {[JSON]} resp [Objeto Json con la informacion solicitada al servidor]
 */
function matriculaRes(resp){
    div = $('#resMatr');
    if ( resp.length > 0 ){
        div.html('<font style="margin-left:30%" color="Green">Correcto - Matricula Valida</font>');
        $('#nombres').val(resp[0]['Nombres']);
        $('#apPaterno').val(resp[0]['ApPaterno']);
        $('#apMaterno').val(resp[0]['ApMaterno']);
        solicitudAjaxUsuarioDisponible( jQuery.trim($('#matricula').val()) );
    }else{
        div.html('<font style="margin-left:30%" color="Red">Error - Esta Matricula es Incorrecta.</font>');
        $('#divUsuarioCont').html('');
    }
}

function solicitudAjaxUsuarioDisponible( matr ){
        $.ajax({
            url: '/msicdi/site/UsuarioDisponible.html', type: 'post', 
            data: { matricula: matr },
            success: respuestaUsuarioDisponible, 
        });    
}

function respuestaUsuarioDisponible(resp){

    if( resp==1 ){
        $('#resMatr').html('<font style="margin-left:30%" color="Red">Error - Esta Matricula es Incorrecta.</font>');
        matr = jQuery.trim( $('#matricula').val() );
        $('#nombres').val('');
        $('#apPaterno').val('');
        $('#apMaterno').val('');
        cad = '<div id="divUsuarioValido"><font color="green">Este matricula ya esta en uso, Usted puede: </font>&nbsp&nbsp&nbsp<td><a href="javascript:showDialogEdicion('+matr+');"><img src="/msicdi/images/editar.png"></a>&nbsp;&nbsp;&nbsp;<a href="javascript:confirmarEliminacion('+matr+');"><img src="/msicdi/images/eliminar.png"></a></td></div>';
        $('#divUsuarioCont').html(cad);
    }else{
        $('#divUsuarioCont').html('');
    }
}

/**
 * [solicitudAjaxCategoria Solicita al servidor informacion de las categorias]
 * @return {[JSON]} [Objeto Json con la informacion de las categorias]
 */
function solicitudAjaxCategoria(){
        cr = jQuery.trim($('#criterioCat').val());
        $('#logger-categoria').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetCategoria.html', type: 'post', 
             beforeSend: function(){
                $('#logger-categoria').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaCategoria, 
            error: function(e){
                $('#logger-categoria').html(e.responseText);
            }
        });    
}

/**
 * [toTablaCategoria Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la informacion de las categorias]
 */
function toTablaCategoria(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr >';
    cad += '<th>Numero</th>';
    cad += '<th>Clave Adscripcion</th>';
    cad += '<th>Adscripcion</th>';
    cad += '</tr>';
    cont = 0;
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveCategoria'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarCategoria(this.id);" style="height:35px;">';
        cont++;
        cad += '<td>'+cont+'</td>'
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-categoria');
    log.html(cad);
}

/**
 * [seleccionarCategoria Funcion que se encarga de actualizar la categoria seleccionada por el usuario]
 * @param  {[SRING]} id [Valor que selecciono el usuario]
 */
function seleccionarCategoria(id){
    $("#categoria").dialog("close");
    if(open)
        $('#_catego').val(id);
    else
        $('#catego').val(id);
    $("body").removeClass("modal-open")
}

/**
 * [seleccionarAdscripcion Funcion que se encarga de actualizar la adscripcion seleccionada por el usuario]
 * @param  {[SRING]} id [Valor que selecciono el usuario]
 */
function seleccionarAdscripcion(id){
    $("#adscripcion").dialog("close");
    if(open)
        $('#_adscrip').val(id);
    else
        $('#adscrip').val(id);
    $("body").removeClass("modal-open")
}

/**
 * [solicitudAjaxAdscripcion Solicita al servidor informacion de las adscripciones]
 * @return {[JSON]} [Objeto Json con la respuesta del servidor]
 */
function solicitudAjaxAdscripcion(){
        cr = jQuery.trim($('#criterio').val());
        $('#logger-adscripcion').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetAdscripcion.html', type: 'post', 
             beforeSend: function(){
                $('#logger').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { criterio: cr },
            success: toTablaAdscripcion, 
            error: function(e){
                $('#logger-adscripcion').html(e.responseText);
            }
        });    
    }

/**
 * [toTablaAdscripcion Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la infromacion de las adscripciones]
 */
function toTablaAdscripcion(resp){
    cad = '<table style="width:100%" class="table  table-hover">';
    cad += '<tr >';
    cad += '<th>Numero</th>';
    cad += '<th>Clave Adscripcion</th>';
    cad += '<th>Adscripcion</th>';
    cad += '</tr>';
    cont = 0;
    $.each(resp, function(primaryKey, atributos){
        id = atributos['ClaveAdscripcion'];
        cad += '<tr id="'+id+'" ondblclick="seleccionarAdscripcion(this.id);" style="height:35px;">';
        cont++;
        cad += '<td>'+cont+'</td>'
        $.each(atributos, function(attr_name, attr_value){
                    cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    cad += '</table>';
    log = $('#logger-adscripcion');
    log.html(cad);
}

/** 
 * [showDialogAdscripcion Muestra la ventana modal de adscripcion]
 */
function showDialogAdscripcion(){
    $("body").addClass("modal-open");
    $("#adscripcion").dialog("open"); 
}

/** 
 * [showDialogCategoria Muestra la ventana modal de categoria]
 */
function showDialogCategoria(){
    $("body").addClass("modal-open");
    $("#categoria").dialog("open"); 
}

/**
 * [agregarNota Agrega una nueva nota al reporte actual]
 */
function agregarNota(){
    $("#agregar-nota").toggle();
}

/**
 * [btnRastrear Controla la peticion del usuario para rastreo de un reporte]
 */
function btnRastrear(){
    nr = $("#codigoRastreo").val();
    if(nr.length==0){
        alert("Introduzca un numero de rastreo.");
    }else{
        window.location.href = "/msicdi/soporte/validarNumero.html?nr="+nr;
    }
}

/**
 * Valida el correo basándose en el resultado de la verificación LDAP
 * ya realizada en correo-ldap.js
 */
function esCorreoValido() {
    // Si marcó "Sin correo institucional" → se permite
    if ($('#sinCorreo').is(':checked')) return true;

    // Si LDAP encontró al usuario, habrá un nombre en ldap_nombre
    var ldapNombre = $.trim($('#ldap_nombre').val());
    return ldapNombre.length > 0;
}

/**
 * [validaFormManual Valida las entradas del formulario de reportes para usuarios identificados]
 * @param  {[Object]} form [Formulario]
 * @return {[BOOLEAN]}      [Retorna el estado de la validacion del formulario]
 */
function validaFormManual(){
   noMatr = document.getElementById("NoTengoMatricula").checked;
    txtA = $("#falla").val();
    nom = $("#nnom").val();
    matr = $("#infoMatricula").html();
    correo = $("#ncorr").val();correo = $("#ncorr").val();
    errLog = $('#errorLogger');
    errLog3 = $('#errorLogger3');
    var errLog4 = $('#errorLogger4'); //MOSTRAR ERROR CORREO FALTANTE
    var p4 = esCorreoValido(correo);
    p1 = (txtA.length>10)?true:false;
    if( noMatr ){
        p3 = ( nom.length>5 )?true:false;
    }else
        p3 = (matr == '<br><h5 id="errorSerie">OOOPS, La matricula introducida no es válido.</h5><br>' || matr == "" )?false:true;
    if( !p3 )
        errLog3.html("<h5 id='errorSerie'>Introduzca una matricula/nombre válidos.</h5>");
    else
        errLog3.html("");
    if( !p1 )
        errLog.html("<h5 id='errorSerie'>Introduzca una breve descripcion del problema del equipo.</h5>");
    else
        errLog.html("<p></p>");
    if( p1 && p3 ){
        placeholder = 'Introduzca el numero de serie o NNI del equipo';
        valorActual = $('#nserie').val();
        if( placeholder==valorActual )
            $('#nserie').val('');
        placeholder = 'Escriba su correo electrónico';
        valorActual = $('#ncorr').val();
        if( placeholder==valorActual )
            $('#ncorr').val('');
        placeholder = 'Escriba su teléfono de oficina';
        valorActual = $('#ntel').val();
        if( placeholder==valorActual )
            $('#ntel').val('');
        placeholder = 'Escriba el usuario que se muestra al encender el equipo';
        valorActual = $('#nUsuar').val();
        if( placeholder==valorActual )
            $('#nUsuar').val('');
        placeholder = 'Escriba la contraseña que escribe al encender el equipo';
        valorActual = $('#nContra').val();
        if( placeholder==valorActual )
            $('#nContra').val('');
        placeholder = 'Escriba la dirección ip del equipo que esta reportando';
        valorActual = $('#nIpEquipo').val();
        if( placeholder==valorActual )
            $('#nIpEquipo').val('');
    }
    if (!p4) errLog4.html(
        "<h5 id='errorSerie'>El correo no fue verificado en el directorio institucional. " +
        "Verifique que sea un correo @imss.gob.mx válido.</h5>"
    );

    return p1&&p3&&p4;
}

/**
 * [validarForm2 Valida las entradas del formulario de reportes para usuarios identificados]
 * @param  {[Object]} form [Formulario]
 * @return {[BOOLEAN]}      [Retorna el estado de la validacion del formulario]
 */
function validarForm2(){
    txtA = $("#falla").val();
    nom = $("#nnom").val();
    matr = $("#infoMatricula").html();
    correo = $("#ncorr").val();
    errLog = $('#errorLogger');
    errLog2 = $('#errorLogger2');
    var errLog4 = $('#errorLogger4');
    p1 = (txtA.length>10)?true:false; 

    var p4 = esCorreoValido(correo);
    if( !p1 )
        errLog.html("<h5 id='errorSerie'>Introduzca una breve descripcion del problema del equipo.</h5>");
    else
        errLog.html("<p></p>");
    p2 = $("#isValido").val();
    if(p2=="false"){
        p2 = false;
        errLog2.html("<h5 id='errorSerie'>Introduzca un numero de Serie Válido.</h5>");
    }else{
        p2 = true;
        errLog2.html("<p></p>");
    }
    if (!p4) errLog4.html(
        "<h5 id='errorSerie'>El correo no fue verificado en el directorio institucional. " +
        "Verifique que sea un correo @imss.gob.mx válido.</h5>"
    );
    return p1&&p2&&p4;
}


/**
 * [validarForm3 Valida las entradas del formulario de reportes para usuarios no identificados]
 * @param  {[Object]} form [Formulario]
 * @return {[BOOLEAN]}      [Retorna el estado de la validacion del formulario]
 */
function validarForm3(){
    noMatr = document.getElementById("NoTengoMatricula").checked;
    txtA = $("#falla").val();
    nom = $("#nnom").val();
    matr = $("#infoMatricula").html();
    correo = $("#ncorr").val();
    errLog = $('#errorLogger');
    errLog2 = $('#errorLogger2');
    errLog3 = $('#errorLogger3');
    var errLog4 = $('#errorLogger4');
    var p4 = esCorreoValido(correo);

    p1 = (txtA.length>10)?true:false;
    if( noMatr ){
        p3 = ( nom.length>5 )?true:false;
    }else
        p3 = (matr == '<br><h5 id="errorSerie">OOOPS, La matricula introducida no es válido.</h5><br>' || matr == "" )?false:true;
    if( !p3 )
        errLog3.html("<h5 id='errorSerie'>Introduzca una matricula/nombre validos.</h5>");
    else
        errLog3.html("");
    if( !p1 )
        errLog.html("<h5 id='errorSerie'>Introduzca una breve descripcion del problema del equipo.</h5>");
    else
        errLog.html("<p></p>");
    p2 = $("#isValido").val();
    if(p2=="false"){
        p2 = false;
        errLog2.html("<h5 id='errorSerie'>Introduzca un numero de Serie Válido.</h5>");
    }else{
        p2 = true;
        errLog2.html("<p></p>");
    }

    if (!p4) errLog4.html(
        "<h5 id='errorSerie'>El correo no fue verificado en el directorio institucional. " +
        "Verifique que sea un correo @imss.gob.mx válido.</h5>"
    );
    return p1&&p2&&p3&&p4;
}

/** 
 * [getRespuestas Solicita al servidor todas las respuestas con los que cuenta el reporte]
 * @return {[JSON]} [Objeto Json con todas las respuestas del reporte]
 */
function getRespuestas(){
    nRastreo = jQuery.trim($('#nRastreo').val());
    $('#rastreo-mensajes').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetRespuetas.html', type: 'post', 
             beforeSend: function(){
                $('#rastreo-mensajes').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { nR: nRastreo },
            success: mostrarRespuestas, 
            error: function(e){
                $('#rastreo-mensajes').html(e.responseText);
            }
        }); 
}

/**
 * [mostrarRespuestas Convierte la infromacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con las respuestas del reporte]
 */
function mostrarRespuestas(resp){
    $('#contador').html('Respuestas: '+resp.length);
    cad = "";
    for (var i = 0; i < resp.length; i++) {
        div = "<div id=";
        div += ((i%2)==0)?"respuesta-uno":"respuesta-dos";
        div += ">";

        div += "Fecha : "+resp[i]['fechaRespuesta']+"</br>";
        div += "Usuario: "+resp[i]['nombre']+"</br>";
        div += "</br><strong>Mensaje: </strong></br></br>";
        div += resp[i]['Mensaje']+"</br></br>";


        div += "</div>";
       // alert(div);
        cad += div;
    };
    respuestas = $('#rastreo-mensajes');
    respuestas.html(cad);

}

/**
 * [getInformacionBySerie Solicita infromacion del euipo a partir de el numero de serie]
 * @return {[JSON]} [Objeto Json con la infromacion del equipo de computo]
 */
function getInformacionBySerie(){
    serie = jQuery.trim($('#nserie').val());
    $('#infoBySerie').html('<br/>');

        $.ajax({
            url: '/msicdi/site/GetInfoBySerie.html', type: 'post', 
             beforeSend: function(){
                $('#infoBySerie').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
            },
            data: { ns: serie },
            success: mostrarInfo, 
            error: function(e){
                $('#infoBySerie').html(e.responseText);
            }
        }); 
}

/** 
 * [mostrarInfo Rellena todos los inputs con la informacion enviadad por el servidor]
 * @param  {[JSON]} resp [Objeto Json con la infromacion del equipo de computo]
 */
function mostrarInfo(resp){
    info = $('#infoBySerie');
    if( resp.length!=0 ){
        $("#isValido").val("true");
        cad = "<table class='table' style='width:100%; height 10px;' >";
        cad += "<tbody>";
        cad += "<tr>";
        cad += "<th>Descripcion</th>";
        cad += "<th>Marca</th>";
        cad += "<th>Modelo</th>";
        cad += "</tr>";
        cad += "<tr>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Descripcion']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Marca']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Modelo']+"</p></td>";
        cad += "</tr>";

        cad += "<tr>";
        cad += "<th>Municipio</th>";
        cad += "<th>Adscripción</th>";
        cad += "<th>Dirección</th>";
        cad += "</tr>";
        cad += "<tr>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Municipio']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Adscripcion']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['dir']+"</p></td>";
        cad += "</tr>";

        cad += "<tr>";
        cad += "<th>Dirección Ip</th>";
        cad += "<th>Dirección Ip (2)</th>";
        cad += "<th>Codigo VPN</th>";
        cad += "</tr>";
        cad += "<tr>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['ip1']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['ip2']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['vpn']+"</p></td>";
        cad += "</tr>";

        cad += "<tr>";
        cad += "<th>Sistema Operativo</th>";
        cad += "<th>Estado Actual</th>";
        cad += "<th></th>";
        cad += "</tr>";
        cad += "<tr>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['so']+"</p></td>";
        cad += "<td><p class='text-uppercase'>"+resp[0]['Status']+"</p></td>";
        cad += "<td><p class='text-uppercase'></p></td>";
        cad += "</tr>";

        cad += "</tbody>";
        cad += "</table>"

    }else{
        $("#isValido").val("false");
        cad = "</br><h5 id='errorSerie'>OOOPS, El numero de Serie no es válido.</h5></br>";
    }
    info.html(cad);
}

/**
 * [llenarShadow Rellena las entradas de la ventana modal con la infromacion enviada por el servidor]
 * @param  {[STRING]} nni [Identificador del equipo de computo]
 */
function llenarShadow(nni){
        $.get("../js/app.js", function(sql1) {
          var n =document.getElementById('nni').value=nni;
          alert(n);
        });

        var nni     = nni;
        var tipo    = "";
        var marca   = "";
        var modelo  = "";
        var serie   = "";
        var serieMonitor="";
        var status  = "";
        var prei    = "";
        var unidad  = "";
        var depto   = "";

        document.getElementById('serie').value=serie;
        document.getElementById('serieMonitor').value=serieMonitor;
        document.getElementById('status').value=status;
        document.getElementById('prei').value=prei;
        document.getElementById('unidad').value=unidad;
        document.getElementById('depto').value=depto;               
        //se llenan los combox
        var t = new Option("","tipo");
        $(t).html(tipo);
        document.getElementById('tipoM').appendChild(t);
        var m =new Option("","marca");
        $(m).html(marca);
        document.getElementById('marca').appendChild(m);
        var md=new Option('','modelo');
        $(md).html(modelo);
        document.getElementById('model').appendChild(md);
        var st=new Option("","status");
        $(st).html(status);
        document.getElementById('status').appendChild(st);
        var u = new Option("","unidad");
        $(u).html(unidad);
        document.getElementById('unidad').appendChild(u);
        var dp = new Option("","depto");
        $(dp).html(depto);
        document.getElementById('depto').appendChild(dp); 
}

/**
 * [editar Activa la caracteristica editable de los elementos de la ventana modal]
 */
function editar(){
    //alert("espere un momento...");
    $.ajax({
        url:'/msicdi/site/EditarInfo.html',
        data: {},
        success:function(data){
            $('#so').empty();
            for(var i in data){
            $('#so').append('<option value="'+data[i]['ClaveSO']+'" selected="selected">'+data[i]['SistemaOperativo']+'</option>');    
            }
                $.ajax({
                url:'/msicdi/site/GetStatus.html',
                    data: {},
                    success:function(data){
                         $('#status').empty();
                            for(var i in data){
                         $('#status').append('<option value="'+data[i]['ClaveStatus']+'" selected="selected">'+data[i]['status']+'</option>');    
                            }
                              $.ajax({
                                url:'/msicdi/site/GetTipo.html', type:'post',
                                 data: {},
                                   success:function(data){
                                     $('#tipoM').empty();
                                       for(var i in data){
                                     $('#tipoM').append('<option value="'+data[i]['tipo']+'" selected="selected">'+data[i]['tipo']+'</option>');                                                  
                                    }
                                    selectedTipo();
                           },});    //tercer success         
       },});//segundo success
        },//primer success
        error:function(e){
            console.log("Eror Interno");
        }
    });
    cargaUnidad()
    $("input").prop('disabled', false);
    $("select").prop('disabled', false);
    $("textarea").prop('disabled', false);
    $("#editSO").show();
    $("#editHW").show();
    
}


function rellenarShadow(resp){
    $("#nni").val(resp[0]['nni']);
    $('#marca').empty();
    $('#marca').append('<option value="'+resp[0]['Marca']+'" selected="selected">'+resp[0]['Marca']+'</option>');
    $('#model').empty();
    $('#model').append('<option value="'+resp[0]['Modelo']+'" selected="selected">'+resp[0]['Modelo']+'</option>');
    $('#tipoM').empty();
    $('#tipoM').append('<option value="'+resp[0]['tipoM']+'" selected="selected">'+resp[0]['tipoM']+'</option>');
    $("#serie").val(resp[0]['serie']);
    $("#serieMonitor").val(resp[0]['SerieMonitor']);
    $('#status').empty();
    $('#status').append('<option value="'+resp[0]['Status']+'" selected="selected">'+resp[0]['Status']+'</option>');
    $('#depto').empty();
    $('#depto').append('<option value="'+resp[0]['Descripcion']+'" selected="selected">'+resp[0]['Descripcion']+'</option>');
    $('#unidad').empty();
    $('#unidad').append('<option value="'+resp[0]['unidad']+'" selected="selected">'+resp[0]['unidad']+'</option>');
    $('#so').empty();
    $('#so').append('<option value="'+resp[0]['DescSO']+'" selected="selected">'+resp[0]['DescSO']+'</option>');
    $("#prei").val(resp[0]['prei']);
    $("#referencia").val(resp[0]['Referencia']);
    $("#calle").val(resp[0]['Direccion']);  // Calle
    $("#num").val(resp[0]['Numero']); //resp - numero de la calle
    $("#colonia").val(resp[0]['Asentamiento']); // colonia
    $("#cp").val(resp[0]['Codigo']); //Codigo Postal
    $("#municipio").val(resp[0]['municipio']); //Municipio

    $("#responsable").val(resp[0]['responsable']); //Nombre de responsable

    $("#seg1").val(resp[0]['Seg1']);
    $("#seg2").val(resp[0]['Seg2']); 
    $("#vpn").val(resp[0]['CodigoVPN']);

    $("#matricula").val(resp[0]['Matricula']); 
    $("#comenta").val(resp[0]['Comentarios']); 
    $("#prj1").val(resp[0]['Proyecto']); 

    $("#namePC").val(resp[0]['NomPC']); 
    $("#ip").val(resp[0]['IP']); 
    $("#noticiaMovi").val(resp[0]['NoticiaMov']); 
    $("#venceGarantia").val(resp[0]['FinGarantia']); 
    $("#contrato").val(resp[0]['Contrato']); 
    $("#ubicacionDoc").val(resp[0]['UbicacionDocto']); 
}

/**
 * [mostrarShadow Solicita informacion al servidor del equipo de computo]
 * @param  {[STRING]} nnip [Identificador del equipo de computo]
 * @return {[JSON]}      [Objeto Json con la informacion enviada por el servidor]
 */
function mostrarShadow(nnip){
    $.ajax({
            url: '/msicdi/site/GetInformacion.html', type: 'post', 
            data: { nni: nnip },
            success: rellenarShadow, 
            error: function(e){
                console.log("Error Interno");
            }
    });  
    $('body').addClass('modal-open');
    $("#datos").dialog("open");
}

/**
 * [solicitudAjax Solicita al servidor infromacion de los equipos de computo]
 * @return {[JSON]} [Objeto Json con la informacion enviada por el servidor]
 */
function solicitudAjax(){
        cr = jQuery.trim($('#criterio').val());
		lim = $('#limite').val();
        $('#logger').html('<br/>');
        $.ajax({
            url: '/msicdi/site/GetElementos.html', type: 'post', 
             beforeSend: function(){
        		$('#logger').html('<img style="margin-left: 50%;" height="100" width="100" src="/msicdi/images/loading.gif"/>');
    		},
            data: { criterio: cr,limite: lim },
            success: toTabla, 
            error: function(e){
                $('#logger').html(e.responseText);
            }
        });    
    }

/**
 * [toTabla Convierte la informacion a una tabla html]
 * @param  {[JSON]} resp [Objeto Json con la informacion enviada por el servidor]]
 */
function toTabla(resp){
	cad = '<table style="width:100%" class="table table-striped table-hover">';
	cad += '<tr >';
	cad += '<th>NNI</th>';
	cad += '<th>Serie</th>';
	cad += '<th>Ubicación</th>';
	cad += '<th>Descripción</th>';
	cad += '<th>Marca</th>';
	cad += '<th>Modelo</th>';
	cad += '<th>Responsable</th>';
	cad += '</tr>';
	cont = 0;
    $.each(resp, function(primaryKey, atributos){
    	id = atributos['nni'];
        cad += '<tr  id="'+id+'" ondblclick="mostrarShadow(this.id);" style="height:35px;">';
       	cont++;
        $.each(atributos, function(attr_name, attr_value){
        		if(attr_name=='nni')
        			cad += '<td width="14%"><p data-toggle="tooltip" data-placement="left" title="Doble Click Para Acceder A Información." style="color: rgb(63,163,189); text-decoration: underline; font-size:105%;" class=" btn text-uppercase" id="'+attr_value+'" ondblclick="mostrarShadow(this.id);">'+attr_value+'</p></td>';
        		else
               		cad += '<td width="14%"><p class="text-uppercase ">'+attr_value+'</p></td>';
        });
        cad+= '</tr>';
    });
    for ( i = cont; i < 10; i++) {
    	cad += '<tr style="font-size:1px; height:45px;"><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
    };
	cad += '</table>';
	log = $('#logger');
	log.html(cad);
}



function cargaUnidad(){
    var matricula =$("#matricula").val();
    $.ajax({
        url:'/msicdi/site/GetUnidad.html',type:'post',
            data: { matr:matricula},
             success:function(data){
                $('#unidad').empty();
                 for(var i in data){
                 $('#unidad').append('<option value="'+data[i]['ui']+'" selected="selected">'+data[i]['unidad']+'</option>');    
                  }
             },}); 
}

function cargaDepto(){
    var unid = $("#unidad").val();
    //alert(unid);

    $.ajax({
         url:'/msicdi/site/GetDepto.html',type:'post',
             data: {uni:unid},
             success:function(data){
                $('#depto').empty();
                 for(var i in data){
                 $('#depto').append('<option value="'+data[i]['clave']+'" selected="selected">'+data[i]['descripcion']+'</option>');    
                 }
             },}); 
}

function cargaUI(){
    var u = $("#unidad").val();
    var preiNuevo=$("#prei").val(u);

}

function cargaDP(){
    var u = $("#unidad").val();
    var dp = $("#depto").val();
    var preiNuevo=$("#prei").val(u+" "+dp);

}

function selectedTipo(){
    var stipo=document.getElementById("tipoM").value;
    //alert(stipo);
     $.ajax({
        url:'../site/GetMarca.html',type:'post',
            data: {tipo2p : stipo},
            success:function(data){
                $('#marca').empty();    
                for(var i in data){
                $('#marca').append('<option value="'+data[i]['marca']+'" selected="selected">'+data[i]['marca']+'</option>');    
                }
                selectedMarca();
            },}); 
}

function selectedMarca(){
    var smarca=document.getElementById("marca").value;
     $.ajax({
        url:'../site/GetModelo.html', type:'post',
        data: {marca2dp : smarca },
        success:function(data){
            $('#model').empty();
            for(var i in data){
            $('#model').append('<option value="'+data[i]['modelo']+'" selected="selected">'+data[i]['modelo']+'</option>');    
            }
        },}); 

}
function insertaHW(){
    $("#insertHW").show();    
    $("#editarHW").hide();
    $("#agrHW").addClass('active');
    $("#edHW").removeClass('active');
}
 
function editaHW(){
    $("#insertHW").hide();    
    $("#editarHW").show();
    $("#agrHW").removeClass('active');
    $("#edHW").addClass('active');
}

function onloadHW(){
    var tipo=document.getElementById("tipoEd").value;
    var marca=document.getElementById("marcaEd").value;
    var modelo=document.getElementById("modeloEd").value;
    $("#actualizaTipo").val(tipo);
    $("#actualizaMarca").val(marca);
    $("#actualizaModelo").val(modelo);
    //alert(modelo);
     $.ajax({
        url:'../site/UpdateTipo.html', type:'post',
        data: { modelop : modelo },
        success:function(data){
                $("#actualizaId").val(data[0]['Modelo']);
            },});
}

function loadSO(){
    var newso=document.getElementById("soEd").value;
    $("#soNuevo").val(newso);
    $.ajax({
        url:'../site/OptionClaveSO.html',type:'post',
        data: {claveOrigen : newso},
        success:function(data){
                $("#claveEdit").val(data[0]['claveSO']);
            },});
}

function insertandoHW(){
    var tipoo= document.getElementById("tipoNuevo").value;
    var marcaa= document.getElementById("marcaNueva").value;
    var modeloo = document.getElementById("modeloNuevo").value;

    $.ajax({
        url:'/msicdi/site/InsertaTipo.html', type:'post',
        data:{tipoNuevo : tipoo, marcaNueva : marcaa, modeloNuevo : modeloo},
        success:function(data){
            $("#datos3").dialog("close");
        }
    });
}

function guardarC(){
    var serie = $("#serie").val();
    var serieM = $("#serieMonitor").val();
    var prei = $("#prei").val();
    var status = $("#status").val();
    var tipo= $("#tipoM").val();
    var modelo = $("#model").val();
    var marca = $("#marca").val();
    var seg1 = $("#seg1").val();
    var seg2 =$("#seg2").val();
    var vpn =$("#vpn").val();
    var dir =$("#calle").val();
    var num =$("#num").val();
    var PC= $("#namePC").val();
    var ip = $("#ip").val();
    var so = $("#so").val();
    var ref=$("#referencia").val();
    var coment = $("#comenta").val(); 
    var finGarantia = $("#venceGarantia").val();
    var movimientoNoticia = $("#noticiaMovi").val();
    var ubicacionDocto = $("#ubicacionDoc").val();
    var contrato = $("#contrato").val();
    var matricula =$("#matricula").val();
    var nni=$("#nni").val();
    var municipio=$("#municipio").val();
    var colonia=$("#colonia").val();
    var cp=$("#cp").val();
    var dp=$("#depto").val();
    var un =$("#unidad").val();
    var resp =$("#responsable").val();
    var nombres=resp.split(' ');
    var pat=nombres[0];
    var mat =nombres[1];
    var names=nombres[2]+" "+nombres[3];
    
    $.ajax({
        url:'/msicdi/site/UpdateInventario.html', type:'post',   
        data: {namePC:PC, matr:matricula, nnip:nni,contrato:contrato,notiMov:movimientoNoticia,UbDocto:ubicacionDocto, comenta:coment, finG:finGarantia , serie:serie ,serieM:serieM , vpn:vpn, direccion:dir ,numero:num , seg1:seg1 ,seg2:seg2 ,nuevaR:ref, muni:municipio, asentamiento:colonia, codigo:cp, tipoo:tipo, marcaa:marca ,modeloo:modelo,ip:ip,status:status,so:so,dp:dp,unidad:un,pate:pat,mate:mat,names:names},  
        success:function(data){
            $("#datos").dialog("close")
            location.reload()
        },
        error:function(e){
            alert('No hay nada que guardar.')
        }
    });
}

function actualizandoHW(){
        
    var tipoo=document.getElementById("actualizaTipo").value;
    var marcaa=document.getElementById("actualizaMarca").value;
    var modeloo=document.getElementById("actualizaModelo").value;
    var tipoAntes=document.getElementById("tipoEd").value;
    var marcaAntes=document.getElementById("marcaEd").value;
    var modeloAntes=document.getElementById("modeloEd").value;
    //alert(tipoAntes+marcaAntes+modeloAntes);    
    $.ajax({
        url:'../site/UpdateHW.html', type:'post',
        data:{ nomTipo: tipoo, nomMarca : marcaa, nomModelo : modeloo, tipoA:tipoAntes, marcaA:marcaAntes,modA:modeloAntes }, //pasar los de antes para el match segundo en el siteController
        success:function(data){
            $("#datos3").dialog("close");
        }
    });
}

function actualizaHW(){
    //tipo marca. modelo
     $.ajax({
        url:'../site/GetTipo.html', type:'post',
            data: {},
            success:function(data){
                 $('#tipoEd').empty();
                for(var i in data){
                  $('#tipoEd').append('<option value="'+data[i]['tipo']+'" selected="selected">'+data[i]['tipo']+'</option>');    
                }
                     tipo2();

            },});
    $("#datos3").dialog("open");
}

function tipo2(){
    var stipo=document.getElementById("tipoEd").value;
     $.ajax({
        url:'../site/GetMarca.html',type:'post',
            data: {tipo2p : stipo},
            success:function(data){
                $('#marcaEd').empty();    
                for(var i in data){
                $('#marcaEd').append('<option value="'+data[i]['marca']+'" selected="selected">'+data[i]['marca']+'</option>');    
                }
                marca2();
            },}); 
}
function marca2(){
    var smarca=document.getElementById("marcaEd").value;
     $.ajax({
        url:'../site/GetModelo.html', type:'post',
        data: {marca2dp : smarca },
        success:function(data){
            $('#modeloEd').empty();
            for(var i in data){
            $('#modeloEd').append('<option value="'+data[i]['modelo']+'" selected="selected">'+data[i]['modelo']+'</option>');    
            }
        },}); 
}
function openModal2(){
    //sistema operativo
    $.ajax({
        url:'../site/EditarInfo.html',type:'post',
        data: {},
        success:function(data){
            $('#soEd').empty();    
            for(var i in data){
            $('#soEd').append('<option value="'+data[i]['SistemaOperativo']+'" selected="selected">'+data[i]['SistemaOperativo']+'</option>');
            }
            },});
    $("#datos2").dialog("open");
}

function insertaSO(){
    var clave= document.getElementById("claveSO").value;
    var nameSO= document.getElementById("newSO").value;
    $.ajax({
        url:'../site/AddSO.html', type:'post',
        data:{claveSO : clave, newSO : nameSO},
        success:function(data){
           // alert("Agregado correctamente.");
            $("#datos2").dialog("close");
            br()
        }
    });

}

function br(){
        $.ajax({
        url:'../site/EditarInfo.html',type:'post',
        data: {},
        success:function(data){
            $('#so').empty();    
            for(var i in data){
            $('#so').append('<option value="'+data[i]['SistemaOperativo']+'" selected="selected">'+data[i]['SistemaOperativo']+'</option>');
            }
            }
        });
}

function updateSO(){
    var nombre = document.getElementById("soNuevo").value;
    var clav=document.getElementById("claveEdit").value;
    $.ajax({
        url:'../site/UpdateSO.html', type:'post',
        data:{soNuevoo : nombre , claveOrigen:clav},
        success:function(data){
            $("#datos2").dialog("close"); 
            br()
        }
    });
}

function agregaSO(){
    $("#addSO").show();
    $("#modify").hide();
}
function modificaSO(){
    $("#addSO").hide();
    $("#modify").show();
}


function showUnidad(){
    $("#INFOunidad").show();
    $("#DIRunidad").hide();
    $("#INFOequipo").hide();
    $("#INFOadicional").hide();
    $("#uni").addClass('active');
    $("#dire").removeClass('active');
    $("#equi").removeClass('active');
    $("#info").removeClass('active');
}
function showDireccion(){
    $("#INFOunidad").hide();
    $("#DIRunidad").show();
    $("#INFOequipo").hide();
    $("#INFOadicional").hide();
    $("#uni").removeClass('active');
    $("#dire").addClass('active');
    $("#equi").removeClass('active');
    $("#info").removeClass('active');
}
function showEquipo(){
    $("#INFOunidad").hide();
    $("#DIRunidad").hide();
    $("#INFOequipo").show();
    $("#INFOadicional").hide();
    $("#uni").removeClass('active');
    $("#dire").removeClass('active');
    $("#equi").addClass('active');
    $("#info").removeClass('active');
}
function showAdicional(){
    $("#INFOunidad").hide();
    $("#DIRunidad").hide();
    $("#INFOequipo").hide();
    $("#INFOadicional").show();
    $("#uni").removeClass('active');
    $("#dire").removeClass('active');
    $("#equi").removeClass('active');
    $("#info").addClass('active');
}


function CheckIP(IPText){
    var IPText;
    ValidIP = "IP no valida"; 
    ipParts = IPText.split(".");
    if(ipParts.length==4){
      for(i=0;i<4;i++){
        TheNum = parseInt(ipParts[i]);
        if(TheNum >= 0 && TheNum <= 255){}
        else{break;}
      }
      if(i==4)
        ValidIP=""; 
    }
    //alert(ValidIP);
    var txt= document.getElementById('txtsalida').value=ValidIP;
}

function CheckSeg(seg1){
    var seg1;
    ValidIP = "IP no valida"; 
    ipParts = seg1.split(".");
    if(ipParts.length==4){
      for(i=0;i<4;i++){
        TheNum = parseInt(ipParts[i]);
        if(TheNum >= 0 && TheNum <= 255){}
        else{break;}
      }
      if(i==4)
        ValidIP=""; 
    }
    //alert(ValidIP);
    var txt= document.getElementById('txtsalida1').value=ValidIP;
  }

function CheckSeg2(seg2){
    var seg2;
    ValidIP = "IP no valida"; 
    ipParts = seg2.split(".");
    if(ipParts.length==4){
      for(i=0;i<4;i++){
        TheNum = parseInt(ipParts[i]);
        if(TheNum >= 0 && TheNum <= 255){}
        else{break;}
      }
      if(i==4)
        ValidIP=""; 
    }
    //alert(ValidIP);
    var txt= document.getElementById('txtsalida2').value=ValidIP;
  }