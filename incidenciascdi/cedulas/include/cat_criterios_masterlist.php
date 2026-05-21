<?php
function DisplayMasterTableInfo_cat_criterios($params)
{
	$keys = $params["keys"];
	$detailtable = $params["detailtable"];
	$data = $params["masterRecordData"];
	
	$xt = new Xtempl();
	$tName = "cat_criterios";
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

	if($detailtable == "respuestas")
	{
		$keysAssoc["id_criterio"] = $keys[1-1];
				
				$keyValue = $viewControls->showDBValue("id_criterio", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("cat_criterios","id_criterio").": ".$keyValue;
		$xt->assign('showKeys', $showKeys);
	}

	if( !$data || !count($data) )
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

	$layout = GetPageLayout("cat_criterios", 'masterlist');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->displayPartial(GetTemplateName("cat_criterios", "masterlist"));
}

?>