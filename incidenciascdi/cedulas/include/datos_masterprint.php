<?php
include_once(getabspath("classes/printpage.php"));

function DisplayMasterTableInfoForPrint_datos($params)
{
	global $cman;
	
	$detailtable = $params["detailtable"];
	$keys = $params["keys"];
	
	$xt = new Xtempl();
	
	$tName = "datos";
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

	if( $detailtable == "cat_personal" )
	{
		$keysAssoc["mat_aplicador"] = $keys[1-1];
				$where.= RunnerPage::_getFieldSQLDecrypt("mat_aplicador", $connection , $settings , $cipherer) . "=" . $cipherer->MakeDBValue("mat_aplicador", $keys[1-1], "", true);
		
				$keyValue = $viewControls->showDBValue("mat_aplicador", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("datos","mat_aplicador").": ".$keyValue;
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
	$keylink.= "&key1=".runner_htmlspecialchars(rawurlencode(@$data["id_datos"]));
	
	$xt->assign("id_datos_mastervalue", $viewControls->showDBValue("id_datos", $data, $keylink));
	$format = $settings->getViewFormat("id_datos");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("id_datos")))
		$class = ' rnr-field-number';
		
	$xt->assign("id_datos_class", $class); // add class for field header as field value
	$xt->assign("serie_pc_mastervalue", $viewControls->showDBValue("serie_pc", $data, $keylink));
	$format = $settings->getViewFormat("serie_pc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("serie_pc")))
		$class = ' rnr-field-number';
		
	$xt->assign("serie_pc_class", $class); // add class for field header as field value
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
	$xt->assign("servicio_mastervalue", $viewControls->showDBValue("servicio", $data, $keylink));
	$format = $settings->getViewFormat("servicio");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("servicio")))
		$class = ' rnr-field-number';
		
	$xt->assign("servicio_class", $class); // add class for field header as field value
	$xt->assign("cuenta_mastervalue", $viewControls->showDBValue("cuenta", $data, $keylink));
	$format = $settings->getViewFormat("cuenta");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("cuenta")))
		$class = ' rnr-field-number';
		
	$xt->assign("cuenta_class", $class); // add class for field header as field value
	$xt->assign("marca_pc_mastervalue", $viewControls->showDBValue("marca_pc", $data, $keylink));
	$format = $settings->getViewFormat("marca_pc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("marca_pc")))
		$class = ' rnr-field-number';
		
	$xt->assign("marca_pc_class", $class); // add class for field header as field value
	$xt->assign("modelo_pc_mastervalue", $viewControls->showDBValue("modelo_pc", $data, $keylink));
	$format = $settings->getViewFormat("modelo_pc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("modelo_pc")))
		$class = ' rnr-field-number';
		
	$xt->assign("modelo_pc_class", $class); // add class for field header as field value
	$xt->assign("nombre_pc_mastervalue", $viewControls->showDBValue("nombre_pc", $data, $keylink));
	$format = $settings->getViewFormat("nombre_pc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("nombre_pc")))
		$class = ' rnr-field-number';
		
	$xt->assign("nombre_pc_class", $class); // add class for field header as field value
	$xt->assign("ip_pc_mastervalue", $viewControls->showDBValue("ip_pc", $data, $keylink));
	$format = $settings->getViewFormat("ip_pc");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("ip_pc")))
		$class = ' rnr-field-number';
		
	$xt->assign("ip_pc_class", $class); // add class for field header as field value
	$xt->assign("mat_aplicador_mastervalue", $viewControls->showDBValue("mat_aplicador", $data, $keylink));
	$format = $settings->getViewFormat("mat_aplicador");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("mat_aplicador")))
		$class = ' rnr-field-number';
		
	$xt->assign("mat_aplicador_class", $class); // add class for field header as field value
	$xt->assign("mat_encuestado_mastervalue", $viewControls->showDBValue("mat_encuestado", $data, $keylink));
	$format = $settings->getViewFormat("mat_encuestado");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("mat_encuestado")))
		$class = ' rnr-field-number';
		
	$xt->assign("mat_encuestado_class", $class); // add class for field header as field value
	$xt->assign("nombre_mastervalue", $viewControls->showDBValue("nombre", $data, $keylink));
	$format = $settings->getViewFormat("nombre");
	$class = " rnr-field-text";
	if($format == FORMAT_FILE) 
		$class = ' rnr-field-file'; 
	if($format == FORMAT_AUDIO)
		$class = ' rnr-field-audio';
	if($format == FORMAT_CHECKBOX)
		$class = ' rnr-field-checkbox';
	if($format == FORMAT_NUMBER || IsNumberType($settings->getFieldType("nombre")))
		$class = ' rnr-field-number';
		
	$xt->assign("nombre_class", $class); // add class for field header as field value

	$layout = GetPageLayout("datos", 'masterprint');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');

	$xt->displayPartial(GetTemplateName("datos", "masterprint"));
}

?>