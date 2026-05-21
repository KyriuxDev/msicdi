<?php
function DisplayMasterTableInfo_datos($params)
{
	$keys = $params["keys"];
	$detailtable = $params["detailtable"];
	$data = $params["masterRecordData"];
	
	$xt = new Xtempl();
	$tName = "datos";
	$xt->eventsObject = getEventObject($tName);
	
	include_once('classes/listpage.php');
	include_once('classes/listpage_simple.php');
	$mParams  = array();
	$mParams["xt"] = &$xt;
	$mParams["mode"] = LIST_MASTER;
	$mParams["pageType"] = PAGE_LIST;
	$mParams["flyId"] = $params["recId"];
	$masterPage = ListPage::createListPage($tName, $mParams);
	
	$settings = $masterPage->pSet;
	$viewControls = new ViewControlsContainer($settings, PAGE_LIST, $masterPage);
	
	$keysAssoc = array();
	$showKeys = "";	

	if($detailtable == "cat_personal")
	{
		$keysAssoc["mat_aplicador"] = $keys[1-1];
				
				$keyValue = $viewControls->showDBValue("mat_aplicador", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("datos","mat_aplicador").": ".$keyValue;
		$xt->assign('showKeys', $showKeys);
	}

	if( !$data || !count($data) )
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

	$layout = GetPageLayout("datos", 'masterlist');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->displayPartial(GetTemplateName("datos", "masterlist"));
}

?>