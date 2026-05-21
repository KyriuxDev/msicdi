<?php
$emailReportador = isset($dat[0]['eMail']) ? $dat[0]['eMail'] : '';
$loginReportador = '';
$sinCorreo       = true;

if ($emailReportador !== 'sin@correo' && strpos($emailReportador, '@imss.gob.mx') !== false) {
    $login           = explode('@', $emailReportador)[0];
    $loginReportador = $login;
    $sinCorreo       = false;
}
?>

<div id="divHelixWO" style="display:none;">
    <div style="width: 80%; margin-left: 10%;">

        <div id="helixMensaje" style="display:none;"></div>

        <!-- ═══════════════════════════════════════════════════════════════ -->
        <!-- PANTALLA DE CARGA                                               -->
        <!-- ═══════════════════════════════════════════════════════════════ -->
        <div id="helixLoading" style="display:none; text-align:center; padding:60px 20px;">
            <style>
                .helix-spinner {
                    display: inline-block;
                    width: 56px;
                    height: 56px;
                    border: 6px solid #e0e0e0;
                    border-top-color: #2e7d32;
                    border-radius: 50%;
                    animation: helixSpin 0.85s linear infinite;
                }
                @keyframes helixSpin {
                    to { transform: rotate(360deg); }
                }
            </style>
            <div class="helix-spinner"></div>
            <p style="margin-top:20px; font-size:16px; color:#555;">
                Enviando ticket a Helix, por favor espere&hellip;
            </p>
        </div>

        <!-- ═══════════════════════════════════════════════════════════════ -->
        <!-- PANEL DE ÉXITO                                                  -->
        <!-- ═══════════════════════════════════════════════════════════════ -->
        <div id="helixExito" style="display:none; text-align:center; padding:40px 20px;">
            <style>
                .helix-exito-icono {
                    width: 72px; height: 72px;
                    background: #2e7d32;
                    border-radius: 50%;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 16px;
                }
                .helix-exito-icono svg { width:38px; height:38px; fill:none; stroke:#fff; stroke-width:3; stroke-linecap:round; stroke-linejoin:round; }
                .helix-codigo-badge {
                    display: inline-block;
                    background: #e8f5e9;
                    border: 2px solid #a5d6a7;
                    border-radius: 8px;
                    padding: 12px 28px;
                    font-size: 26px;
                    font-weight: bold;
                    color: #1b5e20;
                    letter-spacing: 2px;
                    margin: 12px 0 20px;
                }
                .helix-nota-badge {
                    display: inline-block;
                    background: #fff8e1;
                    border: 1px solid #ffe082;
                    border-radius: 6px;
                    padding: 8px 18px;
                    font-size: 13px;
                    color: #5d4037;
                    margin-bottom: 24px;
                }
            </style>
            <div class="helix-exito-icono">
                <svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg>
            </div>
            <h3 style="color:#2e7d32; margin-top:0;">¡Ticket enviado exitosamente!</h3>
            <p style="color:#555; font-size:15px;">El número asignado por Helix es:</p>
            <div class="helix-codigo-badge" id="helixCodigoMostrado">—</div>
            <br>
            <div class="helix-nota-badge">
                ✓ El código fue registrado automáticamente como nota interna en este reporte.
            </div>
            <div id="helixAvisoCorreo"
                style="display:none; margin-top:10px; padding:8px 12px;
                        background:#fff3cd; border:1px solid #ffc107;
                        border-radius:4px; color:#856404; font-size:13px;">
            </div>
            <br>
            <button type="button" class="btn btn-success" onclick="helixCerrarYRecargar();">
                Aceptar y cerrar
            </button>
        </div>

        <!-- ═══════════════════════════════════════════════════════════════ -->
        <!-- PANEL DE ERROR                                                   -->
        <!-- ═══════════════════════════════════════════════════════════════ -->
        <div id="helixError" style="display:none; text-align:center; padding:40px 20px;">
            <style>
                .helix-error-icono {
                    width: 72px; height: 72px;
                    background: #c62828;
                    border-radius: 50%;
                    display: inline-flex;
                    align-items: center;
                    justify-content: center;
                    margin-bottom: 16px;
                }
                .helix-error-icono svg {
                    width:38px; height:38px; fill:none;
                    stroke:#fff; stroke-width:3;
                    stroke-linecap:round; stroke-linejoin:round;
                }
                .helix-error-badge {
                    display: inline-block;
                    background: #ffebee;
                    border: 2px solid #ef9a9a;
                    border-radius: 8px;
                    padding: 12px 28px;
                    font-size: 15px;
                    font-weight: bold;
                    color: #b71c1c;
                    margin: 12px 0 8px;
                    max-width: 90%;
                    word-break: break-word;
                }
                .helix-error-codigo {
                    display: inline-block;
                    background: #fff3e0;
                    border: 1px solid #ffcc80;
                    border-radius: 6px;
                    padding: 6px 16px;
                    font-size: 12px;
                    color: #e65100;
                    margin-bottom: 24px;
                    font-family: monospace;
                }
            </style>

            <!-- Ícono X -->
            <div class="helix-error-icono">
                <svg viewBox="0 0 24 24">
                    <line x1="18" y1="6" x2="6" y2="18"/>
                    <line x1="6"  y1="6" x2="18" y2="18"/>
                </svg>
            </div>

            <h3 style="color:#c62828; margin-top:0;">Error al registrar en Helix</h3>
            <p style="color:#555; font-size:15px;">El servidor Helix devolvió el siguiente mensaje:</p>

            <div class="helix-error-badge" id="helixErrorMensaje">—</div>
            <br>
            <div class="helix-error-codigo" id="helixErrorCodigo"></div>
            <br>

            <button type="button" class="btn btn-default"
                    style="margin-right:8px;" onclick="helixVolverFormulario();">
                Corregir y/o reintentar
            </button>
            <button type="button" class="btn btn-danger" onclick="cerrarHelixWO();">
                Cancelar
            </button>
        </div>

        <!-- ═══════════════════════════════════════════════════════════════ -->
        <!-- FORMULARIO HELIX                                                -->
        <!-- ═══════════════════════════════════════════════════════════════ -->
        <div id="helixFormContenedor"
             style="width: 95%; margin-left: 2%; padding: 3%;
                    border-style: solid; border-color: #000000;
                    border-radius: 10px; border-width: 1px;">

            <div style="display: flex; justify-content: center; align-items: center; width: 100%;">
                <h4 style="color: green;">Formulario Helix</h4>
            </div>

            <!-- ESTILOS -->
            <style>
                .helix-tipo-btn {
                    display: inline-block;
                    padding: 10px 28px;
                    margin-right: 8px;
                    border-radius: 6px;
                    border: 2px solid transparent;
                    cursor: pointer;
                    font-weight: bold;
                    font-size: 14px;
                    transition: all 0.2s ease;
                    user-select: none;
                }
                .helix-tipo-btn input[type="radio"] { display: none; }
                #btnTipoWO  { background-color:#ffffff; border-color:#a5d6a7; color:#388e3c; }
                #btnTipoWO.helix-activo  { background-color:#2e7d32; border-color:#1b5e20; color:#ffffff; }
                #btnTipoInc { background-color:#ffffff; border-color:#a5d6a7; color:#388e3c; }
                #btnTipoInc.helix-activo { background-color:#2e7d32; border-color:#1b5e20; color:#ffffff; }

                .helix-panel-toggle {
                    cursor: pointer;
                    user-select: none;
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                }
                .helix-panel-toggle .helix-flecha {
                    font-size: 12px;
                    transition: transform 0.25s ease;
                    display: inline-block;
                }
                .helix-panel-toggle.collapsed .helix-flecha {
                    transform: rotate(-90deg);
                }
            </style>

            <!-- TIPO -->
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Tipo de Registro</strong></div>
                <div class="panel-body">
                    <label class="helix-tipo-btn helix-activo" id="btnTipoWO"
                           onclick="helixCambiarTipo('wo');">
                        <input type="radio" name="helix_tipo" value="wo" checked> Servicio
                    </label>
                    <label class="helix-tipo-btn" id="btnTipoInc"
                           onclick="helixCambiarTipo('incidente');">
                        <input type="radio" name="helix_tipo" value="incidente"> Incidente
                    </label>
                </div>
            </div>

            <!-- IDENTIFICACIÓN -->
            <input type="hidden" id="helix_nRastreo" value="<?php echo htmlspecialchars($codigo); ?>"/>

            <div class="panel panel-default">
                <div class="panel-heading"><strong>Identificación</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Folio MSL (Número de Ticket)</label>
                                <input type="text" class="form-control" id="helix_ticket"
                                       readonly value="<?php echo htmlspecialchars($codigo); ?>"/>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Nombre del Proveedor</label>
                                <input type="text" class="form-control" id="helix_proveedor"
                                       readonly value="SOPORTE ADMIN OAX"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- DESCRIPCIÓN -->
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Descripción</strong></div>
                <div class="panel-body">
                    <div class="form-group">
                        <label>Resumen <span style="color:red">*</span></label>
                        <input type="text" class="form-control" id="helix_resumen"
                               maxlength="200"
                               placeholder="Resumen breve del problema (máx. 100 caracteres)"
                               value="<?php echo htmlspecialchars(
                                   isset($dat[0]['descripcionFalla'])
                                       ? substr($dat[0]['descripcionFalla'], 0, 100)
                                       : ''
                               ); ?>"/>
                    </div>
                    <div class="form-group">
                        <label>Notas / Falla</label>
                        <textarea class="form-control" id="helix_notas" rows="5"
                                  placeholder="Descripción de la falla"><?php echo htmlspecialchars(
                            isset($dat[0]['descripcionFalla']) ? $dat[0]['descripcionFalla'] : ''
                        ); ?></textarea>
                    </div>
                </div>
            </div>

            <!-- PRIORIDAD -->
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Prioridad</strong></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Prioridad</label>
                                <select class="form-control" id="helix_prioridad">
                                    <option value="0">Crítica (Critical)</option>
                                    <option value="1">Alta (High)</option>
                                    <option value="2">Media (Medium)</option>
                                    <option value="3" selected>Baja (Low)</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4" id="helix_panel_impacto" style="display:none;">
                            <div class="form-group">
                                <label>Impacto</label>
                                <select class="form-control" id="helix_impacto">
                                    <option value="1000">1 - Extenso/Generalizado</option>
                                    <option value="2000">2 - Significativo/Amplio</option>
                                    <option value="3000">3 - Moderado/Limitado</option>
                                    <option value="4000" selected>4 - Menor/Localizado</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4" id="helix_panel_urgencia" style="display:none;">
                            <div class="form-group">
                                <label>Urgencia</label>
                                <select class="form-control" id="helix_urgencia">
                                    <option value="1000">1 - Crítica (Critical)</option>
                                    <option value="2000">2 - Alta (High)</option>
                                    <option value="3000">3 - Media (Medium)</option>
                                    <option value="4000" selected>4 - Baja (Low)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORÍAS OPERACIONALES — colapsado por defecto -->
            <div class="panel panel-default">
                <div class="panel-heading helix-panel-toggle collapsed"
                     onclick="helixTogglePanel('helix_cat_ope_body', this)">
                    <strong>Categorías Operacionales</strong>
                    <span class="helix-flecha">&#9660;</span>
                </div>
                <div class="panel-body" id="helix_cat_ope_body" style="display:none;">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Operacional 1</label>
                                <select class="form-control" id="helix_cat_ope_1">
                                    <option value="APLICACIONES" selected>APLICACIONES</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Operacional 2</label>
                                <select class="form-control" id="helix_cat_ope_2">
                                    <option value="ATENCION DE APLICACIONES" selected>ATENCION DE APLICACIONES</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Operacional 3</label>
                                <select class="form-control" id="helix_cat_ope_3">
                                    <option value="CONFIGURAR" selected>CONFIGURAR</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CATEGORÍAS DE PRODUCTO — colapsado por defecto -->
            <div class="panel panel-default">
                <div class="panel-heading helix-panel-toggle collapsed"
                     onclick="helixTogglePanel('helix_cat_prod_body', this)">
                    <strong>Categorías de Producto</strong>
                    <span class="helix-flecha">&#9660;</span>
                </div>
                <div class="panel-body" id="helix_cat_prod_body" style="display:none;">
                    <div class="row">
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Producto 1</label>
                                <select class="form-control" id="helix_cat_prod_1">
                                    <option value="HARDWARE" selected>HARDWARE</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Producto 2</label>
                                <select class="form-control" id="helix_cat_prod_2">
                                    <option value="COMPUTO PERSONAL" selected>COMPUTO PERSONAL</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-4">
                            <div class="form-group">
                                <label>Cat. Producto 3</label>
                                <select class="form-control" id="helix_cat_prod_3">
                                    <option value="PC" selected>PC</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Nombre del Producto</label>
                        <input readonly value type="text" class="form-control" id="helix_nombre_prod"
                               maxlength="100" placeholder="Ej. Laptop, Impresora, etc. (opcional)"/>
                    </div>
                </div>
            </div>

            <!-- CLIENTE Y CONTACTO -->
            <div class="panel panel-default">
                <div class="panel-heading"><strong>Cliente y Contacto</strong></div>
                <div class="panel-body">
                    <p class="text-muted" style="font-size:12px;">
                        Seleccione el personal del listado. El campo de texto permite
                        corregir el login si difiere del generado automáticamente.
                    </p>
                    <div class="row">
                        <!-- CLIENTE -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Cliente — Seleccionar del personal</label>
                                <select class="form-control" id="helix_sel_cliente"
                                        onchange="helixCargarLogin('cliente');">
                                    <option value="">Cargando...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ID Login Cliente <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="helix_login_cliente"
                                       maxlength="100"
                                       placeholder="<?php echo $sinCorreo ? 'Sin correo institucional registrado' : 'ej. edgar.sibaja'; ?>"
                                       value=""/>
                                <?php if ($sinCorreo): ?>
                                    <span class="help-block" style="font-size:11px; color:#e65100;">
                                        <strong>⚠ Sin correo institucional registrado.</strong>
                                    </span>
                                <?php else: ?>
                                    <span class="help-block" style="font-size:11px;">
                                        Puede editarlo manualmente si el login difiere.
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- CONTACTO -->
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label>Contacto — Seleccionar del personal</label>
                                <select class="form-control" id="helix_sel_contacto"
                                        onchange="helixCargarLogin('contacto');">
                                    <option value="">Cargando...</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>ID Login Contacto <span style="color:red">*</span></label>
                                <input type="text" class="form-control" id="helix_login_contacto"
                                       maxlength="100" placeholder="ej. nubia.diaz" value=""/>
                                <span class="help-block" style="font-size:11px;">
                                    Puede editarlo manualmente si el login difiere.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="div-btn" style="margin-top:10px;">
                <button type="button" class="btn btn-danger"  onclick="cerrarHelixWO();">Cancelar</button>
                <button type="button" class="btn btn-success" id="helixBtnEnviar" onclick="enviarHelixWO();">
                    Enviar a Helix
                </button>
            </div>

        </div><!-- /helixFormContenedor -->

        <!-- Respuesta XML (debug, oculto por defecto) -->
        <div id="helixRespuestaXML" style="display:none; margin-top:15px;">
            <h4><font color="green">Respuesta del servidor:</font></h4>
            <pre id="helixXMLContenido"
                 style="background:#f5f5f5; padding:10px;
                        border:1px solid #ccc; overflow-x:auto;
                        font-size:11px;"></pre>
        </div>

    </div>
</div>

<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/helix.js"></script>
<script>
$(document).ready(function() {
    helixInit(
        '<?php echo addslashes(isset($dat[0]['soporte']) ? trim($dat[0]['soporte']) : ''); ?>',
        '<?php echo addslashes($loginReportador); ?>',
        <?php echo $sinCorreo ? 'true' : 'false'; ?>
    );
});
</script>
