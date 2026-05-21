<?php
require_once(getabspath("classes/cipherer.php"));




$tdatacat_criterios = array();	
	$tdatacat_criterios[".truncateText"] = true;
	$tdatacat_criterios[".NumberOfChars"] = 80; 
	$tdatacat_criterios[".ShortName"] = "cat_criterios";
	$tdatacat_criterios[".OwnerID"] = "";
	$tdatacat_criterios[".OriginalTable"] = "cat_criterios";

//	field labels
$fieldLabelscat_criterios = array();
$fieldToolTipscat_criterios = array();
$pageTitlescat_criterios = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelscat_criterios["Spanish"] = array();
	$fieldToolTipscat_criterios["Spanish"] = array();
	$pageTitlescat_criterios["Spanish"] = array();
	$fieldLabelscat_criterios["Spanish"]["id_criterio"] = "Id Criterio";
	$fieldToolTipscat_criterios["Spanish"]["id_criterio"] = "";
	$fieldLabelscat_criterios["Spanish"]["criterio"] = "Criterio";
	$fieldToolTipscat_criterios["Spanish"]["criterio"] = "";
	$fieldLabelscat_criterios["Spanish"]["asiact"] = "Asiact";
	$fieldToolTipscat_criterios["Spanish"]["asiact"] = "";
	$fieldLabelscat_criterios["Spanish"]["inciso"] = "Inciso";
	$fieldToolTipscat_criterios["Spanish"]["inciso"] = "";
	$fieldLabelscat_criterios["Spanish"]["texto"] = "Texto";
	$fieldToolTipscat_criterios["Spanish"]["texto"] = "";
	$fieldLabelscat_criterios["Spanish"]["actividad"] = "Actividad";
	$fieldToolTipscat_criterios["Spanish"]["actividad"] = "";
	$fieldLabelscat_criterios["Spanish"]["grupo"] = "Grupo";
	$fieldToolTipscat_criterios["Spanish"]["grupo"] = "";
	if (count($fieldToolTipscat_criterios["Spanish"]))
		$tdatacat_criterios[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelscat_criterios[""] = array();
	$fieldToolTipscat_criterios[""] = array();
	$pageTitlescat_criterios[""] = array();
	if (count($fieldToolTipscat_criterios[""]))
		$tdatacat_criterios[".isUseToolTips"] = true;
}
	
	
	$tdatacat_criterios[".NCSearch"] = true;



$tdatacat_criterios[".shortTableName"] = "cat_criterios";
$tdatacat_criterios[".nSecOptions"] = 0;
$tdatacat_criterios[".recsPerRowList"] = 1;
$tdatacat_criterios[".recsPerRowPrint"] = 1;
$tdatacat_criterios[".mainTableOwnerID"] = "";
$tdatacat_criterios[".moveNext"] = 1;
$tdatacat_criterios[".entityType"] = 0;

$tdatacat_criterios[".strOriginalTableName"] = "cat_criterios";




$tdatacat_criterios[".showAddInPopup"] = false;

$tdatacat_criterios[".showEditInPopup"] = false;

$tdatacat_criterios[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatacat_criterios[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatacat_criterios[".fieldsForRegister"] = array();

$tdatacat_criterios[".listAjax"] = false;

	$tdatacat_criterios[".audit"] = false;

	$tdatacat_criterios[".locking"] = false;

$tdatacat_criterios[".edit"] = true;
$tdatacat_criterios[".afterEditAction"] = 1;
$tdatacat_criterios[".closePopupAfterEdit"] = 1;
$tdatacat_criterios[".afterEditActionDetTable"] = "";

$tdatacat_criterios[".add"] = true;
$tdatacat_criterios[".afterAddAction"] = 1;
$tdatacat_criterios[".closePopupAfterAdd"] = 1;
$tdatacat_criterios[".afterAddActionDetTable"] = "";

$tdatacat_criterios[".list"] = true;

$tdatacat_criterios[".inlineEdit"] = true;
$tdatacat_criterios[".inlineAdd"] = true;
$tdatacat_criterios[".copy"] = true;
$tdatacat_criterios[".view"] = true;

$tdatacat_criterios[".import"] = true;

$tdatacat_criterios[".exportTo"] = true;

$tdatacat_criterios[".printFriendly"] = true;

$tdatacat_criterios[".delete"] = true;

$tdatacat_criterios[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatacat_criterios[".searchSaving"] = false;
//

$tdatacat_criterios[".showSearchPanel"] = true;
		$tdatacat_criterios[".flexibleSearch"] = true;		

if (isMobile())
	$tdatacat_criterios[".isUseAjaxSuggest"] = false;
else 
	$tdatacat_criterios[".isUseAjaxSuggest"] = true;

$tdatacat_criterios[".rowHighlite"] = true;



$tdatacat_criterios[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacat_criterios[".isUseTimeForSearch"] = false;





$tdatacat_criterios[".allSearchFields"] = array();
$tdatacat_criterios[".filterFields"] = array();
$tdatacat_criterios[".requiredSearchFields"] = array();

$tdatacat_criterios[".allSearchFields"][] = "id_criterio";
	$tdatacat_criterios[".allSearchFields"][] = "criterio";
	$tdatacat_criterios[".allSearchFields"][] = "asiact";
	$tdatacat_criterios[".allSearchFields"][] = "inciso";
	$tdatacat_criterios[".allSearchFields"][] = "texto";
	$tdatacat_criterios[".allSearchFields"][] = "actividad";
	$tdatacat_criterios[".allSearchFields"][] = "grupo";
	

$tdatacat_criterios[".googleLikeFields"] = array();
$tdatacat_criterios[".googleLikeFields"][] = "id_criterio";
$tdatacat_criterios[".googleLikeFields"][] = "criterio";
$tdatacat_criterios[".googleLikeFields"][] = "asiact";
$tdatacat_criterios[".googleLikeFields"][] = "inciso";
$tdatacat_criterios[".googleLikeFields"][] = "texto";
$tdatacat_criterios[".googleLikeFields"][] = "actividad";
$tdatacat_criterios[".googleLikeFields"][] = "grupo";


$tdatacat_criterios[".advSearchFields"] = array();
$tdatacat_criterios[".advSearchFields"][] = "id_criterio";
$tdatacat_criterios[".advSearchFields"][] = "criterio";
$tdatacat_criterios[".advSearchFields"][] = "asiact";
$tdatacat_criterios[".advSearchFields"][] = "inciso";
$tdatacat_criterios[".advSearchFields"][] = "texto";
$tdatacat_criterios[".advSearchFields"][] = "actividad";
$tdatacat_criterios[".advSearchFields"][] = "grupo";

$tdatacat_criterios[".tableType"] = "list";

$tdatacat_criterios[".printerPageOrientation"] = 0;
$tdatacat_criterios[".nPrinterPageScale"] = 100;

$tdatacat_criterios[".nPrinterSplitRecords"] = 40;

$tdatacat_criterios[".nPrinterPDFSplitRecords"] = 40;



$tdatacat_criterios[".geocodingEnabled"] = false;




	





// view page pdf
$tdatacat_criterios[".isViewPagePDF"] = true;
$tdatacat_criterios[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatacat_criterios[".isPrinterPagePDF"] = true;
$tdatacat_criterios[".nPrinterPagePDFScale"] = 100;


$tdatacat_criterios[".pageSize"] = 20;

$tdatacat_criterios[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacat_criterios[".strOrderBy"] = $tstrOrderBy;

$tdatacat_criterios[".orderindexes"] = array();

$tdatacat_criterios[".sqlHead"] = "SELECT id_criterio,  	criterio,  	asiact,  	inciso,  	texto,  	actividad,  	grupo";
$tdatacat_criterios[".sqlFrom"] = "FROM cat_criterios";
$tdatacat_criterios[".sqlWhereExpr"] = "";
$tdatacat_criterios[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacat_criterios[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacat_criterios[".arrGroupsPerPage"] = $arrGPP;

$tdatacat_criterios[".highlightSearchResults"] = true;

$tableKeyscat_criterios = array();
$tableKeyscat_criterios[] = "id_criterio";
$tdatacat_criterios[".Keys"] = $tableKeyscat_criterios;

$tdatacat_criterios[".listFields"] = array();
$tdatacat_criterios[".listFields"][] = "id_criterio";
$tdatacat_criterios[".listFields"][] = "criterio";
$tdatacat_criterios[".listFields"][] = "asiact";
$tdatacat_criterios[".listFields"][] = "inciso";
$tdatacat_criterios[".listFields"][] = "texto";
$tdatacat_criterios[".listFields"][] = "actividad";
$tdatacat_criterios[".listFields"][] = "grupo";

$tdatacat_criterios[".hideMobileList"] = array();


$tdatacat_criterios[".viewFields"] = array();
$tdatacat_criterios[".viewFields"][] = "id_criterio";
$tdatacat_criterios[".viewFields"][] = "criterio";
$tdatacat_criterios[".viewFields"][] = "asiact";
$tdatacat_criterios[".viewFields"][] = "inciso";
$tdatacat_criterios[".viewFields"][] = "texto";
$tdatacat_criterios[".viewFields"][] = "actividad";
$tdatacat_criterios[".viewFields"][] = "grupo";

$tdatacat_criterios[".addFields"] = array();
$tdatacat_criterios[".addFields"][] = "id_criterio";
$tdatacat_criterios[".addFields"][] = "criterio";
$tdatacat_criterios[".addFields"][] = "asiact";
$tdatacat_criterios[".addFields"][] = "inciso";
$tdatacat_criterios[".addFields"][] = "texto";
$tdatacat_criterios[".addFields"][] = "actividad";
$tdatacat_criterios[".addFields"][] = "grupo";

$tdatacat_criterios[".masterListFields"] = array();
$tdatacat_criterios[".masterListFields"][] = "id_criterio";
$tdatacat_criterios[".masterListFields"][] = "criterio";
$tdatacat_criterios[".masterListFields"][] = "asiact";
$tdatacat_criterios[".masterListFields"][] = "inciso";
$tdatacat_criterios[".masterListFields"][] = "texto";
$tdatacat_criterios[".masterListFields"][] = "actividad";
$tdatacat_criterios[".masterListFields"][] = "grupo";

$tdatacat_criterios[".inlineAddFields"] = array();
$tdatacat_criterios[".inlineAddFields"][] = "id_criterio";
$tdatacat_criterios[".inlineAddFields"][] = "criterio";
$tdatacat_criterios[".inlineAddFields"][] = "asiact";
$tdatacat_criterios[".inlineAddFields"][] = "inciso";
$tdatacat_criterios[".inlineAddFields"][] = "texto";
$tdatacat_criterios[".inlineAddFields"][] = "actividad";
$tdatacat_criterios[".inlineAddFields"][] = "grupo";

$tdatacat_criterios[".editFields"] = array();
$tdatacat_criterios[".editFields"][] = "id_criterio";
$tdatacat_criterios[".editFields"][] = "criterio";
$tdatacat_criterios[".editFields"][] = "asiact";
$tdatacat_criterios[".editFields"][] = "inciso";
$tdatacat_criterios[".editFields"][] = "texto";
$tdatacat_criterios[".editFields"][] = "actividad";
$tdatacat_criterios[".editFields"][] = "grupo";

$tdatacat_criterios[".inlineEditFields"] = array();
$tdatacat_criterios[".inlineEditFields"][] = "id_criterio";
$tdatacat_criterios[".inlineEditFields"][] = "criterio";
$tdatacat_criterios[".inlineEditFields"][] = "asiact";
$tdatacat_criterios[".inlineEditFields"][] = "inciso";
$tdatacat_criterios[".inlineEditFields"][] = "texto";
$tdatacat_criterios[".inlineEditFields"][] = "actividad";
$tdatacat_criterios[".inlineEditFields"][] = "grupo";

$tdatacat_criterios[".exportFields"] = array();
$tdatacat_criterios[".exportFields"][] = "id_criterio";
$tdatacat_criterios[".exportFields"][] = "criterio";
$tdatacat_criterios[".exportFields"][] = "asiact";
$tdatacat_criterios[".exportFields"][] = "inciso";
$tdatacat_criterios[".exportFields"][] = "texto";
$tdatacat_criterios[".exportFields"][] = "actividad";
$tdatacat_criterios[".exportFields"][] = "grupo";

$tdatacat_criterios[".importFields"] = array();
$tdatacat_criterios[".importFields"][] = "id_criterio";
$tdatacat_criterios[".importFields"][] = "criterio";
$tdatacat_criterios[".importFields"][] = "asiact";
$tdatacat_criterios[".importFields"][] = "inciso";
$tdatacat_criterios[".importFields"][] = "texto";
$tdatacat_criterios[".importFields"][] = "actividad";
$tdatacat_criterios[".importFields"][] = "grupo";

$tdatacat_criterios[".printFields"] = array();
$tdatacat_criterios[".printFields"][] = "id_criterio";
$tdatacat_criterios[".printFields"][] = "criterio";
$tdatacat_criterios[".printFields"][] = "asiact";
$tdatacat_criterios[".printFields"][] = "inciso";
$tdatacat_criterios[".printFields"][] = "texto";
$tdatacat_criterios[".printFields"][] = "actividad";
$tdatacat_criterios[".printFields"][] = "grupo";

//	id_criterio
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id_criterio";
	$fdata["GoodName"] = "id_criterio";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","id_criterio"); 
	$fdata["FieldType"] = 3;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		$fdata["bEditPage"] = true; 
	
		$fdata["bInlineEdit"] = true; 
	
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id_criterio"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id_criterio";
	
		
		
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

	

	
	$tdatacat_criterios["id_criterio"] = $fdata;
//	criterio
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "criterio";
	$fdata["GoodName"] = "criterio";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","criterio"); 
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
	
		$fdata["strField"] = "criterio"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "criterio";
	
		
		
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
			$edata["EditParams"].= " maxlength=60";
	
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

	

	
	$tdatacat_criterios["criterio"] = $fdata;
//	asiact
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "asiact";
	$fdata["GoodName"] = "asiact";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","asiact"); 
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
	
		$fdata["strField"] = "asiact"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "asiact";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
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

	

	
	$tdatacat_criterios["asiact"] = $fdata;
//	inciso
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "inciso";
	$fdata["GoodName"] = "inciso";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","inciso"); 
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
	
		$fdata["strField"] = "inciso"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "inciso";
	
		
		
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
			$edata["EditParams"].= " maxlength=10";
	
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

	

	
	$tdatacat_criterios["inciso"] = $fdata;
//	texto
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "texto";
	$fdata["GoodName"] = "texto";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","texto"); 
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
	
		$fdata["strField"] = "texto"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "texto";
	
		
		
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
			$edata["EditParams"].= " maxlength=500";
	
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

	

	
	$tdatacat_criterios["texto"] = $fdata;
//	actividad
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "actividad";
	$fdata["GoodName"] = "actividad";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","actividad"); 
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
	
		$fdata["strField"] = "actividad"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "actividad";
	
		
		
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
			$edata["EditParams"].= " maxlength=145";
	
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

	

	
	$tdatacat_criterios["actividad"] = $fdata;
//	grupo
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "grupo";
	$fdata["GoodName"] = "grupo";
	$fdata["ownerTable"] = "cat_criterios";
	$fdata["Label"] = GetFieldLabel("cat_criterios","grupo"); 
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
	
		$fdata["strField"] = "grupo"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "grupo";
	
		
		
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
			$edata["EditParams"].= " maxlength=145";
	
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

	

	
	$tdatacat_criterios["grupo"] = $fdata;

	
$tables_data["cat_criterios"]=&$tdatacat_criterios;
$field_labels["cat_criterios"] = &$fieldLabelscat_criterios;
$fieldToolTips["cat_criterios"] = &$fieldToolTipscat_criterios;
$page_titles["cat_criterios"] = &$pageTitlescat_criterios;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cat_criterios"] = array();
//	respuestas
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="respuestas";
		$detailsParam["dOriginalTable"] = "respuestas";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "respuestas";
	$detailsParam["dCaptionTable"] = GetTableCaption("respuestas");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
			$detailsParam["dispChildCount"] = 0;
		$detailsParam["hideChild"] = false;
			$detailsParam["previewOnList"] = "1";
	$detailsParam["previewOnAdd"] = 0;
	$detailsParam["previewOnEdit"] = 0;
	$detailsParam["previewOnView"] = 0;
			
	$detailsTablesData["cat_criterios"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["cat_criterios"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["cat_criterios"][$dIndex]["masterKeys"][]="id_criterio";

				$detailsTablesData["cat_criterios"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["cat_criterios"][$dIndex]["detailKeys"][]="id_criterio";
	
// tables which are master tables for current table (detail)
$masterTablesData["cat_criterios"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_cat_criterios()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id_criterio,  	criterio,  	asiact,  	inciso,  	texto,  	actividad,  	grupo";
$proto0["m_strFrom"] = "FROM cat_criterios";
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
	"m_strName" => "id_criterio",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto5["m_sql"] = "id_criterio";
$proto5["m_srcTableName"] = "cat_criterios";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "criterio",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto7["m_sql"] = "criterio";
$proto7["m_srcTableName"] = "cat_criterios";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "asiact",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto9["m_sql"] = "asiact";
$proto9["m_srcTableName"] = "cat_criterios";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "inciso",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto11["m_sql"] = "inciso";
$proto11["m_srcTableName"] = "cat_criterios";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "texto",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto13["m_sql"] = "texto";
$proto13["m_srcTableName"] = "cat_criterios";
$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
						$proto15=array();
			$obj = new SQLField(array(
	"m_strName" => "actividad",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto15["m_sql"] = "actividad";
$proto15["m_srcTableName"] = "cat_criterios";
$proto15["m_expr"]=$obj;
$proto15["m_alias"] = "";
$obj = new SQLFieldListItem($proto15);

$proto0["m_fieldlist"][]=$obj;
						$proto17=array();
			$obj = new SQLField(array(
	"m_strName" => "grupo",
	"m_strTable" => "cat_criterios",
	"m_srcTableName" => "cat_criterios"
));

$proto17["m_sql"] = "grupo";
$proto17["m_srcTableName"] = "cat_criterios";
$proto17["m_expr"]=$obj;
$proto17["m_alias"] = "";
$obj = new SQLFieldListItem($proto17);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto19=array();
$proto19["m_link"] = "SQLL_MAIN";
			$proto20=array();
$proto20["m_strName"] = "cat_criterios";
$proto20["m_srcTableName"] = "cat_criterios";
$proto20["m_columns"] = array();
$proto20["m_columns"][] = "id_criterio";
$proto20["m_columns"][] = "criterio";
$proto20["m_columns"][] = "asiact";
$proto20["m_columns"][] = "inciso";
$proto20["m_columns"][] = "texto";
$proto20["m_columns"][] = "actividad";
$proto20["m_columns"][] = "grupo";
$obj = new SQLTable($proto20);

$proto19["m_table"] = $obj;
$proto19["m_sql"] = "cat_criterios";
$proto19["m_alias"] = "";
$proto19["m_srcTableName"] = "cat_criterios";
$proto21=array();
$proto21["m_sql"] = "";
$proto21["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto21["m_column"]=$obj;
$proto21["m_contained"] = array();
$proto21["m_strCase"] = "";
$proto21["m_havingmode"] = false;
$proto21["m_inBrackets"] = false;
$proto21["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto21);

$proto19["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto19);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="cat_criterios";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_cat_criterios = createSqlQuery_cat_criterios();


	
							
	
$tdatacat_criterios[".sqlquery"] = $queryData_cat_criterios;

$tableEvents["cat_criterios"] = new eventsBase;
$tdatacat_criterios[".hasEvents"] = false;

?>