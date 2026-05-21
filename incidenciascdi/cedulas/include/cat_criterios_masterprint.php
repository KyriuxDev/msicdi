<?php
include_once(getabspath("classes/printpage.php"));

function DisplayMasterTableInfoForPrint_cat_criterios($params)
{
	global $cman;
	
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	
	$xt = new Xtempl();
	
	$tName = "cat_criterios";
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

	if( $detailtable == "respuestas" )
	{
		$keysAssoc["id_criterio"] = $keys[1-1];
				$where.= RunnerPage::_getFieldSQLDecrypt("id_criterio", $connection , $settings , $cipherer) . "=" . $cipherer->MakeDBValue("id_criterio", $keys[1-1], "", true);
		
				$keyValue = $viewControls->showDBValue("id_criterio", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("cat_criterios","id_criterio").": ".$keyValue;
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
	$keylink.= "&key1=".runner_htmlspecialchars(rawurlencode(@$data["id_criterio"]));
	
	$xt->assign("id_criterio_mastervalue", $viewControls->showDBValue("id_criterio", $data, $keylink));
	$format = $settings->getViewFormat("id_criterio");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("id_criterio")))
		$class = ' rnr-field-number';
		
	$xt->assign("id_criterio_class", $class); // add class for field header as field value
	$xt->assign("criterio_mastervalue", $viewControls->showDBValue("criterio", $data, $keylink));
	$format = $settings->getViewFormat("criterio");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("criterio")))
		$class = ' rnr-field-number';
		
	$xt->assign("criterio_class", $class); // add class for field header as field value
	$xt->assign("asiact_mastervalue", $viewControls->showDBValue("asiact", $data, $keylink));
	$format = $settings->getViewFormat("asiact");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("asiact")))
		$class = ' rnr-field-number';
		
	$xt->assign("asiact_class", $class); // add class for field header as field value
	$xt->assign("inciso_mastervalue", $viewControls->showDBValue("inciso", $data, $keylink));
	$format = $settings->getViewFormat("inciso");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("inciso")))
		$class = ' rnr-field-number';
		
	$xt->assign("inciso_class", $class); // add class for field header as field value
	$xt->assign("texto_mastervalue", $viewControls->showDBValue("texto", $data, $keylink));
	$format = $settings->getViewFormat("texto");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("texto")))
		$class = ' rnr-field-number';
		
	$xt->assign("texto_class", $class); // add class for field header as field value
	$xt->assign("actividad_mastervalue", $viewControls->showDBValue("actividad", $data, $keylink));
	$format = $settings->getViewFormat("actividad");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("actividad")))
		$class = ' rnr-field-number';
		
	$xt->assign("actividad_class", $class); // add class for field header as field value
	$xt->assign("grupo_mastervalue", $viewControls->showDBValue("grupo", $data, $keylink));
	$format = $settings->getViewFormat("grupo");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("grupo")))
		$class = ' rnr-field-number';
		
	$xt->assign("grupo_class", $class); // add class for field header as field value

	$layout = GetPageLayout("cat_criterios", 'masterprint');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');

	$xt->displayPartial(GetTemplateName("cat_criterios", "masterprint"));
}

?>