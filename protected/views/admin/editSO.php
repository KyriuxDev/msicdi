<div style="width: 100%">
    <ul class="nav nav-tabs nav-justified" role="tablist">
        <li id="agrSO" class="active"><a href="javascript:agregaSO();">Agregar Nuevo Sistema Operativo</a></li>
        <li id="edSO"><a href="javascript:modificaSO();">Editar Sistema Operativo Existente</a></li>
    </ul>
</div>
<br><br><br>

<div id="addSO" style="display:none">
    <table class="table">
        <tr class="success">
            <th>Clave del Sistema Operativo</th>
            <th>Nombre del Sistema Operativo</th>
        </tr>
        <tr>
            <td>
                <input	placeholder="Clave del Sistema Operativo" class="form-control" type="text" id="claveSO" value="" /><br/>
            </td>
            <td>
                <input placeholder="Nombre del Sistema Operativo" class="form-control" type="text" id="newSO" value="" />
            </td>
        </tr>
    </table>
    <button class="btn btn-success" type="button" value="Agregar" onclick="insertaSO();">
        Agregar Sistema Operativo
    </button>
</div>

<div id="modify" style="display:none">
    <table class="table">
        <tr class="success">
            <th>Nombre Actual</th>
            <th>Nuevo Nombre</th>
        </tr>
        <tr>
            <td>
                <select class="form-control" id="soEd" style="margin-top:-.5px !important;" disabled="true" onchange="loadSO();" readonly="true"></select>
            </td>
            <td>
                <input class="form-control" type="text" id="soNuevo" value=""/>
            </td>
        </tr>
    </table>
	<input type="text" id="claveEdit" readonly="true" style="display:none" />
    <button class="btn btn-info" type="button" value="Actualizar"  onclick="updateSO();">
        Actualizar Sistema Operativo
    </button>

</div>

<script type="text/javascript">
    agregaSO();
</script>