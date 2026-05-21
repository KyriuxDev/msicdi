<?php
require_once(getabspath("classes/cipherer.php"));




$tdatacat_adscripcion = array();	
	$tdatacat_adscripcion[".truncateText"] = true;
	$tdatacat_adscripcion[".NumberOfChars"] = 80; 
	$tdatacat_adscripcion[".ShortName"] = "cat_adscripcion";
	$tdatacat_adscripcion[".OwnerID"] = "";
	$tdatacat_adscripcion[".OriginalTable"] = "cat_adscripcion";

//	field labels
$fieldLabelscat_adscripcion = array();
$fieldToolTipscat_adscripcion = array();
$pageTitlescat_adscripcion = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelscat_adscripcion["Spanish"] = array();
	$fieldToolTipscat_adscripcion["Spanish"] = array();
	$pageTitlescat_adscripcion["Spanish"] = array();
	$fieldLabelscat_adscripcion["Spanish"]["id_adsc"] = "Id Adsc";
	$fieldToolTipscat_adscripcion["Spanish"]["id_adsc"] = "";
	$fieldLabelscat_adscripcion["Spanish"]["adscripcion"] = "Adscripcion";
	$fieldToolTipscat_adscripcion["Spanish"]["adscripcion"] = "";
	if (count($fieldToolTipscat_adscripcion["Spanish"]))
		$tdatacat_adscripcion[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelscat_adscripcion[""] = array();
	$fieldToolTipscat_adscripcion[""] = array();
	$pageTitlescat_adscripcion[""] = array();
	if (count($fieldToolTipscat_adscripcion[""]))
		$tdatacat_adscripcion[".isUseToolTips"] = true;
}
	
	
	$tdatacat_adscripcion[".NCSearch"] = true;



$tdatacat_adscripcion[".shortTableName"] = "cat_adscripcion";
$tdatacat_adscripcion[".nSecOptions"] = 0;
$tdatacat_adscripcion[".recsPerRowList"] = 1;
$tdatacat_adscripcion[".recsPerRowPrint"] = 1;
$tdatacat_adscripcion[".mainTableOwnerID"] = "";
$tdatacat_adscripcion[".moveNext"] = 1;
$tdatacat_adscripcion[".entityType"] = 0;

$tdatacat_adscripcion[".strOriginalTableName"] = "cat_adscripcion";




$tdatacat_adscripcion[".showAddInPopup"] = false;

$tdatacat_adscripcion[".showEditInPopup"] = false;

$tdatacat_adscripcion[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatacat_adscripcion[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatacat_adscripcion[".fieldsForRegister"] = array();

$tdatacat_adscripcion[".listAjax"] = false;

	$tdatacat_adscripcion[".audit"] = false;

	$tdatacat_adscripcion[".locking"] = false;

$tdatacat_adscripcion[".edit"] = true;
$tdatacat_adscripcion[".afterEditAction"] = 1;
$tdatacat_adscripcion[".closePopupAfterEdit"] = 1;
$tdatacat_adscripcion[".afterEditActionDetTable"] = "";

$tdatacat_adscripcion[".add"] = true;
$tdatacat_adscripcion[".afterAddAction"] = 1;
$tdatacat_adscripcion[".closePopupAfterAdd"] = 1;
$tdatacat_adscripcion[".afterAddActionDetTable"] = "";

$tdatacat_adscripcion[".list"] = true;

$tdatacat_adscripcion[".inlineEdit"] = true;
$tdatacat_adscripcion[".inlineAdd"] = true;
$tdatacat_adscripcion[".copy"] = true;
$tdatacat_adscripcion[".view"] = true;

$tdatacat_adscripcion[".import"] = true;

$tdatacat_adscripcion[".exportTo"] = true;

$tdatacat_adscripcion[".printFriendly"] = true;

$tdatacat_adscripcion[".delete"] = true;

$tdatacat_adscripcion[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatacat_adscripcion[".searchSaving"] = false;
//

$tdatacat_adscripcion[".showSearchPanel"] = true;
		$tdatacat_adscripcion[".flexibleSearch"] = true;		

if (isMobile())
	$tdatacat_adscripcion[".isUseAjaxSuggest"] = false;
else 
	$tdatacat_adscripcion[".isUseAjaxSuggest"] = true;

$tdatacat_adscripcion[".rowHighlite"] = true;



$tdatacat_adscripcion[".addPageEvents"] = false;

// use timepicker for search panel
$tdatacat_adscripcion[".isUseTimeForSearch"] = false;





$tdatacat_adscripcion[".allSearchFields"] = array();
$tdatacat_adscripcion[".filterFields"] = array();
$tdatacat_adscripcion[".requiredSearchFields"] = array();

$tdatacat_adscripcion[".allSearchFields"][] = "id_adsc";
	$tdatacat_adscripcion[".allSearchFields"][] = "adscripcion";
	

$tdatacat_adscripcion[".googleLikeFields"] = array();
$tdatacat_adscripcion[".googleLikeFields"][] = "id_adsc";
$tdatacat_adscripcion[".googleLikeFields"][] = "adscripcion";


$tdatacat_adscripcion[".advSearchFields"] = array();
$tdatacat_adscripcion[".advSearchFields"][] = "id_adsc";
$tdatacat_adscripcion[".advSearchFields"][] = "adscripcion";

$tdatacat_adscripcion[".tableType"] = "list";

$tdatacat_adscripcion[".printerPageOrientation"] = 0;
$tdatacat_adscripcion[".nPrinterPageScale"] = 100;

$tdatacat_adscripcion[".nPrinterSplitRecords"] = 40;

$tdatacat_adscripcion[".nPrinterPDFSplitRecords"] = 40;



$tdatacat_adscripcion[".geocodingEnabled"] = false;




	





// view page pdf
$tdatacat_adscripcion[".isViewPagePDF"] = true;
$tdatacat_adscripcion[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatacat_adscripcion[".isPrinterPagePDF"] = true;
$tdatacat_adscripcion[".nPrinterPagePDFScale"] = 100;


$tdatacat_adscripcion[".pageSize"] = 20;

$tdatacat_adscripcion[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatacat_adscripcion[".strOrderBy"] = $tstrOrderBy;

$tdatacat_adscripcion[".orderindexes"] = array();

$tdatacat_adscripcion[".sqlHead"] = "SELECT id_adsc,  	adscripcion";
$tdatacat_adscripcion[".sqlFrom"] = "FROM cat_adscripcion";
$tdatacat_adscripcion[".sqlWhereExpr"] = "";
$tdatacat_adscripcion[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatacat_adscripcion[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatacat_adscripcion[".arrGroupsPerPage"] = $arrGPP;

$tdatacat_adscripcion[".highlightSearchResults"] = true;

$tableKeyscat_adscripcion = array();
$tableKeyscat_adscripcion[] = "id_adsc";
$tdatacat_adscripcion[".Keys"] = $tableKeyscat_adscripcion;

$tdatacat_adscripcion[".listFields"] = array();
$tdatacat_adscripcion[".listFields"][] = "id_adsc";
$tdatacat_adscripcion[".listFields"][] = "adscripcion";

$tdatacat_adscripcion[".hideMobileList"] = array();


$tdatacat_adscripcion[".viewFields"] = array();
$tdatacat_adscripcion[".viewFields"][] = "id_adsc";
$tdatacat_adscripcion[".viewFields"][] = "adscripcion";

$tdatacat_adscripcion[".addFields"] = array();
$tdatacat_adscripcion[".addFields"][] = "id_adsc";
$tdatacat_adscripcion[".addFields"][] = "adscripcion";

$tdatacat_adscripcion[".masterListFields"] = array();
$tdatacat_adscripcion[".masterListFields"][] = "id_adsc";
$tdatacat_adscripcion[".masterListFields"][] = "adscripcion";

$tdatacat_adscripcion[".inlineAddFields"] = array();
$tdatacat_adscripcion[".inlineAddFields"][] = "id_adsc";
$tdatacat_adscripcion[".inlineAddFields"][] = "adscripcion";

$tdatacat_adscripcion[".editFields"] = array();
$tdatacat_adscripcion[".editFields"][] = "id_adsc";
$tdatacat_adscripcion[".editFields"][] = "adscripcion";

$tdatacat_adscripcion[".inlineEditFields"] = array();
$tdatacat_adscripcion[".inlineEditFields"][] = "id_adsc";
$tdatacat_adscripcion[".inlineEditFields"][] = "adscripcion";

$tdatacat_adscripcion[".exportFields"] = array();
$tdatacat_adscripcion[".exportFields"][] = "id_adsc";
$tdatacat_adscripcion[".exportFields"][] = "adscripcion";

$tdatacat_adscripcion[".importFields"] = array();
$tdatacat_adscripcion[".importFields"][] = "id_adsc";
$tdatacat_adscripcion[".importFields"][] = "adscripcion";

$tdatacat_adscripcion[".printFields"] = array();
$tdatacat_adscripcion[".printFields"][] = "id_adsc";
$tdatacat_adscripcion[".printFields"][] = "adscripcion";

//	id_adsc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "id_adsc";
	$fdata["GoodName"] = "id_adsc";
	$fdata["ownerTable"] = "cat_adscripcion";
	$fdata["Label"] = GetFieldLabel("cat_adscripcion","id_adsc"); 
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

	

	
	$tdatacat_adscripcion["id_adsc"] = $fdata;
//	adscripcion
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "adscripcion";
	$fdata["GoodName"] = "adscripcion";
	$fdata["ownerTable"] = "cat_adscripcion";
	$fdata["Label"] = GetFieldLabel("cat_adscripcion","adscripcion"); 
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
	
		$fdata["strField"] = "adscripcion"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "adscripcion";
	
		
		
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

	

	
	$tdatacat_adscripcion["adscripcion"] = $fdata;

	
$tables_data["cat_adscripcion"]=&$tdatacat_adscripcion;
$field_labels["cat_adscripcion"] = &$fieldLabelscat_adscripcion;
$fieldToolTips["cat_adscripcion"] = &$fieldToolTipscat_adscripcion;
$page_titles["cat_adscripcion"] = &$pageTitlescat_adscripcion;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["cat_adscripcion"] = array();
//	datos
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="datos";
		$detailsParam["dOriginalTable"] = "datos";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "datos";
	$detailsParam["dCaptionTable"] = GetTableCaption("datos");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
			$detailsParam["dispChildCount"] = 0;
		$detailsParam["hideChild"] = false;
			$detailsParam["previewOnList"] = "1";
	$detailsParam["previewOnAdd"] = 0;
	$detailsParam["previewOnEdit"] = 0;
	$detailsParam["previewOnView"] = 0;
			
	$detailsTablesData["cat_adscripcion"][$dIndex] = $detailsParam;
	
		
		$detailsTablesData["cat_adscripcion"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["cat_adscripcion"][$dIndex]["masterKeys"][]="id_adsc";

				$detailsTablesData["cat_adscripcion"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["cat_adscripcion"][$dIndex]["detailKeys"][]="id_adsc";
	
// tables which are master tables for current table (detail)
$masterTablesData["cat_adscripcion"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_cat_adscripcion()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "id_adsc,  	adscripcion";
$proto0["m_strFrom"] = "FROM cat_adscripcion";
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
	"m_strName" => "id_adsc",
	"m_strTable" => "cat_adscripcion",
	"m_srcTableName" => "cat_adscripcion"
));

$proto5["m_sql"] = "id_adsc";
$proto5["m_srcTableName"] = "cat_adscripcion";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "adscripcion",
	"m_strTable" => "cat_adscripcion",
	"m_srcTableName" => "cat_adscripcion"
));

$proto7["m_sql"] = "adscripcion";
$proto7["m_srcTableName"] = "cat_adscripcion";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto9=array();
$proto9["m_link"] = "SQLL_MAIN";
			$proto10=array();
$proto10["m_strName"] = "cat_adscripcion";
$proto10["m_srcTableName"] = "cat_adscripcion";
$proto10["m_columns"] = array();
$proto10["m_columns"][] = "id_adsc";
$proto10["m_columns"][] = "adscripcion";
$obj = new SQLTable($proto10);

$proto9["m_table"] = $obj;
$proto9["m_sql"] = "cat_adscripcion";
$proto9["m_alias"] = "";
$proto9["m_srcTableName"] = "cat_adscripcion";
$proto11=array();
$proto11["m_sql"] = "";
$proto11["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto11["m_column"]=$obj;
$proto11["m_contained"] = array();
$proto11["m_strCase"] = "";
$proto11["m_havingmode"] = false;
$proto11["m_inBrackets"] = false;
$proto11["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto11);

$proto9["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto9);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="cat_adscripcion";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_cat_adscripcion = createSqlQuery_cat_adscripcion();


	
		
	
$tdatacat_adscripcion[".sqlquery"] = $queryData_cat_adscripcion;

$tableEvents["cat_adscripcion"] = new eventsBase;
$tdatacat_adscripcion[".hasEvents"] = false;

?>