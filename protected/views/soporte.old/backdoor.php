<?php if ( isset($_GET['state']) ): ?>
    <?php if ( $_GET['state'] ): ?>
        <div id="mensaje-correcto">
            <table>
                <tbody>
                <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/suceso.png"></td>
                    <td><strong>&nbsp&nbspSatisfactorio:&nbsp&nbsp&nbsp&nbsp</strong></td>
                    <td>Accion realizada con Exito!.</td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div id="mensaje-error">
            <table>
                <tbody>
                <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/alert.png"></td>
                    <td><strong>&nbsp&nbspAdvertencia:&nbsp&nbsp&nbsp&nbsp</strong></td>
                    <td>OOOPS algo salio mal, Intentalo de nuevo más tarde..</td>
                </tr>
                </tbody>
            </table>
        </div>
    <?php endif ?>
<?php endif ?>

<div style="width: 70%; margin-left: 15%">
    <div class="input-group" >
        <span class="input-group-addon">Busqueda: </span>
        <input type="text" id='criterioReporte' name='criterioReporte' class="form-control"  placeholder="Número de reporte">
    </div>
    </br></br></br>
    <div id="divBack" style="width: 90%; margin-left: 5%; padding: 3%; border-style: solid; border-color: #0066cc; border-radius: 10px; border-width: 2px;">
        <form action="<?php echo Yii::app()->request->baseUrl; ?>/site/actBack" method="post">
            <div class="form-group">
                <label for="name">Folio:</label>
                <input type="text"  readonly maxlength="200" number class="form-control" required name="folio" id="folio">
            </div>
            <div class="form-group">
                <label for="name">Correo Electrónico</label>
                <input type="text"  maxlength="200" number class="form-control" required name="mail" id="mail">
            </div>
            <div class="form-group">
                <label for="name">Número de Serie</label>
                <input type="text"  maxlength="25" number class="form-control" required name="nserie" id="nserie">
            </div>
            <div class="form-group">
                <label for="name">Falla reportada</label>
                <textarea  style="width: 100%" name="falla" id="falla" rows="8"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Ip de Origen</label>
                <input type="text"  maxlength="20" number class="form-control" required name="iporigen" id="iporigen">
            </div>
            <div class="form-group">
                <label for="name">Teléfono</label>
                <input type="text"  maxlength="15" number class="form-control" required name="telefono" id="telefono">
            </div>
            <div class="form-group">
                <label for="name">Usuario</label>
                <input type="text"  maxlength="30" number class="form-control" required name="usuario" id="usuario">
            </div>
            <div class="form-group">
                <label for="name">Contraseña</label>
                <input type="text"  maxlength="30" number class="form-control" required name="contrasena" id="contrasena">
            </div>
            <div class="form-group">
                <label for="name">Ip del equipo reportado</label>
                <input type="text"  maxlength="20" number class="form-control" required name="ipequipo" id="ipequipo">
            </div>
            <div id="div-btn">
                <button type="button" id="btnCancelarAct" onclick="$('#divBack').hide(1500);" class="btn btn-danger">Cancelar</button>
                <button type="submit" class="btn btn-success">Actualizar</button>
            </div>

        </form>
    </div>
</div>

<script language="JavaScript">
    $('#divBack').hide();
    document.getElementById("criterioReporte").addEventListener("keydown", function(e) {
        if (e.keyCode == 13) {
            ajaxBack();
        }
    }, false);
</script>