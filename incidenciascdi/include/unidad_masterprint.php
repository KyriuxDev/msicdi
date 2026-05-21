<?php
include_once(getabspath("classes/printpage.php"));

function DisplayMasterTableInfoForPrint_unidad($params)
{
	global $cman;
	
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	
	$xt = new Xtempl();
	
	$tName = "unidad";
	$xt->eventsObject = getEventObject($tName);
	
	$mParams  = array();
	$mParams["xt"] = &$xt;
	$mParams["pageType"] = PAGE_PRINT;
	$mParams["tName"] = $tName;
	$masterPage = new PrintPage($mParams);
	
	$cipherer = new RunnerCipherer( $tName );
	$settings = new ProjectSettings($tName, PAGE_PRINT);
	$connection = $cman->byTable( $tName );
	
	$masterQuery = $settings->getSQLQuery();
	$viewControls = new ViewControlsContainer($settings, PAGE_PRINT, $masterPage);
	
	$where = "";
	$keysAssoc = array();
	$showKeys = "";

	if( $detailtable == "win10" )
	{
		$keysAssoc["Id Unidad"] = $keys[1-1];
				$where.= RunnerPage::_getFieldSQLDecrypt("Id Unidad", $connection , $settings , $cipherer) . "=" . $cipherer->MakeDBValue("Id Unidad", $keys[1-1], "", true);
		
				$keyValue = $viewControls->showDBValue("Id Unidad", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("unidad","Id_Unidad").": ".$keyValue;
		$xt->assign('showKeys', $showKeys);	
	}

	if( $detailtable == "reportesaio" )
	{
		$keysAssoc["Id Unidad"] = $keys[1-1];
				$where.= RunnerPage::_getFieldSQLDecrypt("Id Unidad", $connection , $settings , $cipherer) . "=" . $cipherer->MakeDBValue("Id Unidad", $keys[1-1], "", true);
		
				$keyValue = $viewControls->showDBValue("Id Unidad", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("unidad","Id_Unidad").": ".$keyValue;
		$xt->assign('showKeys', $showKeys);	
	}
	
	if( !$where )
		return;
	
	$str = SecuritySQL("Export", $tName );
	if( strlen($str) )
		$where.= " and ".$str;
	
	$strWhere = whereAdd( $masterQuery->m_where->toSql($masterQuery), $where );
	if( strlen($strWhere) )
		$strWhere= " where ".$strWhere." ";
		
	$strSQL = $masterQuery->HeadToSql().' '.$masterQuery->FromToSql().$strWhere.$masterQuery->TailToSql();
	LogInfo($strSQL);
	
	$data = $cipherer->DecryptFetchedArray( $connection->query( $strSQL )->fetchAssoc() );
	if( !$data )
		return;
	
	// reassign pagetitlelabel function adding extra params
	$xt->assign_function("pagetitlelabel", "xt_pagetitlelabel", array("record" => $data, "settings" => $settings));	
	
	$keylink = "";
	$keylink.= "&key1=".runner_htmlspecialchars(rawurlencode(@$data["Id Unidad"]));
	
	$xt->assign("Id_Unidad_mastervalue", $viewControls->showDBValue("Id Unidad", $data, $keylink));
	$format = $settings->getViewFormat("Id Unidad");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("Id Unidad")))
		$class = ' rnr-field-number';
		
	$xt->assign("Id_Unidad_class", $class); // add class for field header as field value
	$xt->assign("Nombre_mastervalue", $viewControls->showDBValue("Nombre", $data, $keylink));
	$format = $settings->getViewFormat("Nombre");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("Nombre")))
		$class = ' rnr-field-number';
		
	$xt->assign("Nombre_class", $class); // add class for field header as field value

	$layout = GetPageLayout("unidad", 'masterprint');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');

	$xt->displayPartial(GetTemplateName("unidad", "masterprint"));
}

?>