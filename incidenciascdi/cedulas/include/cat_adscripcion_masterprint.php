<?php
include_once(getabspath("classes/printpage.php"));

function DisplayMasterTableInfoForPrint_cat_adscripcion($params)
{
	global $cman;
	
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	
	$xt = new Xtempl();
	
	$tName = "cat_adscripcion";
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

	if( $detailtable == "datos" )
	{
		$keysAssoc["id_adsc"] = $keys[1-1];
				$where.= RunnerPage::_getFieldSQLDecrypt("id_adsc", $connection , $settings , $cipherer) . "=" . $cipherer->MakeDBValue("id_adsc", $keys[1-1], "", true);
		
				$keyValue = $viewControls->showDBValue("id_adsc", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("cat_adscripcion","id_adsc").": ".$keyValue;
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
	$keylink.= "&key1=".runner_htmlspecialchars(rawurlencode(@$data["id_adsc"]));
	
	$xt->assign("id_adsc_mastervalue", $viewControls->showDBValue("id_adsc", $data, $keylink));
	$format = $settings->getViewFormat("id_adsc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("id_adsc")))
		$class = ' rnr-field-number';
		
	$xt->assign("id_adsc_class", $class); // add class for field header as field value
	$xt->assign("adscripcion_mastervalue", $viewControls->showDBValue("adscripcion", $data, $keylink));
	$format = $settings->getViewFormat("adscripcion");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("adscripcion")))
		$class = ' rnr-field-number';
		
	$xt->assign("adscripcion_class", $class); // add class for field header as field value

	$layout = GetPageLayout("cat_adscripcion", 'masterprint');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');

	$xt->displayPartial(GetTemplateName("cat_adscripcion", "masterprint"));
}

?>