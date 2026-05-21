<div id='infoUnity' align="left">
  <table class="table">
    <tr>
      <td style="width:150px !important;"><label>Referencia</label></td>
      <td><input class="form-control"  type='text' placeholder='Referencia' id='referencia' size="50"  disabled="true" readonly="true" /></td>   
    </tr>
    <tr>
      <td><label>Segmento</label></td>
        <td>
        <form name="seg1">
          <input class="form-control"  type="text" name="seg1" id="seg1" placeholder="127.0.0.1" disabled="true" required="true" size="50" maxlength="15" onchange="CheckSeg(document.seg1.seg1.value)">
          <input id="txtsalida1" readonly="true" style="border:0px; color:red;" size="10" />
        </form> 
        </td>
      </td>   
    </tr>
    <tr>
      <td><label>Segmento 2</label></td>
      <td>
      <form name="seg">
        <input class="form-control"  type="text" name="seg" id="seg2" placeholder="127.0.0.1" disabled="true" required="true" size="50" maxlength="15" onchange="CheckSeg2(document.seg.seg.value)">
        <input id="txtsalida2" readonly="true" style="border:0px; color:red;" size="10" />
        </form>
      </td>   
    </tr>
    <tr>
      <td><label>Codigo VPN</label></td>
      <td><input class="form-control"  type='text' placeholder='0.0000' id='vpn' size="50" maxlength="4" disabled="true"/></td>   
    </tr>
  </table>
</div>



<!--
<div id='infoUnity' align="left">
  <table class="table">
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon">Referencia</span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon">Segmento 1</span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon">Segmento 2</span>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="input-group">
            <span class="input-group-addon">Codigo VPN</span>
          </div>
        </td>
      </tr>
  </table>
</div>
-->
