<?php
function DisplayMasterTableInfo_cat_adscripcion($params)
{
	$keys = $params["keys"];
	$detailtable = $params["detailtable"];
	$data = $params["masterRecordData"];
	
	$xt = new Xtempl();
	$tName = "cat_adscripcion";
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

	if($detailtable == "datos")
	{
		$keysAssoc["id_adsc"] = $keys[1-1];
				
				$keyValue = $viewControls->showDBValue("id_adsc", $keysAssoc);
		$showKeys.= " ".GetFieldLabel("cat_adscripcion","id_adsc").": ".$keyValue;
		$xt->assign('showKeys', $showKeys);
	}

	if( !$data || !count($data) )
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

	$layout = GetPageLayout("cat_adscripcion", 'masterlist');
	if( $layout )
		$xt->assign("pageattrs", 'class="'.$layout->style." page-".$layout->name.'"');
	
	$xt->displayPartial(GetTemplateName("cat_adscripcion", "masterlist"));
}

?>