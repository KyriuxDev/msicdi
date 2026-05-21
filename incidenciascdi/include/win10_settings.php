<?php
require_once(getabspath("classes/cipherer.php"));




$tdatawin10 = array();	
	$tdatawin10[".truncateText"] = true;
	$tdatawin10[".NumberOfChars"] = 80; 
	$tdatawin10[".ShortName"] = "win10";
	$tdatawin10[".OwnerID"] = "";
	$tdatawin10[".OriginalTable"] = "win10";

//	field labels
$fieldLabelswin10 = array();
$fieldToolTipswin10 = array();
$pageTitleswin10 = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelswin10["Spanish"] = array();
	$fieldToolTipswin10["Spanish"] = array();
	$pageTitleswin10["Spanish"] = array();
	$fieldLabelswin10["Spanish"]["id"] = "Id";
	$fieldToolTipswin10["Spanish"]["id"] = "";
	$fieldLabelswin10["Spanish"]["entidad"] = "Entidad";
	$fieldToolTipswin10["Spanish"]["entidad"] = "";
	$fieldLabelswin10["Spanish"]["delegacion"] = "Delegacion";
	$fieldToolTipswin10["Spanish"]["delegacion"] = "";
	$fieldLabelswin10["Spanish"]["unidad"] = "Unidad";
	$fieldToolTipswin10["Spanish"]["unidad"] = "";
	$fieldLabelswin10["Spanish"]["area"] = "Area";
	$fieldToolTipswin10["Spanish"]["area"] = "";
	$fieldLabelswin10["Spanish"]["hostn7"] = "Hostn7";
	$fieldToolTipswin10["Spanish"]["hostn7"] = "";
	$fieldLabelswin10["Spanish"]["hostn10"] = "Hostn10";
	$fieldToolTipswin10["Spanish"]["hostn10"] = "";
	$fieldLabelswin10["Spanish"]["version"] = "Version";
	$fieldToolTipswin10["Spanish"]["version"] = "";
	$fieldLabelswin10["Spanish"]["nomusuario"] = "Nomusuario";
	$fieldToolTipswin10["Spanish"]["nomusuario"] = "";
	$fieldLabelswin10["Spanish"]["cuenta"] = "Cuenta";
	$fieldToolTipswin10["Spanish"]["cuenta"] = "";
	$fieldLabelswin10["Spanish"]["segmentored"] = "Segmentored";
	$fieldToolTipswin10["Spanish"]["segmentored"] = "";
	$fieldLabelswin10["Spanish"]["fecha"] = "Fecha";
	$fieldToolTipswin10["Spanish"]["fecha"] = "";
	$fieldLabelswin10["Spanish"]["archivo"] = "Archivo";
	$fieldToolTipswin10["Spanish"]["archivo"] = "";
	if (count($fieldToolTipswin10["Spanish"]))
		$tdatawin10[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelswin10[""] = array();
	$fieldToolTipswin10[""] = array();
	$pageTitleswin10[""] = array();
	$fieldLabelswin10[""]["id"] = "Id";
	$fieldToolTipswin10[""]["id"] = "";
	if (count($fieldToolTipswin10[""]))
		$tdatawin10[".isUseToolTips"] = true;
}
	
	
	$tdatawin10[".NCSearch"] = true;



$tdatawin10[".shortTableName"] = "win10";
$tdatawin10[".nSecOptions"] = 0;
$tdatawin10[".recsPerRowList"] = 1;
$tdatawin10[".recsPerRowPrint"] = 1;
$tdatawin10[".mainTableOwnerID"] = "";
$tdatawin10[".moveNext"] = 1;
$tdatawin10[".entityType"] = 0;

$tdatawin10[".strOriginalTableName"] = "win10";




$tdatawin10[".showAddInPopup"] = true;

$tdatawin10[".showEditInPopup"] = true;

$tdatawin10[".showViewInPopup"] = true;

//page's base css files names
$popupPagesLayoutNames = array();
						
	;
$popupPagesLayoutNames["add"] = "add3";
						
	;
$popupPagesLayoutNames["edit"] = "edit3";
						
	;
$popupPagesLayoutNames["view"] = "view_basic_2col_center";
$tdatawin10[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatawin10[".fieldsForRegister"] = array();

$tdatawin10[".listAjax"] = false;

	$tdatawin10[".audit"] = false;

	$tdatawin10[".locking"] = false;

$tdatawin10[".edit"] = true;
$tdatawin10[".afterEditAction"] = 0;
$tdatawin10[".closePopupAfterEdit"] = 1;
$tdatawin10[".afterEditActionDetTable"] = "Detail tables not found!";

$tdatawin10[".add"] = true;
$tdatawin10[".afterAddAction"] = 1;
$tdatawin10[".closePopupAfterAdd"] = 1;
$tdatawin10[".afterAddActionDetTable"] = "";

$tdatawin10[".list"] = true;

$tdatawin10[".copy"] = true;
$tdatawin10[".view"] = true;


$tdatawin10[".exportTo"] = true;

$tdatawin10[".printFriendly"] = true;


$tdatawin10[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatawin10[".searchSaving"] = false;
//

$tdatawin10[".showSearchPanel"] = true;
		$tdatawin10[".flexibleSearch"] = true;		

if (isMobile())
	$tdatawin10[".isUseAjaxSuggest"] = false;
else 
	$tdatawin10[".isUseAjaxSuggest"] = true;

$tdatawin10[".rowHighlite"] = true;



$tdatawin10[".addPageEvents"] = false;

// use timepicker for search panel
$tdatawin10[".isUseTimeForSearch"] = false;





$tdatawin10[".allSearchFields"] = array();
$tdatawin10[".filterFields"] = array();
$tdatawin10[".requiredSearchFields"] = array();

$tdatawin10[".allSearchFields"][] = "id";
	$tdatawin10[".allSearchFields"][] = "entidad";
	$tdatawin10[".allSearchFields"][] = "delegacion";
	$tdatawin10[".allSearchFields"][] = "unidad";
	$tdatawin10[".allSearchFields"][] = "area";
	$tdatawin10[".allSearchFields"][] = "hostn7";
	$tdatawin10[".allSearchFields"][] = "hostn10";
	$tdatawin10[".allSearchFields"][] = "version";
	$tdatawin10[".allSearchFields"][] = "nomusuario";
	$tdatawin10[".allSearchFields"][] = "cuenta";
	$tdatawin10[".allSearchFields"][] = "segmentored";
	$tdatawin10[".allSearchFields"][] = "fecha";
	$tdatawin10[".allSearchFields"][] = "archivo";
	

$tdatawin10[".googleLikeFields"] = array();
$tdatawin10[".googleLikeFields"][] = "id";
$tdatawin10[".googleLikeFields"][] = "entidad";
$tdatawin10[".googleLikeFields"][] = "delegacion";
$tdatawin10[".googleLikeFields"][] = "unidad";
$tdatawin10[".googleLikeFields"][] = "area";
$tdatawin10[".googleLikeFields"][] = "hostn7";
$tdatawin10[".googleLikeFields"][] = "hostn10";
$tdatawin10[".googleLikeFields"][] = "version";
$tdatawin10[".googleLikeFields"][] = "nomusuario";
$tdatawin10[".googleLikeFields"][] = "cuenta";
$tdatawin10[".googleLikeFields"][] = "segmentored";
$tdatawin10[".googleLikeFields"][] = "fecha";
$tdatawin10[".googleLikeFields"][] = "archivo";


$tdatawin10[".advSearchFields"] = array();
$tdatawin10[".advSearchFields"][] = "id";
$tdatawin10[".advSearchFields"][] = "entidad";
$tdatawin10[".advSearchFields"][] = "delegacion";
$tdatawin10[".advSearchFields"][] = "unidad";
$tdatawin10[".advSearchFields"][] = "area";
$tdatawin10[".advSearchFields"][] = "hostn7";
$tdatawin10[".advSearchFields"][] = "hostn10";
$tdatawin10[".advSearchFields"][] = "version";
$tdatawin10[".advSearchFields"][] = "nomusuario";
$tdatawin10[".advSearchFields"][] = "cuenta";
$tdatawin10[".advSearchFields"][] = "segmentored";
$tdatawin10[".advSearchFields"][] = "fecha";
$tdatawin10[".advSearchFields"][] = "archivo";

$tdatawin10[".tableType"] = "list";

$tdatawin10[".printerPageOrientation"] = 0;
$tdatawin10[".nPrinterPageScale"] = 100;

$tdatawin10[".nPrinterSplitRecords"] = 40;

$tdatawin10[".nPrinterPDFSplitRecords"] = 40;



$tdatawin10[".geocodingEnabled"] = false;




	


$tdatawin10[".isResizeColumns"] = true;



// view page pdf
$tdatawin10[".isViewPagePDF"] = true;
$tdatawin10[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatawin10[".isPrinterPagePDF"] = true;
$tdatawin10[".nPrinterPagePDFScale"] = 100;


$tdatawin10[".pageSize"] = 50;

$tdatawin10[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatawin10[".strOrderBy"] = $tstrOrderBy;

$tdatawin10[".orderindexes"] = array();

$tdatawin10[".sqlHead"] = "SELECT id,  	entidad,  	delegacion,  	unidad,  	area,  	hostn7,  	hostn10,  	version,  	nomusuario,  	cuenta,  	segmentored,  	fecha,  	archivo";
$tdatawin10[".sqlFrom"] = "FROM win10";
$tdatawin10[".sqlWhereExpr"] = "";
$tdatawin10[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatawin10[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatawin10[".arrGroupsPerPage"] = $arrGPP;

$tdatawin10[".highlightSearchResults"] = true;

$tableKeyswin10 = array();
$tableKeyswin10[] = "id";
$tdatawin10[".Keys"] = $tableKeyswin10;

$tdatawin10[".listFields"] = array();
$tdatawin10[".listFields"][] = "id";
$tdatawin10[".listFields"][] = "entidad";
$tdatawin10[".listFields"][] = "delegacion";
$tdatawin10[".listFields"][] = "unidad";
$tdatawin10[".listFields"][] = "area";
$tdatawin10[".listFields"][] = "hostn7";
$tdatawin10[".listFields"][] = "hostn10";
$tdatawin10[".listFields"][] = "version";
$tdatawin10[".listFields"][] = "nomusuario";
$tdatawin10[".listFields"][] = "cuenta";
$tdatawin10[".listFields"][] = "segmentored";
$tdatawin10[".listFields"][] = "fecha";
$tdatawin10[".listFields"][] = "archivo";

$tdatawin10[".hideMobileList"] = array();


$tdatawin10[".viewFields"] = array();
$tdatawin10[".viewFields"][] = "id";
$tdatawin10[".viewFields"][] = "entidad";
$tdatawin10[".viewFields"][] = "delegacion";
$tdatawin10[".viewFields"][] = "unidad";
$tdatawin10[".viewFields"][] = "area";
$tdatawin10[".viewFields"][] = "hostn7";
$tdatawin10[".viewFields"][] = "hostn10";
$tdatawin10[".viewFields"][] = "version";
$tdatawin10[".viewFields"][] = "nomusuario";
$tdatawin10[".viewFields"][] = "cuenta";
$tdatawin10[".viewFields"][] = "segmentored";
$tdatawin10[".viewFields"][] = "fecha";
$tdatawin10[".viewFields"][] = "archivo";

$tdatawin10[".addFields"] = array();
$tdatawin10[".addFields"][] = "entidad";
$tdatawin10[".addFields"][] = "delegacion";
$tdatawin10[".addFields"][] = "unidad";
$tdatawin10[".addFields"][] = "area";
$tdatawin10[".addFields"][] = "hostn7";
$tdatawin10[".addFields"][] = "hostn10";
$tdatawin10[".addFields"][] = "version";
$tdatawin10[".addFields"][] = "nomusuario";
$tdatawin10[".addFields"][] = "cuenta";
$tdatawin10[".addFields"][] = "segmentored";
$tdatawin10[".addFields"][] = "fecha";
$tdatawin10[".addFields"][] = "archivo";

$tdatawin10[".masterListFields"] = array();
$tdatawin10[".masterListFields"][] = "id";
$tdatawin10[".masterListFields"][] = "entidad";
$tdatawin10[".masterListFields"][] = "delegacion";
$tdatawin10[".masterListFields"][] = "unidad";
$tdatawin10[".masterListFields"][] = "area";
$tdatawin10[".masterListFields"][] = "hostn7";
$tdatawin10[".masterListFields"][] = "hostn10";
$tdatawin10[".masterListFields"][] = "version";
$tdatawin10[".masterListFields"][] = "nomusuario";
$tdatawin10[".masterListFields"][] = "cuenta";
$tdatawin10[".masterListFields"][] = "segmentored";
$tdatawin10[".masterListFields"][] = "fecha";
$tdatawin10[".masterListFields"][] = "archivo";

$tdatawin10[".inlineAddFields"] = array();

$tdatawin10[".editFields"] = array();
$tdatawin10[".editFields"][] = "entidad";
$tdatawin10[".editFields"][] = "delegacion";
$tdatawin10[".editFields"][] = "unidad";
$tdatawin10[".editFields"][] = "area";
$tdatawin10[".editFields"][] = "hostn7";
$tdatawin10[".editFields"][] = "hostn10";
$tdatawin10[".editFields"][] = "version";
$tdatawin10[".editFields"][] = "nomusuario";
$tdatawin10[".editFields"][] = "cuenta";
$tdatawin10[".editFields"][] = "segmentored";
$tdatawin10[".editFields"][] = "fecha";
$tdatawin10[".editFields"][] = "archivo";

$tdatawin10[".inlineEditFields"] = array();

$tdatawin10[".exportFields"] = array();
$tdatawin10[".exportFields"][] = "id";
$tdatawin10[".exportFields"][] = "entidad";
$tdatawin10[".exportFields"][] = "delegacion";
$tdatawin10[".exportFields"][] = "unidad";
$tdatawin10[".exportFields"][] = "area";
$tdatawin10[".exportFields"][] = "hostn7";
$tdatawin10[".exportFields"][] = "hostn10";
$tdatawin10[".exportFields"][] = "version";
$tdatawin10[".exportFields"][] = "nomusuario";
$tdatawin10[".exportFields"][] = "cuenta";
$tdatawin10[".exportFields"][] = "segmentored";
$tdatawin10[".exportFields"][] = "fecha";
$tdatawin10[".exportFields"][] = "archivo";

$tdatawin10[".importFields"] = array();

$tdatawin10[".printFields"] = array();
$tdatawin10[".printFields"][] = "id";
$tdatawin10[".printFields"][] = "entidad";
$tdatawin10[".printFields"][] = "delegacion";
$tdatawin10[".printFields"][] = "unidad";
$tdatawin10[".printFields"][] = "area";
$tdatawin10[".printFields"][] = "hostn7";
$tdatawin10[".printFields"][] = "hostn10";
$tdatawin10[".printFields"][] = "version";
$tdatawin10[".printFields"][] = "nomusuario";
$tdatawin10[".printFields"][] = "cuenta";
$tdatawin10[".printFields"][] = "segmentored";
$tdatawin10[".printFields"][] = "fecha";
$tdatawin10[".printFields"][] = "archivo";

//	id
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id";
	$fdata["GoodName"] = "id";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","id"); 
	$fdata["FieldType"] = 3;
	
		
		$fdata["AutoInc"] = true;
	
		
				
		$fdata["bListPage"] = true; 
	
		
		
		
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "id"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "id";
	
		
		
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

	

	
	$tdatawin10["id"] = $fdata;
//	entidad
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "entidad";
	$fdata["GoodName"] = "entidad";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","entidad"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "entidad"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "entidad";
	
		
		
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
	
	$edata = array("EditFormat" => "Readonly");
	
			
	
	


		
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
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

	

	
	$tdatawin10["entidad"] = $fdata;
//	delegacion
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "delegacion";
	$fdata["GoodName"] = "delegacion";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","delegacion"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "delegacion"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "delegacion";
	
		
		
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
	
	$edata = array("EditFormat" => "Readonly");
	
			
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		
		
		
		
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

	

	
	$tdatawin10["delegacion"] = $fdata;
//	unidad
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "unidad";
	$fdata["GoodName"] = "unidad";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","unidad"); 
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
	
		
	$edata["LookupOrderBy"] = "Id Unidad";
	
		
			
		
				
	
	
		
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

	

	
	$tdatawin10["unidad"] = $fdata;
//	area
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "area";
	$fdata["GoodName"] = "area";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","area"); 
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

	

	
	$tdatawin10["area"] = $fdata;
//	hostn7
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 6;
	$fdata["strName"] = "hostn7";
	$fdata["GoodName"] = "hostn7";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","hostn7"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "hostn7"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "hostn7";
	
		
		
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

	

	
	$tdatawin10["hostn7"] = $fdata;
//	hostn10
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 7;
	$fdata["strName"] = "hostn10";
	$fdata["GoodName"] = "hostn10";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","hostn10"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "hostn10"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "hostn10";
	
		
		
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

	

	
	$tdatawin10["hostn10"] = $fdata;
//	version
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 8;
	$fdata["strName"] = "version";
	$fdata["GoodName"] = "version";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","version"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "version"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "version";
	
		
		
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
		$edata["LookupType"] = 0;
		$edata["autoCompleteFieldsOnEdit"] = 0;
	$edata["autoCompleteFields"] = array();
		$edata["LCType"] = 0;
		
		
		
		$edata["LookupValues"] = array();
	$edata["LookupValues"][] = "32";
	$edata["LookupValues"][] = "64";

		
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
		$fdata["defaultSearchOption"] = "Equals";
	
			// the default search options list
				$fdata["searchOptionsList"] = array("Contains", "Equals", "Empty");
// the end of search options settings	

	

	
	$tdatawin10["version"] = $fdata;
//	nomusuario
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 9;
	$fdata["strName"] = "nomusuario";
	$fdata["GoodName"] = "nomusuario";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","nomusuario"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "nomusuario"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "nomusuario";
	
		
		
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

	

	
	$tdatawin10["nomusuario"] = $fdata;
//	cuenta
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 10;
	$fdata["strName"] = "cuenta";
	$fdata["GoodName"] = "cuenta";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","cuenta"); 
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
			$edata["EditParams"].= " maxlength=45";
	
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

	

	
	$tdatawin10["cuenta"] = $fdata;
//	segmentored
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 11;
	$fdata["strName"] = "segmentored";
	$fdata["GoodName"] = "segmentored";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","segmentored"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "segmentored"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "segmentored";
	
		
		
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

	

	
	$tdatawin10["segmentored"] = $fdata;
//	fecha
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 12;
	$fdata["strName"] = "fecha";
	$fdata["GoodName"] = "fecha";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","fecha"); 
	$fdata["FieldType"] = 7;
	
		
		
		
				
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
	$edata["InitialYearFactor"] = 3; 
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

	

	
	$tdatawin10["fecha"] = $fdata;
//	archivo
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 13;
	$fdata["strName"] = "archivo";
	$fdata["GoodName"] = "archivo";
	$fdata["ownerTable"] = "win10";
	$fdata["Label"] = GetFieldLabel("win10","archivo"); 
	$fdata["FieldType"] = 201;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		
		$fdata["bEditPage"] = true; 
	
		
		$fdata["bViewPage"] = true; 
	
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "archivo"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "archivo";
	
		$fdata["DeleteAssociatedFile"] = true;
	
		
				$fdata["FieldPermissions"] = true;
	
		$fdata["UploadCodeExpression"] = true;
		
//  Begin View Formats
	$fdata["ViewFormats"] = array();
	
	$vdata = array("ViewFormat" => "Document Download");
	
		
		
		
				$vdata["ShowThumbnail"] = true; 
					$vdata["ShowIcon"] = true; 
			
		
		
		
		
		
		
		
		
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

	

	
	$tdatawin10["archivo"] = $fdata;

	
$tables_data["win10"]=&$tdatawin10;
$field_labels["win10"] = &$fieldLabelswin10;
$fieldToolTips["win10"] = &$fieldToolTipswin10;
$page_titles["win10"] = &$pageTitleswin10;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["win10"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["win10"] = array();


	
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
					$masterTablesData["win10"][0] = $masterParams;	
				$masterTablesData["win10"][0]["masterKeys"] = array();
	$masterTablesData["win10"][0]["masterKeys"][]="Id Unidad";
				$masterTablesData["win10"][0]["detailKeys"] = array();
	$masterTablesData["win10"][0]["detailKeys"][]="unidad";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_win10()
{
$proto3=array();
$proto3["m_strHead"] = "SELECT";
$proto3["m_strFieldList"] = "id,  	entidad,  	delegacion,  	unidad,  	area,  	hostn7,  	hostn10,  	version,  	nomusuario,  	cuenta,  	segmentored,  	fecha,  	archivo";
$proto3["m_strFrom"] = "FROM win10";
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
	"m_strName" => "id",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto8["m_sql"] = "id";
$proto8["m_srcTableName"] = "win10";
$proto8["m_expr"]=$obj;
$proto8["m_alias"] = "";
$obj = new SQLFieldListItem($proto8);

$proto3["m_fieldlist"][]=$obj;
						$proto10=array();
			$obj = new SQLField(array(
	"m_strName" => "entidad",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto10["m_sql"] = "entidad";
$proto10["m_srcTableName"] = "win10";
$proto10["m_expr"]=$obj;
$proto10["m_alias"] = "";
$obj = new SQLFieldListItem($proto10);

$proto3["m_fieldlist"][]=$obj;
						$proto12=array();
			$obj = new SQLField(array(
	"m_strName" => "delegacion",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto12["m_sql"] = "delegacion";
$proto12["m_srcTableName"] = "win10";
$proto12["m_expr"]=$obj;
$proto12["m_alias"] = "";
$obj = new SQLFieldListItem($proto12);

$proto3["m_fieldlist"][]=$obj;
						$proto14=array();
			$obj = new SQLField(array(
	"m_strName" => "unidad",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto14["m_sql"] = "unidad";
$proto14["m_srcTableName"] = "win10";
$proto14["m_expr"]=$obj;
$proto14["m_alias"] = "";
$obj = new SQLFieldListItem($proto14);

$proto3["m_fieldlist"][]=$obj;
						$proto16=array();
			$obj = new SQLField(array(
	"m_strName" => "area",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto16["m_sql"] = "area";
$proto16["m_srcTableName"] = "win10";
$proto16["m_expr"]=$obj;
$proto16["m_alias"] = "";
$obj = new SQLFieldListItem($proto16);

$proto3["m_fieldlist"][]=$obj;
						$proto18=array();
			$obj = new SQLField(array(
	"m_strName" => "hostn7",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto18["m_sql"] = "hostn7";
$proto18["m_srcTableName"] = "win10";
$proto18["m_expr"]=$obj;
$proto18["m_alias"] = "";
$obj = new SQLFieldListItem($proto18);

$proto3["m_fieldlist"][]=$obj;
						$proto20=array();
			$obj = new SQLField(array(
	"m_strName" => "hostn10",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto20["m_sql"] = "hostn10";
$proto20["m_srcTableName"] = "win10";
$proto20["m_expr"]=$obj;
$proto20["m_alias"] = "";
$obj = new SQLFieldListItem($proto20);

$proto3["m_fieldlist"][]=$obj;
						$proto22=array();
			$obj = new SQLField(array(
	"m_strName" => "version",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto22["m_sql"] = "version";
$proto22["m_srcTableName"] = "win10";
$proto22["m_expr"]=$obj;
$proto22["m_alias"] = "";
$obj = new SQLFieldListItem($proto22);

$proto3["m_fieldlist"][]=$obj;
						$proto24=array();
			$obj = new SQLField(array(
	"m_strName" => "nomusuario",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto24["m_sql"] = "nomusuario";
$proto24["m_srcTableName"] = "win10";
$proto24["m_expr"]=$obj;
$proto24["m_alias"] = "";
$obj = new SQLFieldListItem($proto24);

$proto3["m_fieldlist"][]=$obj;
						$proto26=array();
			$obj = new SQLField(array(
	"m_strName" => "cuenta",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto26["m_sql"] = "cuenta";
$proto26["m_srcTableName"] = "win10";
$proto26["m_expr"]=$obj;
$proto26["m_alias"] = "";
$obj = new SQLFieldListItem($proto26);

$proto3["m_fieldlist"][]=$obj;
						$proto28=array();
			$obj = new SQLField(array(
	"m_strName" => "segmentored",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto28["m_sql"] = "segmentored";
$proto28["m_srcTableName"] = "win10";
$proto28["m_expr"]=$obj;
$proto28["m_alias"] = "";
$obj = new SQLFieldListItem($proto28);

$proto3["m_fieldlist"][]=$obj;
						$proto30=array();
			$obj = new SQLField(array(
	"m_strName" => "fecha",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto30["m_sql"] = "fecha";
$proto30["m_srcTableName"] = "win10";
$proto30["m_expr"]=$obj;
$proto30["m_alias"] = "";
$obj = new SQLFieldListItem($proto30);

$proto3["m_fieldlist"][]=$obj;
						$proto32=array();
			$obj = new SQLField(array(
	"m_strName" => "archivo",
	"m_strTable" => "win10",
	"m_srcTableName" => "win10"
));

$proto32["m_sql"] = "archivo";
$proto32["m_srcTableName"] = "win10";
$proto32["m_expr"]=$obj;
$proto32["m_alias"] = "";
$obj = new SQLFieldListItem($proto32);

$proto3["m_fieldlist"][]=$obj;
$proto3["m_fromlist"] = array();
												$proto34=array();
$proto34["m_link"] = "SQLL_MAIN";
			$proto35=array();
$proto35["m_strName"] = "win10";
$proto35["m_srcTableName"] = "win10";
$proto35["m_columns"] = array();
$proto35["m_columns"][] = "id";
$proto35["m_columns"][] = "entidad";
$proto35["m_columns"][] = "delegacion";
$proto35["m_columns"][] = "unidad";
$proto35["m_columns"][] = "area";
$proto35["m_columns"][] = "hostn7";
$proto35["m_columns"][] = "hostn10";
$proto35["m_columns"][] = "version";
$proto35["m_columns"][] = "nomusuario";
$proto35["m_columns"][] = "cuenta";
$proto35["m_columns"][] = "segmentored";
$proto35["m_columns"][] = "fecha";
$proto35["m_columns"][] = "archivo";
$obj = new SQLTable($proto35);

$proto34["m_table"] = $obj;
$proto34["m_sql"] = "win10";
$proto34["m_alias"] = "";
$proto34["m_srcTableName"] = "win10";
$proto36=array();
$proto36["m_sql"] = "";
$proto36["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto36["m_column"]=$obj;
$proto36["m_contained"] = array();
$proto36["m_strCase"] = "";
$proto36["m_havingmode"] = false;
$proto36["m_inBrackets"] = false;
$proto36["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto36);

$proto34["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto34);

$proto3["m_fromlist"][]=$obj;
$proto3["m_groupby"] = array();
$proto3["m_orderby"] = array();
$proto3["m_srcTableName"]="win10";		
$obj = new SQLQuery($proto3);

	return $obj;
}
$queryData_win10 = createSqlQuery_win10();


	
													
	
$tdatawin10[".sqlquery"] = $queryData_win10;

$tableEvents["win10"] = new eventsBase;
$tdatawin10[".hasEvents"] = false;

?>