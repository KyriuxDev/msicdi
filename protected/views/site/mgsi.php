<?php $this->pageTitle = Yii::app()->name . ' - MGSI'; ?>

<h3>Documentos de Seguridad</h3>
<br/>

<style>
    .pdf-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-bottom: 30px;
    }
    .pdf-btn {
        background-color: #5b9bd5;
        color: white;
        border: none;
        padding: 10px 16px;
        border-radius: 6px;
        cursor: pointer;
        font-size: 13px;
        max-width: 260px;
        text-align: left;
        word-break: break-word;
    }
    .pdf-btn:hover {
        background-color: #3a7abf;
    }
    #visor-container {
        display: none;
        margin-top: 20px;
        border: 1px solid #ccc;
        border-radius: 6px;
        overflow: hidden;
    }
    #visor-header {
        background: #3a7abf;
        color: white;
        padding: 8px 14px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-size: 14px;
    }
    #btn-cerrar {
        background: transparent;
        border: 1px solid white;
        color: white;
        border-radius: 4px;
        padding: 2px 10px;
        cursor: pointer;
        font-size: 13px;
    }
    #visor-pdf {
        width: 100%;
        height: 700px;
        border: none;
    }
</style>

<?php
$pdfs = array(
    'Aprobación de controles de seguridad'  => 'Aprobación de controles de seguridad.pdf',
    'Clasificación y Valoración de Info'    => 'SGMP_MGSI_CtrlClasyValInfo.pdf',
    'Correo Electrónico Mensajería Inst.'   => 'SGMP_MGSI_CtrlCorElectMenInst.pdf',
    'Licenciamiento de SW'                  => 'SGMP_MGSI_CtrlLicenSW.pdf',
    'Protección de Equipos Físicos'         => 'SGMP_MGSI_CtrlProteEquiFisicos.pdf',
    'Protección contra Virus y Código'      => 'SGMP_MGSI_CtrlProtVirusCodigo.pdf',
    'Proveedores de Servicio'               => 'SGMP_MGSI_CtrlProvServ.pdf',
    'Redes y Datos'                         => 'SGMP_MGSI_CtrlRedesDatos.pdf',
    'Respaldo y Borrado de Info'            => 'SGMP_MGSI_CtrlRespBorradoInf.pdf',
    'Desarrollo de SW'                      => 'SGMP_MGSI_CtrlSegDesaSW.pdf',
    'Administración y Actividades de Seg.'  => 'SGMP_MGSI_CtrlSegInfAdmActSeg.pdf',
    'Administración de Bitácoras'           => 'SGMP_MGSI_CtrlSegInfAdmBit.pdf',
    'Base de Datos'                         => 'SGMP_MGSI_CtrlSegInfBD.pdf',
    'Cifrado de Datos'                      => 'SGMP_MGSI_CtrlSegInfCifDat.pdf',
    'Control de Acceso'                     => 'SGMP_MGSI_CtrlSegInfCtrlAcc.pdf',
    'Seguridad Física y del Personal'       => 'SGMP_MGSI_CtrlSegInfSegFisPer.pdf',
    'Servicios de Internet'                 => 'SGMP_MGSI_CtrlServInstInternet.pdf',
    'Tecnología Móvil'                      => 'SGMP_MGSI_CtrlTecnoMovil.pdf',
    'Uso Aceptable de Activos'              => 'SGMP_MGSI_CtrlUsoAcepAct.pdf',
);
$base = Yii::app()->request->baseUrl . '/seguridad/';
?>

<div class="pdf-grid">
<?php foreach ($pdfs as $label => $archivo): ?>
    <button class="pdf-btn" onclick="abrirPDF('<?php echo $base . rawurlencode($archivo); ?>', '<?php echo htmlspecialchars($label); ?>')">
        📄 <?php echo htmlspecialchars($label); ?>
    </button>
<?php endforeach; ?>
</div>

<div id="visor-container">
    <div id="visor-header">
        <span id="visor-titulo">Documento</span>
        <button id="btn-cerrar" onclick="cerrarVisor()">✕ Cerrar</button>
    </div>
    <iframe id="visor-pdf" src=""></iframe>
</div>

<script type="text/javascript">
    function abrirPDF(url, titulo) {
        document.getElementById('visor-pdf').src = url;
        document.getElementById('visor-titulo').textContent = titulo;
        document.getElementById('visor-container').style.display = 'block';
        document.getElementById('visor-container').scrollIntoView({ behavior: 'smooth' });
    }
    function cerrarVisor() {
        document.getElementById('visor-container').style.display = 'none';
        document.getElementById('visor-pdf').src = '';
    }
</script>