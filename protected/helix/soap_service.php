<?php

require_once 'config.php';

function construir_soap(array $datos) {
    $e = function($v) { return htmlspecialchars($v, ENT_XML1, 'UTF-8'); };

    return '<?xml version="1.0" encoding="utf-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:Creacion_Orden_Trabajo_Helix">
   <soapenv:Header>
      <urn:AuthenticationInfo>
         <urn:userName>'   . $e(SOAP_USER) . '</urn:userName>
         <urn:password>'   . $e(SOAP_PASS) . '</urn:password>
         <urn:authentication></urn:authentication>
         <urn:locale></urn:locale>
         <urn:timeZone></urn:timeZone>
         <urn:apiTimeouts></urn:apiTimeouts>
      </urn:AuthenticationInfo>
   </soapenv:Header>
   <soapenv:Body>
      <urn:Creacion_Orden_Trabajo>
         <urn:Nombre_del_Proveedor>' . $e($datos['proveedor'])    . '</urn:Nombre_del_Proveedor>
         <urn:Resumen>'              . $e($datos['resumen'])       . '</urn:Resumen>
         <urn:Notas>'                . $e($datos['notas'])         . '</urn:Notas>
         <urn:Prioridad>'            . $e($datos['prioridad'])     . '</urn:Prioridad>
         <urn:Cat_Ope_1>'            . $e($datos['cat_ope_1'])     . '</urn:Cat_Ope_1>
         <urn:Cat_Ope_2>'            . $e($datos['cat_ope_2'])     . '</urn:Cat_Ope_2>
         <urn:Cat_Ope_3>'            . $e($datos['cat_ope_3'])     . '</urn:Cat_Ope_3>
         <urn:Cat_Prod_1>'           . $e($datos['cat_prod_1'])    . '</urn:Cat_Prod_1>
         <urn:Cat_Prod_2>'           . $e($datos['cat_prod_2'])    . '</urn:Cat_Prod_2>
         <urn:Cat_Prod_3>'           . $e($datos['cat_prod_3'])    . '</urn:Cat_Prod_3>
         <urn:Nombre_Producto>'      . $e($datos['nombre_prod'])   . '</urn:Nombre_Producto>
         <urn:Numero_ticket_MSL>'    . $e($datos['ticket_msl'])    . '</urn:Numero_ticket_MSL>
         <urn:ID_login_cliente>'     . $e($datos['login_cliente']) . '</urn:ID_login_cliente>
         <urn:ID_login_contacto>'    . $e($datos['login_contacto']). '</urn:ID_login_contacto>
      </urn:Creacion_Orden_Trabajo>
   </soapenv:Body>
</soapenv:Envelope>';
}

function construir_soap_incidente(array $datos) {
    $e = function($v) { return htmlspecialchars($v, ENT_XML1, 'UTF-8'); };

    return '<?xml version="1.0" encoding="utf-8"?>
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:urn="urn:Creacion_Incidente_Helix">
   <soapenv:Header>
      <urn:AuthenticationInfo>
         <urn:userName>'   . $e(SOAP_USER) . '</urn:userName>
         <urn:password>'   . $e(SOAP_PASS) . '</urn:password>
         <urn:authentication></urn:authentication>
         <urn:locale></urn:locale>
         <urn:timeZone></urn:timeZone>
         <urn:apiTimeouts></urn:apiTimeouts>
      </urn:AuthenticationInfo>
   </soapenv:Header>
   <soapenv:Body>
      <urn:Creacion_Incidentes>
         <urn:Nombre_del_Proveedor>' . $e($datos['proveedor'])     . '</urn:Nombre_del_Proveedor>
         <urn:Resumen>'              . $e($datos['resumen'])        . '</urn:Resumen>
         <urn:Notas>'                . $e($datos['notas'])          . '</urn:Notas>
         <urn:Impacto>'              . $e($datos['impacto'])        . '</urn:Impacto>
         <urn:Urgencia>'             . $e($datos['urgencia'])       . '</urn:Urgencia>
         <urn:Prioridad>'            . $e($datos['prioridad'])      . '</urn:Prioridad>
         <urn:Cat_Ope_1>'            . $e($datos['cat_ope_1'])      . '</urn:Cat_Ope_1>
         <urn:Cat_Ope_2>'            . $e($datos['cat_ope_2'])      . '</urn:Cat_Ope_2>
         <urn:Cat_Ope_3>'            . $e($datos['cat_ope_3'])      . '</urn:Cat_Ope_3>
         <urn:Cat_Prod_1>'           . $e($datos['cat_prod_1'])     . '</urn:Cat_Prod_1>
         <urn:Cat_Prod_2>'           . $e($datos['cat_prod_2'])     . '</urn:Cat_Prod_2>
         <urn:Cat_Prod_3>'           . $e($datos['cat_prod_3'])     . '</urn:Cat_Prod_3>
         <urn:Nombre_Producto>'      . $e($datos['nombre_prod'])    . '</urn:Nombre_Producto>
         <urn:Numero_ticket_MSL>'    . $e($datos['ticket_msl'])     . '</urn:Numero_ticket_MSL>
         <urn:ID_login_cliente>'     . $e($datos['login_cliente'])  . '</urn:ID_login_cliente>
         <urn:ID_login_contacto>'    . $e($datos['login_contacto']) . '</urn:ID_login_contacto>
      </urn:Creacion_Incidentes>
   </soapenv:Body>
</soapenv:Envelope>';
}

function enviar_soap($xml) {
    return _ejecutar_curl(SOAP_ENDPOINT, $xml);
}

function enviar_soap_incidente($xml) {
    return _ejecutar_curl(SOAP_ENDPOINT_INCIDENTE, $xml);
}

function _ejecutar_curl($url, $xml) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,            $url);
    curl_setopt($ch, CURLOPT_POST,           true);
    curl_setopt($ch, CURLOPT_POSTFIELDS,     $xml);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER,     array(
        'Content-Type: text/xml; charset=utf-8',
        'SOAPAction: ""',
        'Content-Length: ' . strlen($xml),
    ));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($ch, CURLOPT_TIMEOUT,        30);

    $respuesta  = curl_exec($ch);
    $http_code  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    $curl_error = curl_error($ch);
    curl_close($ch);

    if ($curl_error) {
        return array('ok' => false, 'respuesta' => 'Error cURL: ' . $curl_error, 'http_code' => 0);
    }

    return array(
        'ok'        => ($http_code >= 200 && $http_code < 300),
        'respuesta' => $respuesta,
        'http_code' => $http_code,
    );
}