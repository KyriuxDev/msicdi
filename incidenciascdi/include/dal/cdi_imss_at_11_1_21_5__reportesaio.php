<?php
$dalTablereportesaio = array();
$dalTablereportesaio["num"] = array("type"=>3,"varname"=>"num");
$dalTablereportesaio["marca"] = array("type"=>200,"varname"=>"marca");
$dalTablereportesaio["serie"] = array("type"=>200,"varname"=>"serie");
$dalTablereportesaio["unidad"] = array("type"=>200,"varname"=>"unidad");
$dalTablereportesaio["area"] = array("type"=>200,"varname"=>"area");
$dalTablereportesaio["falla"] = array("type"=>201,"varname"=>"falla");
$dalTablereportesaio["fecha"] = array("type"=>135,"varname"=>"fecha");
$dalTablereportesaio["usuario"] = array("type"=>200,"varname"=>"usuario");
$dalTablereportesaio["ip"] = array("type"=>200,"varname"=>"ip");
$dalTablereportesaio["cuenta"] = array("type"=>200,"varname"=>"cuenta");
$dalTablereportesaio["evidencia"] = array("type"=>201,"varname"=>"evidencia");
	$dalTablereportesaio["num"]["key"]=true;

$dal_info["cdi_imss_at_11_1_21_5__reportesaio"] = &$dalTablereportesaio;
?>