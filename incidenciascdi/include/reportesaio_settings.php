<?php
require_once(getabspath("classes/cipherer.php"));




$tdatareportesaio = array();	
	$tdatareportesaio[".truncateText"] = true;
	$tdatareportesaio[".NumberOfChars"] = 80; 
	$tdatareportesaio[".ShortName"] = "reportesaio";
	$tdatareportesaio[".OwnerID"] = "";
	$tdatareportesaio[".OriginalTable"] = "reportesaio";

//	field labels
$fieldLabelsreportesaio = array();
$fieldToolTipsreportesaio = array();
$pageTitlesreportesaio = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelsreportesaio["Spanish"] = array();
	$fieldToolTipsreportesaio["Spanish"] = array();
	$pageTitlesreportesaio["Spanish"] = array();
	$fieldLabelsreportesaio["Spanish"]["num"] = "Num";
	$fieldToolTipsreportesaio["Spanish"]["num"] = "";
	$fieldLabelsreportesaio["Spanish"]["marca"] = "Marca";
	$fieldToolTipsreportesaio["Spanish"]["marca"] = "";
	$fieldLabelsreportesaio["Spanish"]["serie"] = "Serie";
	$fieldToolTipsreportesaio["Spanish"]["serie"] = "";
	$fieldLabelsreportesaio["Spanish"]["unidad"] = "Unidad";
	$fieldToolTipsreportesaio["Spanish"]["unidad"] = "";
	$fieldLabelsreportesaio["Spanish"]["area"] = "Area";
	$fieldToolTipsreportesaio["Spanish"]["area"] = "";
	$fieldLabelsreportesaio["Spanish"]["falla"] = "Falla";
	$fieldToolTipsreportesaio["Spanish"]["falla"] = "";
	$fieldLabelsreportesaio["Spanish"]["fecha"] = "Fecha";
	$fieldToolTipsreportesaio["Spanish"]["fecha"] = "";
	$fieldLabelsreportesaio["Spanish"]["usuario"] = "Usuario";
	$fieldToolTipsreportesaio["Spanish"]["usuario"] = "";
	$fieldLabelsreportesaio["Spanish"]["ip"] = "Ip";
	$fieldToolTipsreportesaio["Spanish"]["ip"] = "";
	$fieldLabelsreportesaio["Spanish"]["cuenta"] = "Cuenta";
	$fieldToolTipsreportesaio["Spanish"]["cuenta"] = "";
	$fieldLabelsreportesaio["Spanish"]["evidencia"] = "Evidencia";
	$fieldToolTipsreportesaio["Spanish"]["evidencia"] = "";
	if (count($fieldToolTipsreportesaio["Spanish"]))
		$tdatareportesaio[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsreportesaio[""] = array();
	$fieldToolTipsreportesaio[""] = array();
	$pageTitlesreportesaio[""] = array();
	$fieldLabelsreportesaio[""]["num"] = "Num";
	$fieldToolTipsreportesaio[""]["num"] = "";
	if (count($fieldToolTipsreportesaio[""]))
		$tdatareportesaio[".isUseToolTips"] = true;
}
	
	
	$tdatareportesaio[".NCSearch"] = true;



$tdatareportesaio[".shortTableName"] = "reportesaio";
$tdatareportesaio[".nSecOptions"] = 0;
$tdatareportesaio[".recsPerRowList"] = 1;
$tdatareportesaio[".recsPerRowPrint"] = 1;
$tdatareportesaio[".mainTableOwnerID"] = "";
$tdatareportesaio[".moveNext"] = 1;
$tdatareportesaio[".entityType"] = 0;

$tdatareportesaio[".strOriginalTableName"] = "reportesaio";




$tdatareportesaio[".showAddInPopup"] = true;

$tdatareportesaio[".showEditInPopup"] = true;

$tdatareportesaio[".showViewInPopup"] = true;

//page's base css files names
$popupPagesLayoutNames = array();
						
	;
$popupPagesLayoutNames["add"] = "add3";
						
	;
$popupPagesLayoutNames["edit"] = "edit3";
						
	;
$popupPagesLayoutNames["view"] = "view_basic_2col_center";
$tdatareportesaio[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatareportesaio[".fieldsForRegister"] = array();

$tdatareportesaio[".listAjax"] = false;

	$tdatareportesaio[".audit"] = false;

	$tdatareportesaio[".locking"] = false;

$tdatareportesaio[".edit"] = true;
$tdatareportesaio[".afterEditAction"] = 0;
$tdatareportesaio[".closePopupAfterEdit"] = 1;
$tdatareportesaio[".afterEditActionDetTable"] = "Detail tables not found!";

$tdatareportesaio[".add"] = true;
$tdatareportesaio[".afterAddAction"] = 1;
$tdatareportesaio[".closePopupAfterAdd"] = 1;
$tdatareportesaio[".afterAddActionDetTable"] = "Detail tables not found!";

$tdatareportesaio[".list"] = true;

$tdatareportesaio[".copy"] = true;
$tdatareportesaio[".view"] = true;


$tdatareportesaio[".exportTo"] = true;

$tdatareportesaio[".printFriendly"] = true;


$tdatareportesaio[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatareportesaio[".searchSaving"] = false;
//

$tdatareportesaio[".showSearchPanel"] = true;
		$tdatareportesaio[".flexibleSearch"] = true;		

if (isMobile())
	$tdatareportesaio[".isUseAjaxSuggest"] = false;
else 
	$tdatareportesaio[".isUseAjaxSuggest"] = true;

$tdatareportesaio[".rowHighlite"] = true;



$tdatareportesaio[".addPageEvents"] = false;

// use timepicker for search panel
$tdatareportesaio[".isUseTimeForSearch"] = false;





$tdatareportesaio[".allSearchFields"] = array();
$tdatareportesaio[".filterFields"] = array();
$tdatareportesaio[".requiredSearchFields"] = array();

$tdatareportesaio[".allSearchFields"][] = "marca";
	$tdatareportesaio[".allSearchFields"][] = "serie";
	$tdatareportesaio[".allSearchFields"][] = "unidad";
	$tdatareportesaio[".allSearchFields"][] = "area";
	$tdatareportesaio[".allSearchFields"][] = "falla";
	$tdatareportesaio[".allSearchFields"][] = "fecha";
	$tdatareportesaio[".allSearchFields"][] = "usuario";
	$tdatareportesaio[".allSearchFields"][] = "ip";
	$tdatareportesaio[".allSearchFields"][] = "cuenta";
	$tdatareportesaio[".allSearchFields"][] = "evidencia";
	

$tdatareportesaio[".googleLikeFields"] = array();
$tdatareportesaio[".googleLikeFields"][] = "num";
$tdatareportesaio[".googleLikeFields"][] = "marca";
$tdatareportesaio[".googleLikeFields"][] = "serie";
$tdatareportesaio[".googleLikeFields"][] = "unidad";
$tdatareportesaio[".googleLikeFields"][] = "area";
$tdatareportesaio[".googleLikeFields"][] = "falla";
$tdatareportesaio[".googleLikeFields"][] = "fecha";
$tdatareportesaio[".googleLikeFields"][] = "usuario";
$tdatareportesaio[".googleLikeFields"][] = "ip";
$tdatareportesaio[".googleLikeFields"][] = "cuenta";
$tdatareportesaio[".googleLikeFields"][] = "evidencia";


$tdatareportesaio[".advSearchFields"] = array();
$tdatareportesaio[".advSearchFields"][] = "marca";
$tdatareportesaio[".advSearchFields"][] = "serie";
$tdatareportesaio[".advSearchFields"][] = "unidad";
$tdatareportesaio[".advSearchFields"][] = "area";
$tdatareportesaio[".advSearchFields"][] = "falla";
$tdatareportesaio[".advSearchFields"][] = "fecha";
$tdatareportesaio[".advSearchFields"][] = "usuario";
$tdatareportesaio[".advSearchFields"][] = "ip";
$tdatareportesaio[".advSearchFields"][] = "cuenta";
$tdatareportesaio[".advSearchFields"][] = "evidencia";

$tdatareportesaio[".tableType"] = "list";

$tdatareportesaio[".printerPageOrientation"] = 0;
$tdatareportesaio[".nPrinterPageScale"] = 100;

$tdatareportesaio[".nPrinterSplitRecords"] = 40;

$tdatareportesaio[".nPrinterPDFSplitRecords"] = 40;



$tdatareportesaio[".geocodingEnabled"] = false;




	





// view page pdf
$tdatareportesaio[".isViewPagePDF"] = true;
$tdatareportesaio[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatareportesaio[".isPrinterPagePDF"] = true;
$tdatareportesaio[".nPrinterPagePDFScale"] = 100;


$tdatareportesaio[".pageSize"] = 20;

$tdatareportesaio[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatareportesaio[".strOrderBy"] = $tstrOrderBy;

$tdatareportesaio[".orderindexes"] = array();

$tdatareportesaio[".sqlHead"] = "SELECT num,  	marca,  	serie,  	unidad,  	area,  	falla,  	fecha,  	usuario,  	ip,  	cuenta,  	evidencia";
$tdatareportesaio[".sqlFrom"] = "FROM reportesaio";
$tdatareportesaio[".sqlWhereExpr"] = "";
$tdatareportesaio[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatareportesaio[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatareportesaio[".arrGroupsPerPage"] = $arrGPP;

$tdatareportesaio[".highlightSearchResults"] = true;

$tableKeysreportesaio = array();
$tableKeysreportesaio[] = "num";
$tdatareportesaio[".Keys"] = $tableKeysreportesaio;

$tdatareportesaio[".listFields"] = array();
$tdatareportesaio[".listFields"][] = "num";
$tdatareportesaio[".listFields"][] = "marca";
$tdatareportesaio[".listFields"][] = "serie";
$tdatareportesaio[".listFields"][] = "unidad";
$tdatareportesaio[".listFields"][] = "area";
$tdatareportesaio[".listFields"][] = "falla";
$tdatareportesaio[".listFields"][] = "fecha";
$tdatareportesaio[".listFields"][] = "usuario";
$tdatareportesaio[".listFields"][] = "ip";
$tdatareportesaio[".listFields"][] = "cuenta";
$tdatareportesaio[".listFields"][] = "evidencia";

$tdatareportesaio[".hideMobileList"] = array();


$tdatareportesaio[".viewFields"] = array();
$tdatareportesaio[".viewFields"][] = "num";
$tdatareportesaio[".viewFields"][] = "marca";
$tdatareportesaio[".viewFields"][] = "serie";
$tdatareportesaio[".viewFields"][] = "unidad";
$tdatareportesaio[".viewFields"][] = "area";
$tdatareportesaio[".viewFields"][] = "falla";
$tdatareportesaio[".viewFields"][] = "fecha";
$tdatareportesaio[".viewFields"][] = "usuario";
$tdatareportesaio[".viewFields"][] = "ip";
$tdatareportesaio[".viewFields"][] = "cuenta";
$tdatareportesaio[".viewFields"][] = "evidencia";

$tdatareportesaio[".addFields"] = array();
$tdatareportesaio[".addFields"][] = "marca";
$tdatareportesaio[".addFields"][] = "serie";
$tdatareportesaio[".addFields"][] = "unidad";
$tdatareportesaio[".addFields"][] = "area";
$tdatareportesaio[".addFields"][] = "falla";
$tdatareportesaio[".addFields"][] = "fecha";
$tdatareportesaio[".addFields"][] = "usuario";
$tdatareportesaio[".addFields"][] = "ip";
$tdatareportesaio[".addFields"][] = "cuenta";
$tdatareportesaio[".addFields"][] = "evidencia";

$tdatareportesaio[".masterListFields"] = array();
$tdatareportesaio[".masterListFields"][] = "num";
$tdatareportesaio[".masterListFields"][] = "marca";
$tdatareportesaio[".masterListFields"][] = "serie";
$tdatareportesaio[".masterListFields"][] = "unidad";
$tdatareportesaio[".masterListFields"][] = "area";
$tdatareportesaio[".masterListFields"][] = "falla";
$tdatareportesaio[".masterListFields"][] = "fecha";
$tdatareportesaio[".masterListFields"][] = "usuario";
$tdatareportesaio[".masterListFields"][] = "ip";
$tdatareportesaio[".masterListFields"][] = "cuenta";
$tdatareportesaio[".masterListFields"][] = "evidencia";

$tdatareportesaio[".inlineAddFields"] = array();

$tdatareportesaio[".editFields"] = array();
$tdatareportesaio[".editFields"][] = "marca";
$tdatareportesaio[".editFields"][] = "serie";
$tdatareportesaio[".editFields"][] = "unidad";
$tdatareportesaio[".editFields"][] = "area";
$tdatareportesaio[".editFields"][] = "falla";
$tdatareportesaio[".editFields"][] = "fecha";
$tdatareportesaio[".editFields"][] = "usuario";
$tdatareportesaio[".editFields"][] = "ip";
$tdatareportesaio[".editFields"][] = "cuenta";
$tdatareportesaio[".editFields"][] = "evidencia";

$tdatareportesaio[".inlineEditFields"] = array();

$tdatareportesaio[".exportFields"] = array();
$tdatareportesaio[".exportFields"][] = "num";
$tdatareportesaio[".exportFields"][] = "marca";
$tdatareportesaio[".exportFields"][] = "serie";
$tdatareportesaio[".exportFields"][] = "unidad";
$tdatareportesaio[".exportFields"][] = "area";
$tdatareportesaio[".exportFields"][] = "falla";
$tdatareportesaio[".exportFields"][] = "fecha";
$tdatareportesaio[".exportFields"][] = "usuario";
$tdatareportesaio[".exportFields"][] = "ip";
$tdatareportesaio[".exportFields"][] = "cuenta";
$tdatareportesaio[".exportFields"][] = "evidencia";

$tdatareportesaio[".importFields"] = array();

$tdatareportesaio[".printFields"] = array();
$tdatareportesaio[".printFields"][] = "num";
$tdatareportesaio[".printFields"][] = "marca";
$tdatareportesaio[".printFields"][] = "serie";
$tdatareportesaio[".printFields"][] = "unidad";
$tdatareportesaio[".printFields"][] = "area";
$tdatareportesaio[".printFields"][] = "falla";
$tdatareportesaio[".printFields"][] = "fecha";
$tdatareportesaio[".printFields"][] = "usuario";
$tdatareportesaio[".printFields"][] = "ip";
$tdatareportesaio[".printFields"][] = "cuenta";
$tdatareportesaio[".printFields"][] = "evidencia";

//	num
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "num";
	$fdata["GoodName"] = "num";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","num"); 
	$fdata["FieldType"] = 3;
	
		
		$fdata["AutoInc"] = true;
	
		
				
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "num"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "num";
	
		
		
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
	
	
	
	

	

	
	$tdatareportesaio["num"] = $fdata;
//	marca
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "marca";
	$fdata["GoodName"] = "marca";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","marca"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "marca"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "marca";
	
		
		
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
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["marca"] = $fdata;
//	serie
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "serie";
	$fdata["GoodName"] = "serie";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","serie"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "serie"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "serie";
	
		
		
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
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=20";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["serie"] = $fdata;
//	unidad
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "unidad";
	$fdata["GoodName"] = "unidad";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","unidad"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "unidad"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "unidad";
	
		
		
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
	
	$edata = array("EditFormat" => "Lookup wizard");
	
			
	
	
// Begin Lookup settings
				$edata["LookupType"] = 2;
	$edata["LookupTable"] = "unidad";
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;
		
		
			
	$edata["LinkField"] = "Id Unidad";
	$edata["LinkFieldType"] = 0;
	$edata["DisplayField"] = "Nombre";
	
		
	$edata["LookupOrderBy"] = "";
	
		
			
		
				
	
	
		
		$edata["SelectSize"] = 1;
		
// End Lookup Settings


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["unidad"] = $fdata;
//	area
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "area";
	$fdata["GoodName"] = "area";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","area"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "area"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "area";
	
		
		
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
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=60";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["area"] = $fdata;
//	falla
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "falla";
	$fdata["GoodName"] = "falla";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","falla"); 
	$fdata["FieldType"] = 201;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "falla"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "falla";
	
		
		
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
	
	$edata = array("EditFormat" => "Text area");
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
				$edata["nRows"] = 100;
			$edata["nCols"] = 200;
	
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["falla"] = $fdata;
//	fecha
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "fecha";
	$fdata["GoodName"] = "fecha";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","fecha"); 
	$fdata["FieldType"] = 135;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "fecha"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "fecha";
	
		
		
				$fdata["FieldPermissions"] = true;
	
				$fdata["UploadFolder"] = "files";
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Short Date");
	
		
		
		
		
		
		
		
		
		
		
		
		$vdata["NeedEncode"] = true;
	
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Date");
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 5; 
	$edata["LastYearFactor"] = 0; 
	
		
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Equals", "More than", "Less than", "Between");
// the end of search options settings	

	

	
	$tdatareportesaio["fecha"] = $fdata;
//	usuario
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "usuario";
	$fdata["GoodName"] = "usuario";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","usuario"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "usuario"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "usuario";
	
		
		
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
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=80";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["usuario"] = $fdata;
//	ip
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "ip";
	$fdata["GoodName"] = "ip";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","ip"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "ip"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "ip";
	
		
		
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
	
		
		
		
		
			$edata["HTML5InuptType"] = "text";
	
		$edata["EditParams"] = "";
			$edata["EditParams"].= " maxlength=15";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["ip"] = $fdata;
//	cuenta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "cuenta";
	$fdata["GoodName"] = "cuenta";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","cuenta"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
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
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
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
						$edata["validateAs"]["basicValidate"][] = "IsRequired";
			
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["cuenta"] = $fdata;
//	evidencia
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "evidencia";
	$fdata["GoodName"] = "evidencia";
	$fdata["ownerTable"] = "reportesaio";
	$fdata["Label"] = GetFieldLabel("reportesaio","evidencia"); 
	$fdata["FieldType"] = 201;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "evidencia"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "evidencia";
	
		
		
				$fdata["FieldPermissions"] = true;
	
		$fdata["UploadCodeExpression"] = true;
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "File-based Image");
	
		
		
				$vdata["ShowThumbnail"] = true;
	$vdata["ThumbWidth"] = 72;
	$vdata["ThumbHeight"] = 72;	
			$vdata["ImageWidth"] = 457;
	$vdata["ImageHeight"] = 0;
	
		
		
		
		
		
		
		
		
		
	$fdata["ViewFormats"]["view"] = $vdata;
//  End View Formats

//	Begin Edit Formats 	
	$fdata["EditFormats"] = array();
	
	$edata = array("EditFormat" => "Document upload");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 0;
	
		
		
		
		
		
		
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		$edata["CreateThumbnail"] = true;
	$edata["StrThumbnail"] = "th";
			$edata["ThumbnailSize"] = 100;
	
				$edata["ResizeImage"] = true;
				$edata["NewSize"] = 800;
	
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	
// the field's search options settings
		
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatareportesaio["evidencia"] = $fdata;

	
$tables_data["reportesaio"]=&$tdatareportesaio;
$field_labels["reportesaio"] = &$fieldLabelsreportesaio;
$fieldToolTips["reportesaio"] = &$fieldToolTipsreportesaio;
$page_titles["reportesaio"] = &$pageTitlesreportesaio;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["reportesaio"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["reportesaio"] = array();


	
				$strOriginalDetailsTable="unidad";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="unidad";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "unidad";
	$masterParams["masterKeys"]= array();
	$masterParams["detailKeys"]= array();
	$masterParams["dispChildCount"]= "0";
	$masterParams["hideChild"]= "0";
	$masterParams["dispInfo"]= "1";
	$masterParams["previewOnList"]= 1;
	$masterParams["previewOnAdd"]= 1;
	$masterParams["previewOnEdit"]= 1;
	$masterParams["previewOnView"]= 1;
	$masterParams["proceedLink"]= 1;
	
	$masterParams["type"] = PAGE_LIST;
					$masterTablesData["reportesaio"][0] = $masterParams;	
				$masterTablesData["reportesaio"][0]["masterKeys"] = array();
	$masterTablesData["reportesaio"][0]["masterKeys"][]="Id Unidad";
				$masterTablesData["reportesaio"][0]["detailKeys"] = array();
	$masterTablesData["reportesaio"][0]["detailKeys"][]="unidad";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_reportesaio()
{
$proto3=array();
$proto3["m_strHead"] = "SELECT";
$proto3["m_strFieldList"] = "num,  	marca,  	serie,  	unidad,  	area,  	falla,  	fecha,  	usuario,  	ip,  	cuenta,  	evidencia";
$proto3["m_strFrom"] = "FROM reportesaio";
$proto3["m_strWhere"] = "";
$proto3["m_strOrderBy"] = "";
$proto3["m_strTail"] = "";
			$proto3["cipherer"] = null;
$proto4=array();
$proto4["m_sql"] = "";
$proto4["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto4["m_column"]=$obj;
$proto4["m_contained"] = array();
$proto4["m_strCase"] = "";
$proto4["m_havingmode"] = false;
$proto4["m_inBrackets"] = false;
$proto4["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto4);

$proto3["m_where"] = $obj;
$proto6=array();
$proto6["m_sql"] = "";
$proto6["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto6["m_column"]=$obj;
$proto6["m_contained"] = array();
$proto6["m_strCase"] = "";
$proto6["m_havingmode"] = false;
$proto6["m_inBrackets"] = false;
$proto6["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto6);

$proto3["m_having"] = $obj;
$proto3["m_fieldlist"] = array();
						$proto8=array();
			$obj = new SQLField(array(
	"m_strName" => "num",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto8["m_sql"] = "num";
$proto8["m_srcTableName"] = "reportesaio";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto3["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "marca",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto10["m_sql"] = "marca";
$proto10["m_srcTableName"] = "reportesaio";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto3["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "serie",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto12["m_sql"] = "serie";
$proto12["m_srcTableName"] = "reportesaio";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto3["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "unidad",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto14["m_sql"] = "unidad";
$proto14["m_srcTableName"] = "reportesaio";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto3["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "area",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto16["m_sql"] = "area";
$proto16["m_srcTableName"] = "reportesaio";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto3["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "falla",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto18["m_sql"] = "falla";
$proto18["m_srcTableName"] = "reportesaio";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto3["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "fecha",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto20["m_sql"] = "fecha";
$proto20["m_srcTableName"] = "reportesaio";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto3["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "usuario",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto22["m_sql"] = "usuario";
$proto22["m_srcTableName"] = "reportesaio";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto3["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "ip",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto24["m_sql"] = "ip";
$proto24["m_srcTableName"] = "reportesaio";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto3["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "cuenta",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto26["m_sql"] = "cuenta";
$proto26["m_srcTableName"] = "reportesaio";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto3["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "evidencia",
	"m_strTable" => "reportesaio",
	"m_srcTableName" => "reportesaio"
));

$proto28["m_sql"] = "evidencia";
$proto28["m_srcTableName"] = "reportesaio";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto3["m_fieldlist"][]=$obj;
$proto3["m_fromlist"] = array();
												$proto30=array();
$proto30["m_link"] = "SQLL_MAIN";
			$proto31=array();
$proto31["m_strName"] = "reportesaio";
$proto31["m_srcTableName"] = "reportesaio";
$proto31["m_columns"] = array();
$proto31["m_columns"][] = "num";
$proto31["m_columns"][] = "marca";
$proto31["m_columns"][] = "serie";
$proto31["m_columns"][] = "unidad";
$proto31["m_columns"][] = "area";
$proto31["m_columns"][] = "falla";
$proto31["m_columns"][] = "fecha";
$proto31["m_columns"][] = "usuario";
$proto31["m_columns"][] = "ip";
$proto31["m_columns"][] = "cuenta";
$proto31["m_columns"][] = "evidencia";
$obj = new SQLTable($proto31);

$proto30["m_table"] = $obj;
$proto30["m_sql"] = "reportesaio";
$proto30["m_alias"] = "";
$proto30["m_srcTableName"] = "reportesaio";
$proto32=array();
$proto32["m_sql"] = "";
$proto32["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto32["m_column"]=$obj;
$proto32["m_contained"] = array();
$proto32["m_strCase"] = "";
$proto32["m_havingmode"] = false;
$proto32["m_inBrackets"] = false;
$proto32["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto32);

$proto30["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto30);

$proto3["m_fromlist"][]=$obj;
$proto3["m_groupby"] = array();
$proto3["m_orderby"] = array();
$proto3["m_srcTableName"]="reportesaio";		
$obj = new SQLQuery($proto3);

	return $obj;
}
$queryData_reportesaio = createSqlQuery_reportesaio();


	
											
	
$tdatareportesaio[".sqlquery"] = $queryData_reportesaio;

$tableEvents["reportesaio"] = new eventsBase;
$tdatareportesaio[".hasEvents"] = false;

?>