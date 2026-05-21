<?php
$dalTableunidad = array();
$dalTableunidad["Id Unidad"] = array("type"=>200,"varname"=>"Id_Unidad");
$dalTableunidad["Id Referencia"] = array("type"=>3,"varname"=>"Id_Referencia");
$dalTableunidad["Nombre"] = array("type"=>200,"varname"=>"Nombre");
$dalTableunidad["Tipo"] = array("type"=>200,"varname"=>"Tipo");
$dalTableunidad["Calle y número"] = array("type"=>200,"varname"=>"Calle_y_n_mero");
$dalTableunidad["Colonia"] = array("type"=>200,"varname"=>"Colonia");
$dalTableunidad["Municipio"] = array("type"=>200,"varname"=>"Municipio");
$dalTableunidad["Código postal"] = array("type"=>3,"varname"=>"C_digo_postal");
$dalTableunidad["Latitud"] = array("type"=>5,"varname"=>"Latitud");
$dalTableunidad["Longitud"] = array("type"=>5,"varname"=>"Longitud");
$dalTableunidad["map"] = array("type"=>200,"varname"=>"map");
	$dalTableunidad["Id Unidad"]["key"]=true;

$dal_info["cdi_imss_at_11_1_21_5__unidad"] = &$dalTableunidad;
?>