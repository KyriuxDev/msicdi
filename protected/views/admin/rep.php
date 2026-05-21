<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-ui.js"></script>

<div id="mySmallModalLabel" class="modal" tabindex="-1" role="dialog" >
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <img style="margin-left: 35%;" height="100" width="100" src="/msicdi/images/loading.gif"/>
    </div>
  </div>
</div>

<div id="divControles">
    <table  class="table">
        <tr>
            <td>
               <div id="agregarGrupo">
                   <table>
                        <tr>
                            <td><img src="/msicdi/images/agregar.png"></td>
                            <td style="padding-left:10px;">Agregar Grupo</td>
                        </tr>
                    </table>
               </div>
            </td>
            <td>
               <div id="eliminarGrupo">
                   <table>
                        <tr>
                            <td><img src="/msicdi/images/eliminarG.png"></td>
                            <td style="padding-left:10px;">Eliminar Grupo</td>
                        </tr>
                    </table>
               </div>
            </td>
            <td>
               <div id="realizar">
                   <table>
                        <tr>
                            <td><img src="/msicdi/images/realizar.png"></td>
                            <td style="padding-left:10px;">Realizar Búsqueda</td>
                        </tr>
                    </table>
               </div>
            </td>
            <td>
               <div id="limpiar">
                   <table>
                        <tr>
                            <td><img src="/msicdi/images/limpiar.png"></td>
                            <td style="padding-left:10px;">Limpiar Campos</td>
                        </tr>
                    </table>
               </div>
            </td>
            <td>
               <div id="descargar">
                   <table>
                        <tr>
                            <td><img src="/msicdi/images/descargar.png"></td>
                            <td style="padding-left:10px;">Descargar</td>
                        </tr>
                    </table>
               </div>
            </td>
        </tr>
    </table>
</div>

<table class="table">
    <tr>
        <td>
            <form action="#">
                <div id="gruposHolder">
                <tag1>
                    <div id="grupo1" class="grupos">
                    </div>
                    <div id = "radios1">
                        <table style="width:60% !important; margin-left:30% !important;" class="table">
                            <tr>
                                <td >
                                   <label>
                                        &nbsp&nbsp&nbsp&nbspAND
                                        <input type="radio"  value="switchAnd"  checked id="switchAnd1" name="checkIos1" class="checkbox"/>
                                        <div id="switchAndD1"  onclick="manejarRadios(1);" class="switch"></div>
                                    </label> 
                                </td>
                                <td>
                                    <label>
                                        &nbsp&nbsp&nbsp&nbspOR
                                        <input type="radio"  value="switchOr" id="switchOr1" name="checkIos1" class="checkbox"/>
                                        <div id="switchOrD1"  onclick="manejarRadios(1);" class="switch"></div>
                                    </label>
                                </td>
                            </tr>
                        </table>
                    </div>
                    </tag1>
                </div>
            </form>
        </td>
        <td>
            <div id="campos">
            <h4>Campos Disponibles.</h4>
                <table style="width:100%">
                    <tr>
                        <td width="50%">
                            <ul>
                            <?php 
                            $cont = round(sizeof($columnas)/2);
                            for ($i=0; $i<$cont;$i++):?>
                                <li class="btn-info btn-lg" ><?php echo $columnas[$i][0]; ?></li>
                            <?php endfor ?>
                            </ul>
                        </td>
                        <td width="50%">
                            <ul>
                            <?php for ($i=$cont; $i<sizeof($columnas);$i++):?>
                                <li class="btn-info btn-lg" ><?php echo $columnas[$i][0]; ?></li>
                            <?php endfor ?>
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <ul>
                                <li class="btn-info btn-lg" >Descripcion</li>
                                <li class="btn-info btn-lg" >Municipio</li>
                                <li class="btn-info btn-lg" >Direccion</li>
                                <li class="btn-info btn-lg" >Codigo</li>
                            </ul>
                        </td>
                        <td>
                            <ul>
                                <li class="btn-info btn-lg" >Marca</li>
                                <li class="btn-info btn-lg" >Modelo</li>
                            </ul>
                        </td>
                    </tr>
                </table>
            </div>
        </td>
    </tr>
</table>
<input type="hidden" id="inptDropped" value="grupo1">
<input type="hidden" id="cns" value="nd">
<div id="divExcel">
    
</div>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'tipoFiltro',
        'options'=>array(
                        'title'     => '   Filtro Campo', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 500,
                        'height'    => 350,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'close'     => 'js:function(){$("body").removeClass("modal-open");}',
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Aceptar' => 'js:aceptarDialog',
                           'Cancelar'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open"); $("#inptCriterio").val("");}',
                        ),

                    ),
    ));
        include("tipo.php");//Contenido del modal
        $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'Referencia',
        'options'=>array(
                        'title'     => '     Referencia - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("referencia.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'ClaveSO',
        'options'=>array(
                        'title'     => '     Sistema Operativo - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("so.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'CC',
        'options'=>array(
                        'title'     => '     CC - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("cc.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'ClaveStatus',
        'options'=>array(
                        'title'     => '     Estatus - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("status.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'ClaveRegimen',
        'options'=>array(
                        'title'     => '     Clave De Regimen - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("regimen.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'UI',
        'options'=>array(
                        'title'     => '     UI- Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("ui.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'ClaveFondo',
        'options'=>array(
                        'title'     => '     Fondo - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("fondo.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'id_hw',
        'options'=>array(
                        'title'     => '     Hardware - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("hard.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
    $this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'Matricula',
        'options'=>array(
                        'title'     => '     Encargado - Haga Doble Click Sobre La Fila Para Seleccionar.', //titulo del modal
                        'autoOpen'  => false,
                        'modal'     => true,
                        'width'     => 1000,
                        'height'    => 500,
                        'draggable' => false,
                        'resizable' => false,
                        'position'  => 'center',
                        'overlay'   => array(
                            'backgroundColor'   => 'black',
                            'opacity'           => 0.5,
                        ),
                        'show'      => 'shake',
                        'hide'      => 'blind', 
                        'buttons'   => array(
                            'Cancel'=>'js:function(){$(this).dialog("close");$("body").removeClass("modal-open");}',//
                        ),

                    ),
    ));
        include("matricula.php");//Contenido del modal
    $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
 
<script type="text/javascript">    
    $(function() {

        $("li").draggable({containment:'document',revert:true});
        $('#grupo1').droppable({
            drop: function(event,ui){
                dropF(this,ui);
            }
        });

        $('#limpiar').click(function(){
            r = confirm("Esta accion borrará todos los filtros que haya configurado\n\n¿Desea Continuar?\n");
            if (r == true) {
                window.location.href = '/msicdi/admin/reporteinv.html';
            } 
        });
        $('#descargar').click(function(){
            cr = $('#cns').val();
            html = $('#divExcel').html();
            if( cr != 'nd' && html.length > 0){
                window.location.href = '/msicdi/site/excel?cr='+cr;
            }else
                alert('No hay nada que descargar. !');
        });
        $('#realizar').click(function(){
            htmls = [];
            checkboxs = [];
            for ( i = 1; i <= contadorGrupos; i++) {
                temp = $('#grupo'+i).html();
                temp = temp.trim();
                if( temp.length > 0 ){
                    htmls.push(temp);
                }
                checkboxs.push($('input[name=checkIos'+i+']:checked').val());
            }
            
            htmls.forEach(function(item, index){
                htmls[index] = getConsulta(item);
            });
            if( htmls.length >0 ){
                $('#mySmallModalLabel').addClass('fade');
                $('body').addClass('modal-open');
                $('#mySmallModalLabel').addClass('in');
                $('#mySmallModalLabel').css('display','block');
                $('#mySmallModalLabel').css('margin-top','15%');
                $('body').append('<div id="tmp" class="modal-backdrop fade in"></div>');
                finalQuery = ""
                htmls.forEach(function(item, index){
                    finalQuery += item+' '+((checkboxs[index]=='switchAnd')?'AND':'OR')+' ';
                });
                finalQuery = finalQuery.substring(0,finalQuery.length-4).trim();
                ajaxRepInv(finalQuery);
            }else
                alert('No ha introducido ningun filtro !!');
        });

        $('#agregarGrupo').click(function(){
            $('#radios'+contadorGrupos).show();
            contadorGrupos++;
            htmlActual=$('#gruposHolder').html();
            nuevohtml=
                    '<tag'+contadorGrupos+'>'+
                    '<div id="grupo'+contadorGrupos+'" class="grupos">'+
                    '</div>'+
                    '<div id="radios'+contadorGrupos+'" style="display: block;">'+
                        '<table style="width:60% !important; margin-left:30% !important;" class="table">'+
                            '<tbody><tr>'+
                                '<td>'+
                                   '<label>'+
                                        '&nbsp;&nbsp;&nbsp;&nbsp;AND'+
                                        '<input type="radio" value="switchAnd" checked id="switchAnd'+contadorGrupos+'" name="checkIos'+contadorGrupos+'" class="checkbox">'+
                                        '<div id="switchAndD'+contadorGrupos+'" onclick="manejarRadios('+contadorGrupos+');" class="switch switchOn"></div>'+
                                    '</label>'+ 
                                '</td>'+
                                '<td>'+
                                    '<label>'+
                                        '&nbsp;&nbsp;&nbsp;&nbsp;OR'+
                                        '<input type="radio" value="switchOr" id="switchOr'+contadorGrupos+'" name="checkIos'+contadorGrupos+'" class="checkbox">'+
                                        '<div id="switchOrD'+contadorGrupos+'" onclick="manejarRadios('+contadorGrupos+');" class="switch"></div>'+
                                    '</label>'+
                                '</td>'+
                            '</tr>'+
                        '</tbody></table>'+
                    '</div>'+
                    '</tag'+contadorGrupos+'>';
            $('#gruposHolder').html(htmlActual+nuevohtml);
            $('#radios'+contadorGrupos).hide();
            gruposCad = "#grupo1";
            for (i = 2; i <= contadorGrupos; i++) {
                gruposCad += ", #grupo"+i;
            };
            $(gruposCad).droppable({
                drop: function(event,ui){
                    dropF(this,ui);
                }
            });
        });

        $('#eliminarGrupo').click(function(){
            if( contadorGrupos == 1){
                alert("Ya no se pueden eliminar Grupos")
            }else{
                r = confirm("Esta accion eliminará el último grupo creado\n\n¿Desea Continuar?\n");
                if (r == true) {
                    html = $('#gruposHolder').html();
                    contador = html.indexOf('<tag'+contadorGrupos+'>');
                    nhtml = html.substring(0,contador);
                    $('#gruposHolder').html(nhtml);
                    contadorGrupos--;
                    gruposCad = "#grupo1";
                    for (i = 2; i <= contadorGrupos; i++) {
                        gruposCad += ", #grupo"+i;
                    };
                    $(gruposCad).droppable({
                        drop: function(event,ui){
                            dropF(this,ui);
                        }
                    });
                    $('#radios'+contadorGrupos).hide();
                } 
            }
        });
        $('#radios1').hide();


    });

    $('#switchAndD1').toggleClass("switchOn");
    
    function dropF(objeto,ui){
        //console.log(ui.draggable.html()+' - '+objeto.id);
        $('#inptDropped').val(objeto.id);
        mostrarDialogFiltro(ui.draggable.html());

    }
    
    function manejarRadios(num){
       // if(!document.getElementById(div.id+''+div.name).checked){
        $('#switchAndD'+num).toggleClass("switchOn");
        $('#switchOrD'+num).toggleClass("switchOn");
        //}
        //$('#switchAnd').toggleClass("switchOn");
        //$('#switchOr').toggleClass("switchOn");
    }

    function mostrarDialogFiltro(campo){
        $("#dCriterio").html('<h3>'+campo+'</h3>');
        $("body").addClass("modal-open");
        foraneo = '';
        if( campo=='Referencia' || campo=='ClaveSO' || campo=='CC' || campo=='ClaveStatus' || campo=='ClaveRegimen' || campo=='UI' || campo=='ClaveFondo' || campo=='id_hw' || campo=='Matricula'){
            foraneo = '<a href="javascript:mostrarDialogForaneo(\''+campo+'\');"><img src="/msicdi/images/valores.png" alt="Elegir Valores Foráneos"></a>';
        }
        $('#divForaneos').html(foraneo);
        $("#tipoFiltro").dialog("open"); 
    }


    function mostrarDialogForaneo(campo){
        $("body").addClass("modal-open");
        $("#"+campo).dialog("open"); 
    }


    function aceptarDialog(){
        criterio = $('#inptCriterio').val();
        if( criterio.length > 0){
            $('#tipoFiltro').dialog("close");
            campo = $('#dCriterio').html();
            campo = campo.substring(4,campo.length-5);
            operador = $( "#selectFTipo option:selected" ).text();
            grup = $('#inptDropped').val();
            if( operador == 'LIKE %...%' ){
                $('#'+grup).append('<tg>'+campo+' LIKE "%'+criterio+'%"</tg><br>');
            }else
                $('#'+grup).append('<tg>'+campo+' '+operador+' "'+criterio+'"</tg><br>');
            $('#inptCriterio').val('');
        }else
            alert("Introduzca un criterio de búsqueda.");
    }

    function getConsulta(arg){
        //console.log(arg)
        cad = arg.substring(0,arg.length-4);
        partes = cad.split('<br>');
        clausula = "( "
        for ( i = 0; i < partes.length; i++) {
            partes[i] = partes[i].substring(4,partes[i].length-5)
            clausula += partes[i]+" AND ";
        };
        clausula = clausula.substring(0,clausula.length-4);
        clausula += ") ";
        return clausula;
    }

    function alertas(arg){
        alert(arg)
    }

    
</script>
