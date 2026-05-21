<?php
require_once(getabspath("classes/cipherer.php"));




$tdatacat_personal = array();	
	$tdatacat_personal[".truncateText"] = true;
	$tdatacat_personal[".NumberOfChars"] = 80; 
	$tdatacat_personal[".ShortName"] = "cat_personal";
	$tdatacat_personal[".OwnerID"] = "";
	$tdatacat_personal[".OriginalTable"] = "cat_personal";

//	field labels
$fieldLabelscat_personal = array();
$fieldToolTipscat_personal = array();
$pageTitlescat_personal = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelscat_personal["Spanish"] = array();
	$fieldToolTipscat_personal["Spanish"] = array();
	$pageTitlescat_personal["Spanish"] = array();
	$fieldLabelscat_personal["Spanish"]["matricula"] = "Matricula";
	$fieldToolTipscat_personal["Spanish"]["matricula"] = "";
	$fieldLabelscat_personal["Spanish"]["appat"] = "Appat";
	$fieldToolTipscat_personal["Spanish"]["appat"] = "";
	$fieldLabelscat_personal["Spanish"]["apmat"] = "Apmat";
	$fieldToolTipscat_personal["Spanish"]["apmat"] = "";
	$fieldLabelscat_personal["Spanish"]["nombre"] = "Nombre";
	$fieldToolTipscat_personal["Spanish"]["nombre"] = "";
	if (count($fieldToolTipscat_personal["Spanish"]))
		$tdatacat_personal[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelscat_personal[""] = array();
	$fieldToolTipscat_personal[""] = array();
	$pageTitlescat_personal[""] = array();
	if (count($fieldToolTipscat_personal[""]))
		$tdatacat_personal[".isUseToolTips"] = true;
}
	
	
	$tdatacat_personal[".NCSearch"] = true;



$tdatacat_personal[".shortTableName"] = "cat_personal";
$tdatacat_personal[".nSecOptions"] = 0;
$tdatacat_personal[".recsPerRowList"] = 1;
$tdatacat_personal[".recsPerRowPrint"] = 1;
$tdatacat_personal[".mainTableOwnerID"] = "";
$tdatacat_personal[".moveNext"] = 1;
$tdatacat_personal[".entityType"] = 0;

$tdatacat_personal[".strOriginalTableName"] = "cat_personal";




$tdatacat_personal[".showAddInPopup"] = false;

$tdatacat_personal[".showEditInPopup"] = false;

$tdatacat_personal[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatacat_personal[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatacat_personal[".fieldsForRegister"] = array();

$tdatacat_personal[".listAjax"] = false;

	$tdatacat_personal[".audit"] = false;

	$tdatacat_personal[".locking"] = false;

$tdatacat_personal[".edit"] = true;
$tdatacat_personal[".afterEditAction"] = 1;
$tdatacat_personal[".closePopupAfterEdit"] = 1;
$tdatacat_personal[".afterEditActionDetTable"] = "";

$tdatacat_personal[".add"] = true;
$tdatacat_personal[".afterAddAction"] = 1;
$tdatacat_personal[".closePopupAfterAdd"] = 1;
$tdatacat_personal[".afterAddActionDetTable"] = "";

$tdatacat_personal[".list"] = true;

$tdatacat_personal[".inlineEdit"] = true;
$tdatacat_personal[".inlineAdd"] = true;
$tdatacat_personal[".copy"] = true;
$tdatacat_personal[".view"] = true;

$tdatacat_personal[".import"] = true;

$tdatacat_personal[".exportTo"] = true;

$tdatacat_personal[".printFriendly"] = true;

$tdatacat_personal[".delete"] = true;

$tdatacat_personal[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatacat_personal[".searchSaving"] = false;
//

$tdatacat_personal[".showSearchPanel"] = true;
		$tdatacat_personal[".flexibleSearch"] = true;		

if (isMobile())
	$tdatacat_personal[".isUseAjaxSuggest"] = false;
else 
	$tdatacat_personal[".isUseAjaxSuggest"] = true;

$tdatacat_personal[".rowHighlite"] = true;



$tdatacat_personal[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacat_personal[".isUseTimeForSearch"] = false;





$tdatacat_personal[".allSearchFields"] = array();
$tdatacat_personal[".filterFields"] = array();
$tdatacat_personal[".requiredSearchFields"] = array();

$tdatacat_personal[".allSearchFields"][] = "matricula";
	$tdatacat_personal[".allSearchFields"][] = "appat";
	$tdatacat_personal[".allSearchFields"][] = "apmat";
	$tdatacat_personal[".allSearchFields"][] = "nombre";
	

$tdatacat_personal[".googleLikeFields"] = array();
$tdatacat_personal[".googleLikeFields"][] = "matricula";
$tdatacat_personal[".googleLikeFields"][] = "appat";
$tdatacat_personal[".googleLikeFields"][] = "apmat";
$tdatacat_personal[".googleLikeFields"][] = "nombre";


$tdatacat_personal[".advSearchFields"] = array();
$tdatacat_personal[".advSearchFields"][] = "matricula";
$tdatacat_personal[".advSearchFields"][] = "appat";
$tdatacat_personal[".advSearchFields"][] = "apmat";
$tdatacat_personal[".advSearchFields"][] = "nombre";

$tdatacat_personal[".tableType"] = "list";

$tdatacat_personal[".printerPageOrientation"] = 0;
$tdatacat_personal[".nPrinterPageScale"] = 100;

$tdatacat_personal[".nPrinterSplitRecords"] = 40;

$tdatacat_personal[".nPrinterPDFSplitRecords"] = 40;



$tdatacat_personal[".geocodingEnabled"] = false;




	





// view page pdf
$tdatacat_personal[".isViewPagePDF"] = true;
$tdatacat_personal[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatacat_personal[".isPrinterPagePDF"] = true;
$tdatacat_personal[".nPrinterPagePDFScale"] = 100;


$tdatacat_personal[".pageSize"] = 20;

$tdatacat_personal[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacat_personal[".strOrderBy"] = $tstrOrderBy;

$tdatacat_personal[".orderindexes"] = array();

$tdatacat_personal[".sqlHead"] = "SELECT matricula,  	appat,  	apmat,  	nombre";
$tdatacat_personal[".sqlFrom"] = "FROM cat_personal";
$tdatacat_personal[".sqlWhereExpr"] = "";
$tdatacat_personal[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacat_personal[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacat_personal[".arrGroupsPerPage"] = $arrGPP;

$tdatacat_personal[".highlightSearchResults"] = true;

$tableKeyscat_personal = array();
$tableKeyscat_personal[] = "matricula";
$tdatacat_personal[".Keys"] = $tableKeyscat_personal;

$tdatacat_personal[".listFields"] = array();
$tdatacat_personal[".listFields"][] = "matricula";
$tdatacat_personal[".listFields"][] = "appat";
$tdatacat_personal[".listFields"][] = "apmat";
$tdatacat_personal[".listFields"][] = "nombre";

$tdatacat_personal[".hideMobileList"] = array();


$tdatacat_personal[".viewFields"] = array();
$tdatacat_personal[".viewFields"][] = "matricula";
$tdatacat_personal[".viewFields"][] = "appat";
$tdatacat_personal[".viewFields"][] = "apmat";
$tdatacat_personal[".viewFields"][] = "nombre";

$tdatacat_personal[".addFields"] = array();
$tdatacat_personal[".addFields"][] = "matricula";
$tdatacat_personal[".addFields"][] = "appat";
$tdatacat_personal[".addFields"][] = "apmat";
$tdatacat_personal[".addFields"][] = "nombre";

$tdatacat_personal[".masterListFields"] = array();
$tdatacat_personal[".masterListFields"][] = "matricula";
$tdatacat_personal[".masterListFields"][] = "appat";
$tdatacat_personal[".masterListFields"][] = "apmat";
$tdatacat_personal[".masterListFields"][] = "nombre";

$tdatacat_personal[".inlineAddFields"] = array();
$tdatacat_personal[".inlineAddFields"][] = "matricula";
$tdatacat_personal[".inlineAddFields"][] = "appat";
$tdatacat_personal[".inlineAddFields"][] = "apmat";
$tdatacat_personal[".inlineAddFields"][] = "nombre";

$tdatacat_personal[".editFields"] = array();
$tdatacat_personal[".editFields"][] = "matricula";
$tdatacat_personal[".editFields"][] = "appat";
$tdatacat_personal[".editFields"][] = "apmat";
$tdatacat_personal[".editFields"][] = "nombre";

$tdatacat_personal[".inlineEditFields"] = array();
$tdatacat_personal[".inlineEditFields"][] = "matricula";
$tdatacat_personal[".inlineEditFields"][] = "appat";
$tdatacat_personal[".inlineEditFields"][] = "apmat";
$tdatacat_personal[".inlineEditFields"][] = "nombre";

$tdatacat_personal[".exportFields"] = array();
$tdatacat_personal[".exportFields"][] = "matricula";
$tdatacat_personal[".exportFields"][] = "appat";
$tdatacat_personal[".exportFields"][] = "apmat";
$tdatacat_personal[".exportFields"][] = "nombre";

$tdatacat_personal[".importFields"] = array();
$tdatacat_personal[".importFields"][] = "matricula";
$tdatacat_personal[".importFields"][] = "appat";
$tdatacat_personal[".importFields"][] = "apmat";
$tdatacat_personal[".importFields"][] = "nombre";

$tdatacat_personal[".printFields"] = array();
$tdatacat_personal[".printFields"][] = "matricula";
$tdatacat_personal[".printFields"][] = "appat";
$tdatacat_personal[".printFields"][] = "apmat";
$tdatacat_personal[".printFields"][] = "nombre";

//	matricula
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "matricula";
	$fdata["GoodName"] = "matricula";
	$fdata["ownerTable"] = "cat_personal";
	$fdata["Label"] = GetFieldLabel("cat_personal","matricula"); 
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
	
		$fdata["strField"] = "matricula"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "matricula";
	
		
		
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

	

	
	$tdatacat_personal["matricula"] = $fdata;
//	appat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "appat";
	$fdata["GoodName"] = "appat";
	$fdata["ownerTable"] = "cat_personal";
	$fdata["Label"] = GetFieldLabel("cat_personal","appat"); 
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
	
		$fdata["strField"] = "appat"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "appat";
	
		
		
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

	

	
	$tdatacat_personal["appat"] = $fdata;
//	apmat
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "apmat";
	$fdata["GoodName"] = "apmat";
	$fdata["ownerTable"] = "cat_personal";
	$fdata["Label"] = GetFieldLabel("cat_personal","apmat"); 
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
	
		$fdata["strField"] = "apmat"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "apmat";
	
		
		
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

	

	
	$tdatacat_personal["apmat"] = $fdata;
//	nombre
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "nombre";
	$fdata["GoodName"] = "nombre";
	$fdata["ownerTable"] = "cat_personal";
	$fdata["Label"] = GetFieldLabel("cat_personal","nombre"); 
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

	

	
	$tdatacat_personal["nombre"] = $fdata;

	
$tables_data["cat_personal"]=&$tdatacat_personal;
$field_labels["cat_personal"] = &$fieldLabelscat_personal;
$fieldToolTips["cat_personal"] = &$fieldToolTipscat_personal;
$page_titles["cat_personal"] = &$pageTitlescat_personal;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cat_personal"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["cat_personal"] = array();


	
				$strOriginalDetailsTable="datos";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="datos";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "datos";
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
					$masterTablesData["cat_personal"][0] = $masterParams;	
				$masterTablesData["cat_personal"][0]["masterKeys"] = array();
	$masterTablesData["cat_personal"][0]["masterKeys"][]="mat_aplicador";
				$masterTablesData["cat_personal"][0]["detailKeys"] = array();
	$masterTablesData["cat_personal"][0]["detailKeys"][]="matricula";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_cat_personal()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "matricula,  	appat,  	apmat,  	nombre";
$proto0["m_strFrom"] = "FROM cat_personal";
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
	"m_strName" => "matricula",
	"m_strTable" => "cat_personal",
	"m_srcTableName" => "cat_personal"
));

$proto5["m_sql"] = "matricula";
$proto5["m_srcTableName"] = "cat_personal";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "appat",
	"m_strTable" => "cat_personal",
	"m_srcTableName" => "cat_personal"
));

$proto7["m_sql"] = "appat";
$proto7["m_srcTableName"] = "cat_personal";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "apmat",
	"m_strTable" => "cat_personal",
	"m_srcTableName" => "cat_personal"
));

$proto9["m_sql"] = "apmat";
$proto9["m_srcTableName"] = "cat_personal";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "nombre",
	"m_strTable" => "cat_personal",
	"m_srcTableName" => "cat_personal"
));

$proto11["m_sql"] = "nombre";
$proto11["m_srcTableName"] = "cat_personal";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto13=array();
$proto13["m_link"] = "SQLL_MAIN";
			$proto14=array();
$proto14["m_strName"] = "cat_personal";
$proto14["m_srcTableName"] = "cat_personal";
$proto14["m_columns"] = array();
$proto14["m_columns"][] = "matricula";
$proto14["m_columns"][] = "appat";
$proto14["m_columns"][] = "apmat";
$proto14["m_columns"][] = "nombre";
$obj = new SQLTable($proto14);

$proto13["m_table"] = $obj;
$proto13["m_sql"] = "cat_personal";
$proto13["m_alias"] = "";
$proto13["m_srcTableName"] = "cat_personal";
$proto15=array();
$proto15["m_sql"] = "";
$proto15["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto15["m_column"]=$obj;
$proto15["m_contained"] = array();
$proto15["m_strCase"] = "";
$proto15["m_havingmode"] = false;
$proto15["m_inBrackets"] = false;
$proto15["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto15);

$proto13["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto13);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="cat_personal";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_cat_personal = createSqlQuery_cat_personal();


	
				
	
$tdatacat_personal[".sqlquery"] = $queryData_cat_personal;

$tableEvents["cat_personal"] = new eventsBase;
$tdatacat_personal[".hasEvents"] = false;

?>