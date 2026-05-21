<?php
require_once(getabspath("classes/cipherer.php"));




$tdatadatos = array();	
	$tdatadatos[".truncateText"] = true;
	$tdatadatos[".NumberOfChars"] = 80; 
	$tdatadatos[".ShortName"] = "datos";
	$tdatadatos[".OwnerID"] = "";
	$tdatadatos[".OriginalTable"] = "datos";

//	field labels
$fieldLabelsdatos = array();
$fieldToolTipsdatos = array();
$pageTitlesdatos = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelsdatos["Spanish"] = array();
	$fieldToolTipsdatos["Spanish"] = array();
	$pageTitlesdatos["Spanish"] = array();
	$fieldLabelsdatos["Spanish"]["id_datos"] = "Id Datos";
	$fieldToolTipsdatos["Spanish"]["id_datos"] = "";
	$fieldLabelsdatos["Spanish"]["serie_pc"] = "Serie Pc";
	$fieldToolTipsdatos["Spanish"]["serie_pc"] = "";
	$fieldLabelsdatos["Spanish"]["id_adsc"] = "Id Adsc";
	$fieldToolTipsdatos["Spanish"]["id_adsc"] = "";
	$fieldLabelsdatos["Spanish"]["servicio"] = "Servicio";
	$fieldToolTipsdatos["Spanish"]["servicio"] = "";
	$fieldLabelsdatos["Spanish"]["cuenta"] = "Cuenta";
	$fieldToolTipsdatos["Spanish"]["cuenta"] = "";
	$fieldLabelsdatos["Spanish"]["marca_pc"] = "Marca Pc";
	$fieldToolTipsdatos["Spanish"]["marca_pc"] = "";
	$fieldLabelsdatos["Spanish"]["modelo_pc"] = "Modelo Pc";
	$fieldToolTipsdatos["Spanish"]["modelo_pc"] = "";
	$fieldLabelsdatos["Spanish"]["nombre_pc"] = "Nombre Pc";
	$fieldToolTipsdatos["Spanish"]["nombre_pc"] = "";
	$fieldLabelsdatos["Spanish"]["ip_pc"] = "Ip Pc";
	$fieldToolTipsdatos["Spanish"]["ip_pc"] = "";
	$fieldLabelsdatos["Spanish"]["mat_aplicador"] = "Mat Aplicador";
	$fieldToolTipsdatos["Spanish"]["mat_aplicador"] = "";
	$fieldLabelsdatos["Spanish"]["mat_encuestado"] = "Mat Encuestado";
	$fieldToolTipsdatos["Spanish"]["mat_encuestado"] = "";
	$fieldLabelsdatos["Spanish"]["nombre"] = "Nombre";
	$fieldToolTipsdatos["Spanish"]["nombre"] = "";
	if (count($fieldToolTipsdatos["Spanish"]))
		$tdatadatos[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsdatos[""] = array();
	$fieldToolTipsdatos[""] = array();
	$pageTitlesdatos[""] = array();
	if (count($fieldToolTipsdatos[""]))
		$tdatadatos[".isUseToolTips"] = true;
}
	
	
	$tdatadatos[".NCSearch"] = true;



$tdatadatos[".shortTableName"] = "datos";
$tdatadatos[".nSecOptions"] = 0;
$tdatadatos[".recsPerRowList"] = 1;
$tdatadatos[".recsPerRowPrint"] = 1;
$tdatadatos[".mainTableOwnerID"] = "";
$tdatadatos[".moveNext"] = 1;
$tdatadatos[".entityType"] = 0;

$tdatadatos[".strOriginalTableName"] = "datos";




$tdatadatos[".showAddInPopup"] = false;

$tdatadatos[".showEditInPopup"] = false;

$tdatadatos[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatadatos[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatadatos[".fieldsForRegister"] = array();

$tdatadatos[".listAjax"] = false;

	$tdatadatos[".audit"] = false;

	$tdatadatos[".locking"] = false;

$tdatadatos[".edit"] = true;
$tdatadatos[".afterEditAction"] = 1;
$tdatadatos[".closePopupAfterEdit"] = 1;
$tdatadatos[".afterEditActionDetTable"] = "";

$tdatadatos[".add"] = true;
$tdatadatos[".afterAddAction"] = 1;
$tdatadatos[".closePopupAfterAdd"] = 1;
$tdatadatos[".afterAddActionDetTable"] = "";

$tdatadatos[".list"] = true;

$tdatadatos[".inlineEdit"] = true;
$tdatadatos[".inlineAdd"] = true;
$tdatadatos[".view"] = true;

$tdatadatos[".import"] = true;

$tdatadatos[".exportTo"] = true;

$tdatadatos[".printFriendly"] = true;

$tdatadatos[".delete"] = true;

$tdatadatos[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatadatos[".searchSaving"] = false;
//

$tdatadatos[".showSearchPanel"] = true;
		$tdatadatos[".flexibleSearch"] = true;		

if (isMobile())
	$tdatadatos[".isUseAjaxSuggest"] = false;
else 
	$tdatadatos[".isUseAjaxSuggest"] = true;

$tdatadatos[".rowHighlite"] = true;



$tdatadatos[".addPageEvents"] = false;

// use timepicker for search panel
$tdatadatos[".isUseTimeForSearch"] = false;





$tdatadatos[".allSearchFields"] = array();
$tdatadatos[".filterFields"] = array();
$tdatadatos[".requiredSearchFields"] = array();

$tdatadatos[".allSearchFields"][] = "id_datos";
	$tdatadatos[".allSearchFields"][] = "serie_pc";
	$tdatadatos[".allSearchFields"][] = "id_adsc";
	$tdatadatos[".allSearchFields"][] = "servicio";
	$tdatadatos[".allSearchFields"][] = "cuenta";
	$tdatadatos[".allSearchFields"][] = "marca_pc";
	$tdatadatos[".allSearchFields"][] = "modelo_pc";
	$tdatadatos[".allSearchFields"][] = "nombre_pc";
	$tdatadatos[".allSearchFields"][] = "ip_pc";
	$tdatadatos[".allSearchFields"][] = "mat_aplicador";
	$tdatadatos[".allSearchFields"][] = "mat_encuestado";
	$tdatadatos[".allSearchFields"][] = "nombre";
	

$tdatadatos[".googleLikeFields"] = array();
$tdatadatos[".googleLikeFields"][] = "id_datos";
$tdatadatos[".googleLikeFields"][] = "serie_pc";
$tdatadatos[".googleLikeFields"][] = "id_adsc";
$tdatadatos[".googleLikeFields"][] = "servicio";
$tdatadatos[".googleLikeFields"][] = "cuenta";
$tdatadatos[".googleLikeFields"][] = "marca_pc";
$tdatadatos[".googleLikeFields"][] = "modelo_pc";
$tdatadatos[".googleLikeFields"][] = "nombre_pc";
$tdatadatos[".googleLikeFields"][] = "ip_pc";
$tdatadatos[".googleLikeFields"][] = "mat_aplicador";
$tdatadatos[".googleLikeFields"][] = "mat_encuestado";
$tdatadatos[".googleLikeFields"][] = "nombre";


$tdatadatos[".advSearchFields"] = array();
$tdatadatos[".advSearchFields"][] = "id_datos";
$tdatadatos[".advSearchFields"][] = "serie_pc";
$tdatadatos[".advSearchFields"][] = "id_adsc";
$tdatadatos[".advSearchFields"][] = "servicio";
$tdatadatos[".advSearchFields"][] = "cuenta";
$tdatadatos[".advSearchFields"][] = "marca_pc";
$tdatadatos[".advSearchFields"][] = "modelo_pc";
$tdatadatos[".advSearchFields"][] = "nombre_pc";
$tdatadatos[".advSearchFields"][] = "ip_pc";
$tdatadatos[".advSearchFields"][] = "mat_aplicador";
$tdatadatos[".advSearchFields"][] = "mat_encuestado";
$tdatadatos[".advSearchFields"][] = "nombre";

$tdatadatos[".tableType"] = "list";

$tdatadatos[".printerPageOrientation"] = 0;
$tdatadatos[".nPrinterPageScale"] = 100;

$tdatadatos[".nPrinterSplitRecords"] = 40;

$tdatadatos[".nPrinterPDFSplitRecords"] = 40;



$tdatadatos[".geocodingEnabled"] = false;




	





// view page pdf
$tdatadatos[".isViewPagePDF"] = true;
$tdatadatos[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatadatos[".isPrinterPagePDF"] = true;
$tdatadatos[".nPrinterPagePDFScale"] = 100;


$tdatadatos[".pageSize"] = 20;

$tdatadatos[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatadatos[".strOrderBy"] = $tstrOrderBy;

$tdatadatos[".orderindexes"] = array();

$tdatadatos[".sqlHead"] = "SELECT id_datos,  	serie_pc,  	id_adsc,  	servicio,  	cuenta,  	marca_pc,  	modelo_pc,  	nombre_pc,  	ip_pc,  	mat_aplicador,  	mat_encuestado,  	nombre";
$tdatadatos[".sqlFrom"] = "FROM datos";
$tdatadatos[".sqlWhereExpr"] = "";
$tdatadatos[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatadatos[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatadatos[".arrGroupsPerPage"] = $arrGPP;

$tdatadatos[".highlightSearchResults"] = true;

$tableKeysdatos = array();
$tableKeysdatos[] = "id_datos";
$tdatadatos[".Keys"] = $tableKeysdatos;

$tdatadatos[".listFields"] = array();
$tdatadatos[".listFields"][] = "id_datos";
$tdatadatos[".listFields"][] = "serie_pc";
$tdatadatos[".listFields"][] = "id_adsc";
$tdatadatos[".listFields"][] = "servicio";
$tdatadatos[".listFields"][] = "cuenta";
$tdatadatos[".listFields"][] = "marca_pc";
$tdatadatos[".listFields"][] = "modelo_pc";
$tdatadatos[".listFields"][] = "nombre_pc";
$tdatadatos[".listFields"][] = "ip_pc";
$tdatadatos[".listFields"][] = "mat_aplicador";
$tdatadatos[".listFields"][] = "mat_encuestado";
$tdatadatos[".listFields"][] = "nombre";

$tdatadatos[".hideMobileList"] = array();


$tdatadatos[".viewFields"] = array();
$tdatadatos[".viewFields"][] = "id_datos";
$tdatadatos[".viewFields"][] = "serie_pc";
$tdatadatos[".viewFields"][] = "id_adsc";
$tdatadatos[".viewFields"][] = "servicio";
$tdatadatos[".viewFields"][] = "cuenta";
$tdatadatos[".viewFields"][] = "marca_pc";
$tdatadatos[".viewFields"][] = "modelo_pc";
$tdatadatos[".viewFields"][] = "nombre_pc";
$tdatadatos[".viewFields"][] = "ip_pc";
$tdatadatos[".viewFields"][] = "mat_aplicador";
$tdatadatos[".viewFields"][] = "mat_encuestado";
$tdatadatos[".viewFields"][] = "nombre";

$tdatadatos[".addFields"] = array();
$tdatadatos[".addFields"][] = "serie_pc";
$tdatadatos[".addFields"][] = "id_adsc";
$tdatadatos[".addFields"][] = "servicio";
$tdatadatos[".addFields"][] = "cuenta";
$tdatadatos[".addFields"][] = "marca_pc";
$tdatadatos[".addFields"][] = "modelo_pc";
$tdatadatos[".addFields"][] = "nombre_pc";
$tdatadatos[".addFields"][] = "ip_pc";
$tdatadatos[".addFields"][] = "mat_aplicador";
$tdatadatos[".addFields"][] = "mat_encuestado";
$tdatadatos[".addFields"][] = "nombre";

$tdatadatos[".masterListFields"] = array();
$tdatadatos[".masterListFields"][] = "id_datos";
$tdatadatos[".masterListFields"][] = "serie_pc";
$tdatadatos[".masterListFields"][] = "id_adsc";
$tdatadatos[".masterListFields"][] = "servicio";
$tdatadatos[".masterListFields"][] = "cuenta";
$tdatadatos[".masterListFields"][] = "marca_pc";
$tdatadatos[".masterListFields"][] = "modelo_pc";
$tdatadatos[".masterListFields"][] = "nombre_pc";
$tdatadatos[".masterListFields"][] = "ip_pc";
$tdatadatos[".masterListFields"][] = "mat_aplicador";
$tdatadatos[".masterListFields"][] = "mat_encuestado";
$tdatadatos[".masterListFields"][] = "nombre";

$tdatadatos[".inlineAddFields"] = array();
$tdatadatos[".inlineAddFields"][] = "serie_pc";
$tdatadatos[".inlineAddFields"][] = "id_adsc";
$tdatadatos[".inlineAddFields"][] = "servicio";
$tdatadatos[".inlineAddFields"][] = "cuenta";
$tdatadatos[".inlineAddFields"][] = "marca_pc";
$tdatadatos[".inlineAddFields"][] = "modelo_pc";
$tdatadatos[".inlineAddFields"][] = "nombre_pc";
$tdatadatos[".inlineAddFields"][] = "ip_pc";
$tdatadatos[".inlineAddFields"][] = "mat_aplicador";
$tdatadatos[".inlineAddFields"][] = "mat_encuestado";
$tdatadatos[".inlineAddFields"][] = "nombre";

$tdatadatos[".editFields"] = array();
$tdatadatos[".editFields"][] = "serie_pc";
$tdatadatos[".editFields"][] = "id_adsc";
$tdatadatos[".editFields"][] = "servicio";
$tdatadatos[".editFields"][] = "cuenta";
$tdatadatos[".editFields"][] = "marca_pc";
$tdatadatos[".editFields"][] = "modelo_pc";
$tdatadatos[".editFields"][] = "nombre_pc";
$tdatadatos[".editFields"][] = "ip_pc";
$tdatadatos[".editFields"][] = "mat_aplicador";
$tdatadatos[".editFields"][] = "mat_encuestado";
$tdatadatos[".editFields"][] = "nombre";

$tdatadatos[".inlineEditFields"] = array();
$tdatadatos[".inlineEditFields"][] = "serie_pc";
$tdatadatos[".inlineEditFields"][] = "id_adsc";
$tdatadatos[".inlineEditFields"][] = "servicio";
$tdatadatos[".inlineEditFields"][] = "cuenta";
$tdatadatos[".inlineEditFields"][] = "marca_pc";
$tdatadatos[".inlineEditFields"][] = "modelo_pc";
$tdatadatos[".inlineEditFields"][] = "nombre_pc";
$tdatadatos[".inlineEditFields"][] = "ip_pc";
$tdatadatos[".inlineEditFields"][] = "mat_aplicador";
$tdatadatos[".inlineEditFields"][] = "mat_encuestado";
$tdatadatos[".inlineEditFields"][] = "nombre";

$tdatadatos[".exportFields"] = array();
$tdatadatos[".exportFields"][] = "id_datos";
$tdatadatos[".exportFields"][] = "serie_pc";
$tdatadatos[".exportFields"][] = "id_adsc";
$tdatadatos[".exportFields"][] = "servicio";
$tdatadatos[".exportFields"][] = "cuenta";
$tdatadatos[".exportFields"][] = "marca_pc";
$tdatadatos[".exportFields"][] = "modelo_pc";
$tdatadatos[".exportFields"][] = "nombre_pc";
$tdatadatos[".exportFields"][] = "ip_pc";
$tdatadatos[".exportFields"][] = "mat_aplicador";
$tdatadatos[".exportFields"][] = "mat_encuestado";
$tdatadatos[".exportFields"][] = "nombre";

$tdatadatos[".importFields"] = array();
$tdatadatos[".importFields"][] = "id_datos";
$tdatadatos[".importFields"][] = "serie_pc";
$tdatadatos[".importFields"][] = "id_adsc";
$tdatadatos[".importFields"][] = "servicio";
$tdatadatos[".importFields"][] = "cuenta";
$tdatadatos[".importFields"][] = "marca_pc";
$tdatadatos[".importFields"][] = "modelo_pc";
$tdatadatos[".importFields"][] = "nombre_pc";
$tdatadatos[".importFields"][] = "ip_pc";
$tdatadatos[".importFields"][] = "mat_aplicador";
$tdatadatos[".importFields"][] = "mat_encuestado";
$tdatadatos[".importFields"][] = "nombre";

$tdatadatos[".printFields"] = array();
$tdatadatos[".printFields"][] = "id_datos";
$tdatadatos[".printFields"][] = "serie_pc";
$tdatadatos[".printFields"][] = "id_adsc";
$tdatadatos[".printFields"][] = "servicio";
$tdatadatos[".printFields"][] = "cuenta";
$tdatadatos[".printFields"][] = "marca_pc";
$tdatadatos[".printFields"][] = "modelo_pc";
$tdatadatos[".printFields"][] = "nombre_pc";
$tdatadatos[".printFields"][] = "ip_pc";
$tdatadatos[".printFields"][] = "mat_aplicador";
$tdatadatos[".printFields"][] = "mat_encuestado";
$tdatadatos[".printFields"][] = "nombre";

//	id_datos
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id_datos";
	$fdata["GoodName"] = "id_datos";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","id_datos"); 
	$fdata["FieldType"] = 3;
	
		
		$fdata["AutoInc"] = true;
	
		
				
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id_datos"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id_datos";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "number";
	
		$edata["EditParams"] = "";
			
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
				$edata["validateAs"]["basicValidate"][] = getJsValidatorName("Number");	
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between");
// the end of search options settings	

	

	
	$tdatadatos["id_datos"] = $fdata;
//	serie_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "serie_pc";
	$fdata["GoodName"] = "serie_pc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","serie_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "serie_pc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "serie_pc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["serie_pc"] = $fdata;
//	id_adsc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "id_adsc";
	$fdata["GoodName"] = "id_adsc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","id_adsc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id_adsc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id_adsc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["id_adsc"] = $fdata;
//	servicio
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "servicio";
	$fdata["GoodName"] = "servicio";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","servicio"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "servicio"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "servicio";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["servicio"] = $fdata;
//	cuenta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "cuenta";
	$fdata["GoodName"] = "cuenta";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","cuenta"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "cuenta"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "cuenta";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["cuenta"] = $fdata;
//	marca_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "marca_pc";
	$fdata["GoodName"] = "marca_pc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","marca_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "marca_pc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "marca_pc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["marca_pc"] = $fdata;
//	modelo_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "modelo_pc";
	$fdata["GoodName"] = "modelo_pc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","modelo_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "modelo_pc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "modelo_pc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["modelo_pc"] = $fdata;
//	nombre_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "nombre_pc";
	$fdata["GoodName"] = "nombre_pc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","nombre_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "nombre_pc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "nombre_pc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["nombre_pc"] = $fdata;
//	ip_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "ip_pc";
	$fdata["GoodName"] = "ip_pc";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","ip_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ip_pc"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ip_pc";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["ip_pc"] = $fdata;
//	mat_aplicador
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "mat_aplicador";
	$fdata["GoodName"] = "mat_aplicador";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","mat_aplicador"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "mat_aplicador"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mat_aplicador";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["mat_aplicador"] = $fdata;
//	mat_encuestado
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "mat_encuestado";
	$fdata["GoodName"] = "mat_encuestado";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","mat_encuestado"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "mat_encuestado"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "mat_encuestado";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=45";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["mat_encuestado"] = $fdata;
//	nombre
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "nombre";
	$fdata["GoodName"] = "nombre";
	$fdata["ownerTable"] = "datos";
	$fdata["Label"] = GetFieldLabel("datos","nombre"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "nombre"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "nombre";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Text field");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=100";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatadatos["nombre"] = $fdata;

	
$tables_data["datos"]=&$tdatadatos;
$field_labels["datos"] = &$fieldLabelsdatos;
$fieldToolTips["datos"] = &$fieldToolTipsdatos;
$page_titles["datos"] = &$pageTitlesdatos;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["datos"] = array();
//	cat_personal
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="cat_personal";
		$detailsParam["dOriginalTable"] = "cat_personal";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "cat_personal";
	$detailsParam["dCaptionTable"] = GetTableCaption("cat_personal");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
			$detailsParam["dispChildCount"] = 0;
		$detailsParam["hideChild"] = false;
			$detailsParam["previewOnList"] = "1";
	$detailsParam["previewOnAdd"] = 0;
	$detailsParam["previewOnEdit"] = 0;
	$detailsParam["previewOnView"] = 0;
			
	$detailsTablesData["datos"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["datos"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["datos"][$dIndex]["masterKeys"][]="mat_aplicador";

				$detailsTablesData["datos"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["datos"][$dIndex]["detailKeys"][]="matricula";
	
// tables which are master tables for current table (detail)
$masterTablesData["datos"] = array();


	
				$strOriginalDetailsTable="cat_adscripcion";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="cat_adscripcion";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "cat_adscripcion";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "0";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 0;
	$masterParams["previewOnEdit"]= 0;
	$masterParams["previewOnView"]= 0;
	$masterParams["proceedLink"]= 1;
	
	$masterParams["type"] = PAGE_LIST;
					$masterTablesData["datos"][0] = $masterParams;	
				$masterTablesData["datos"][0]["masterKeys"] = array();
	$masterTablesData["datos"][0]["masterKeys"][]="id_adsc";
				$masterTablesData["datos"][0]["detailKeys"] = array();
	$masterTablesData["datos"][0]["detailKeys"][]="id_adsc";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_datos()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id_datos,  	serie_pc,  	id_adsc,  	servicio,  	cuenta,  	marca_pc,  	modelo_pc,  	nombre_pc,  	ip_pc,  	mat_aplicador,  	mat_encuestado,  	nombre";
$proto0["m_strFrom"] = "FROM datos";
$proto0["m_strWhere"] = "";
$proto0["m_strOrderBy"] = "";
$proto0["m_strTail"] = "";
			$proto0["cipherer"] = null;
$proto1=array();
$proto1["m_sql"] = "";
$proto1["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto1["m_column"]=$obj;
$proto1["m_contained"] = array();
$proto1["m_strCase"] = "";
$proto1["m_havingmode"] = false;
$proto1["m_inBrackets"] = false;
$proto1["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto1);

$proto0["m_where"] = $obj;
$proto3=array();
$proto3["m_sql"] = "";
$proto3["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto3["m_column"]=$obj;
$proto3["m_contained"] = array();
$proto3["m_strCase"] = "";
$proto3["m_havingmode"] = false;
$proto3["m_inBrackets"] = false;
$proto3["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto3);

$proto0["m_having"] = $obj;
$proto0["m_fieldlist"] = array();
						$proto5=array();
			$obj = new SQLField(array(
	"m_strName" => "id_datos",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto5["m_sql"] = "id_datos";
$proto5["m_srcTableName"] = "datos";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "serie_pc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto7["m_sql"] = "serie_pc";
$proto7["m_srcTableName"] = "datos";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "id_adsc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto9["m_sql"] = "id_adsc";
$proto9["m_srcTableName"] = "datos";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "servicio",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto11["m_sql"] = "servicio";
$proto11["m_srcTableName"] = "datos";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "cuenta",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto13["m_sql"] = "cuenta";
$proto13["m_srcTableName"] = "datos";
$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "marca_pc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto15["m_sql"] = "marca_pc";
$proto15["m_srcTableName"] = "datos";
$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "modelo_pc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto17["m_sql"] = "modelo_pc";
$proto17["m_srcTableName"] = "datos";
$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
						$proto19=array();
			$obj = new SQLField(array(
	"m_strName" => "nombre_pc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto19["m_sql"] = "nombre_pc";
$proto19["m_srcTableName"] = "datos";
$proto19["m_expr"]=$obj;
$proto19["m_alias"] = "";
$obj = new SQLFieldListItem($proto19);

$proto0["m_fieldlist"][]=$obj;
						$proto21=array();
			$obj = new SQLField(array(
	"m_strName" => "ip_pc",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto21["m_sql"] = "ip_pc";
$proto21["m_srcTableName"] = "datos";
$proto21["m_expr"]=$obj;
$proto21["m_alias"] = "";
$obj = new SQLFieldListItem($proto21);

$proto0["m_fieldlist"][]=$obj;
						$proto23=array();
			$obj = new SQLField(array(
	"m_strName" => "mat_aplicador",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto23["m_sql"] = "mat_aplicador";
$proto23["m_srcTableName"] = "datos";
$proto23["m_expr"]=$obj;
$proto23["m_alias"] = "";
$obj = new SQLFieldListItem($proto23);

$proto0["m_fieldlist"][]=$obj;
						$proto25=array();
			$obj = new SQLField(array(
	"m_strName" => "mat_encuestado",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto25["m_sql"] = "mat_encuestado";
$proto25["m_srcTableName"] = "datos";
$proto25["m_expr"]=$obj;
$proto25["m_alias"] = "";
$obj = new SQLFieldListItem($proto25);

$proto0["m_fieldlist"][]=$obj;
						$proto27=array();
			$obj = new SQLField(array(
	"m_strName" => "nombre",
	"m_strTable" => "datos",
	"m_srcTableName" => "datos"
));

$proto27["m_sql"] = "nombre";
$proto27["m_srcTableName"] = "datos";
$proto27["m_expr"]=$obj;
$proto27["m_alias"] = "";
$obj = new SQLFieldListItem($proto27);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto29=array();
$proto29["m_link"] = "SQLL_MAIN";
			$proto30=array();
$proto30["m_strName"] = "datos";
$proto30["m_srcTableName"] = "datos";
$proto30["m_columns"] = array();
$proto30["m_columns"][] = "id_datos";
$proto30["m_columns"][] = "serie_pc";
$proto30["m_columns"][] = "id_adsc";
$proto30["m_columns"][] = "servicio";
$proto30["m_columns"][] = "cuenta";
$proto30["m_columns"][] = "marca_pc";
$proto30["m_columns"][] = "modelo_pc";
$proto30["m_columns"][] = "nombre_pc";
$proto30["m_columns"][] = "ip_pc";
$proto30["m_columns"][] = "mat_aplicador";
$proto30["m_columns"][] = "mat_encuestado";
$proto30["m_columns"][] = "nombre";
$obj = new SQLTable($proto30);

$proto29["m_table"] = $obj;
$proto29["m_sql"] = "datos";
$proto29["m_alias"] = "";
$proto29["m_srcTableName"] = "datos";
$proto31=array();
$proto31["m_sql"] = "";
$proto31["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto31["m_column"]=$obj;
$proto31["m_contained"] = array();
$proto31["m_strCase"] = "";
$proto31["m_havingmode"] = false;
$proto31["m_inBrackets"] = false;
$proto31["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto31);

$proto29["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto29);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="datos";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_datos = createSqlQuery_datos();


	
												
	
$tdatadatos[".sqlquery"] = $queryData_datos;

$tableEvents["datos"] = new eventsBase;
$tdatadatos[".hasEvents"] = false;

?>