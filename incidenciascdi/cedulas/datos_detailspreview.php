<?php
@ini_set("display_errors","1");
@ini_set("display_startup_errors","1");

require_once("include/dbcommon.php");
header("Expires: Thu, 01 Jan 1970 00:00:01 GMT"); 

require_once("include/datos_variables.php");

$mode = postvalue("mode");


require_once("classes/searchclause.php");

$cipherer = new RunnerCipherer($strTableName);

require_once('include/xtempl.php');
$xt = new Xtempl();





$layout = new TLayout("detailspreview", "OfficeOffice", "MobileOffice");
$layout->version = 2;
$layout->blocks["bare"] = array();
$layout->containers["dcount"] = array();
$layout->container_properties["dcount"] = array(  );
$layout->containers["dcount"][] = array("name"=>"detailspreviewheader", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdetailsfount", 
	"block"=>"", "substyle"=>1  );

$layout->containers["dcount"][] = array("name"=>"detailspreviewdispfirst", 
	"block"=>"display_first", "substyle"=>1  );

$layout->skins["dcount"] = "empty";

$layout->blocks["bare"][] = "dcount";
$layout->containers["detailspreviewgrid"] = array();
$layout->container_properties["detailspreviewgrid"] = array(  );
$layout->containers["detailspreviewgrid"][] = array("name"=>"detailspreviewfields", 
	"block"=>"details_data", "substyle"=>1  );

$layout->skins["detailspreviewgrid"] = "grid";

$layout->blocks["bare"][] = "detailspreviewgrid";
$page_layouts["datos_detailspreview"] = $layout;

$layout->skinsparams = array();
$layout->skinsparams["empty"] = array("button"=>"button2");
$layout->skinsparams["menu"] = array("button"=>"button1");
$layout->skinsparams["hmenu"] = array("button"=>"button1");
$layout->skinsparams["undermenu"] = array("button"=>"button1");
$layout->skinsparams["fields"] = array("button"=>"button1");
$layout->skinsparams["form"] = array("button"=>"button1");
$layout->skinsparams["1"] = array("button"=>"button1");
$layout->skinsparams["2"] = array("button"=>"button1");
$layout->skinsparams["3"] = array("button"=>"button1");



$recordsCounter = 0;

//	process masterkey value
$mastertable = postvalue("mastertable");
$masterKeys = my_json_decode(postvalue("masterKeys"));
$sessionPrefix = "_detailsPreview";
if($mastertable != "")
{
	$_SESSION[$sessionPrefix."_mastertable"]=$mastertable;
//	copy keys to session
	$i = 1;
	if(is_array($masterKeys) && count($masterKeys) > 0)
	{
		while(array_key_exists ("masterkey".$i, $masterKeys))
		{
			$_SESSION[$sessionPrefix."_masterkey".$i] = $masterKeys["masterkey".$i];
			$i++;
		}
	}
	if(isset($_SESSION[$sessionPrefix."_masterkey".$i]))
		unset($_SESSION[$sessionPrefix."_masterkey".$i]);
}
else
	$mastertable = $_SESSION[$sessionPrefix."_mastertable"];

$params = array();
$params['id'] = 1;
$params['xt'] = &$xt;
$params['tName'] = $strTableName;
$params['pageType'] = "detailspreview";
$pageObject = new DetailsPreview($params);

if($mastertable == "cat_adscripcion")
{
	$where = "";
		$formattedValue = make_db_value("id_adsc",$_SESSION[$sessionPrefix."_masterkey1"]);
	if( $formattedValue == "null" )
		$where .= $pageObject->getFieldSQLDecrypt("id_adsc") . "is null";
	else
		$where .= $pageObject->getFieldSQLDecrypt("id_adsc") . "=" . $formattedValue;
}

$str = SecuritySQL("Search", $strTableName);
if(strlen($str))
	$where.=" and ".$str;
$strSQL = $gQuery->gSQLWhere($where);

$strSQL.=" ".$gstrOrderBy;

$rowcount = $gQuery->gSQLRowCount($where, $pageObject->connection);
$xt->assign("row_count",$rowcount);
if($rowcount) 
{
	$xt->assign("details_data",true);

	$display_count = 10;
	if($mode == "inline")
		$display_count*=2;
		
	if($rowcount>$display_count+2)
	{
		$xt->assign("display_first",true);
		$xt->assign("display_count",$display_count);
	}
	else
		$display_count = $rowcount;

	$rowinfo = array();
	
	require_once getabspath('classes/controls/ViewControlsContainer.php');
	$pSet = new ProjectSettings($strTableName, PAGE_LIST);
	$viewContainer = new ViewControlsContainer($pSet, PAGE_LIST);
	$viewContainer->isDetailsPreview = true;

	$b = true;
	$qResult = $pageObject->connection->query( $strSQL );
	$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	while($data && $recordsCounter<$display_count) {
		$recordsCounter++;
		$row = array();
		$keylink = "";
		$keylink.="&key1=".runner_htmlspecialchars(rawurlencode(@$data["id_datos"]));
	
	
	//	id_datos - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("id_datos", $data, $keylink);
			$row["id_datos_value"] = $value;
			$format = $pSet->getViewFormat("id_datos");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("id_datos")))
				$class = ' rnr-field-number';
			$row["id_datos_class"] = $class;
	//	serie_pc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("serie_pc", $data, $keylink);
			$row["serie_pc_value"] = $value;
			$format = $pSet->getViewFormat("serie_pc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("serie_pc")))
				$class = ' rnr-field-number';
			$row["serie_pc_class"] = $class;
	//	id_adsc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("id_adsc", $data, $keylink);
			$row["id_adsc_value"] = $value;
			$format = $pSet->getViewFormat("id_adsc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("id_adsc")))
				$class = ' rnr-field-number';
			$row["id_adsc_class"] = $class;
	//	servicio - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("servicio", $data, $keylink);
			$row["servicio_value"] = $value;
			$format = $pSet->getViewFormat("servicio");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("servicio")))
				$class = ' rnr-field-number';
			$row["servicio_class"] = $class;
	//	cuenta - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("cuenta", $data, $keylink);
			$row["cuenta_value"] = $value;
			$format = $pSet->getViewFormat("cuenta");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("cuenta")))
				$class = ' rnr-field-number';
			$row["cuenta_class"] = $class;
	//	marca_pc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("marca_pc", $data, $keylink);
			$row["marca_pc_value"] = $value;
			$format = $pSet->getViewFormat("marca_pc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("marca_pc")))
				$class = ' rnr-field-number';
			$row["marca_pc_class"] = $class;
	//	modelo_pc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("modelo_pc", $data, $keylink);
			$row["modelo_pc_value"] = $value;
			$format = $pSet->getViewFormat("modelo_pc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("modelo_pc")))
				$class = ' rnr-field-number';
			$row["modelo_pc_class"] = $class;
	//	nombre_pc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("nombre_pc", $data, $keylink);
			$row["nombre_pc_value"] = $value;
			$format = $pSet->getViewFormat("nombre_pc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("nombre_pc")))
				$class = ' rnr-field-number';
			$row["nombre_pc_class"] = $class;
	//	ip_pc - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("ip_pc", $data, $keylink);
			$row["ip_pc_value"] = $value;
			$format = $pSet->getViewFormat("ip_pc");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("ip_pc")))
				$class = ' rnr-field-number';
			$row["ip_pc_class"] = $class;
	//	mat_aplicador - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mat_aplicador", $data, $keylink);
			$row["mat_aplicador_value"] = $value;
			$format = $pSet->getViewFormat("mat_aplicador");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mat_aplicador")))
				$class = ' rnr-field-number';
			$row["mat_aplicador_class"] = $class;
	//	mat_encuestado - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("mat_encuestado", $data, $keylink);
			$row["mat_encuestado_value"] = $value;
			$format = $pSet->getViewFormat("mat_encuestado");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("mat_encuestado")))
				$class = ' rnr-field-number';
			$row["mat_encuestado_class"] = $class;
	//	nombre - 
			$viewContainer->recId = $recordsCounter;
		    $value = $viewContainer->showDBValue("nombre", $data, $keylink);
			$row["nombre_value"] = $value;
			$format = $pSet->getViewFormat("nombre");
			$class = "rnr-field-text";
			if($format==FORMAT_FILE) 
				$class = ' rnr-field-file'; 
			if($format==FORMAT_AUDIO)
				$class = ' rnr-field-audio';
			if($format==FORMAT_CHECKBOX)
				$class = ' rnr-field-checkbox';
			if($format==FORMAT_NUMBER || IsNumberType($pSet->getFieldType("nombre")))
				$class = ' rnr-field-number';
			$row["nombre_class"] = $class;
		$rowinfo[] = $row;
		if ($b) {
			$rowinfo2[] = $row;
			$b = false;
		}
		$data = $cipherer->DecryptFetchedArray( $qResult->fetchAssoc() );
	}
	$xt->assign_loopsection("details_row",$rowinfo);
	$xt->assign_loopsection("details_row_header",$rowinfo2); // assign class for header
}
$returnJSON = array("success" => true);
$xt->load_template(GetTemplateName("datos", "detailspreview"));
$returnJSON["body"] = $xt->fetch_loaded();

if($mode!="inline")
{
	$returnJSON["counter"] = postvalue("counter");
	$layout = GetPageLayout(GoodFieldName($strTableName), 'detailspreview');
	if($layout)
	{
		foreach($layout->getCSSFiles(isRTL(), isMobile()) as $css)
		{
			$returnJSON['CSSFiles'][] = $css;
		}
	}	
}	

echo printJSON($returnJSON);
exit();
?>