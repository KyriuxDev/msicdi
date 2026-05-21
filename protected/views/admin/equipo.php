<div id="infoEquipo" align="left">
	<table class="table">
		<tr>
			<td style="width:150px !important;"><label>Nombre del equipo</label></td>
			<td>
				<input class="form-control" type="text" id="namePC" size="28"  disabled="true" />
			</td>
			<td style="width:150px !important;"><label>Usuario (2)</label></td>
			<td>
				<input class="form-control" type="text" id="" placeholder="" size="28" disabled="true" />
			</td>
		</tr>
				<tr>
			<td style="width:150px !important;"><label>IP</label></td>
			<td>
				<form name="Test">
					<input class="form-control" type="text" name="IP" id="ip" placeholder="127.0.0.1" disabled="true" required="true" size="13" maxlength="15" onchange="CheckIP(document.Test.IP.value)">
					<input id="txtsalida" readonly="true" style="border:0px; color:red;" size="10" />
				</form>	
			</td>
			<td style="width:150px !important;"><label>Contraseña</label></td>
			<td>
				<input class="form-control" type="text" id="contra" size="28" placeholder="*********" disabled="true" />
			</td>
		</tr>
		<tr>
			<td style="width:150px !important;"><label>Sistema Operativo</label></td>
			<td>
				<select class="form-control" id="so" style="width:237px;" disabled="true"></select>
				<a href="#" style="display:none" id="editSO"> <img src="/msicdi/images/edit.png" width="20px" height="20px" onclick="openModal2();"></a>
			</td>
			<td style="width:150px !important;"><label>Matricula Responsable</label></td>
			<td>
				<input class="form-control" type="text" id="matricula" placeholder="1123000000"  readonly="true" size="28" maxlength="10" disabled="true" />
			</td>
		</tr>
		<tr>
			<td style="width:150px !important;"><label>Usuario (1)</label></td>
			<td>
				<input class="form-control" type="text" id="user1" placeholder="Usuario " size="28" disabled="true" />
			</td>
			<td style="width:150px !important;"><label>Nombre Responable</label></td>
			<td>
				<input class="form-control" type="text" id="responsable" placeholder="Responsable" disabled="true" size="40" />
			</td>
		</tr>
		<tr>
			<td style="width:150px !important;"><label>Contraseña</label></td>
			<td>
				<input class="form-control" type="text" id="contraResponsable" size="28" placeholder="**********" disabled="true" />
			</td>
			<td></td>
			<td>
			</td>
		</tr>
	</table>
</div>