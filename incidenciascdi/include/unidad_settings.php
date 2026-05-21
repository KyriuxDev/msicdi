<?php
require_once(getabspath("classes/cipherer.php"));




$tdataunidad = array();	
	$tdataunidad[".truncateText"] = true;
	$tdataunidad[".NumberOfChars"] = 80; 
	$tdataunidad[".ShortName"] = "unidad";
	$tdataunidad[".OwnerID"] = "";
	$tdataunidad[".OriginalTable"] = "unidad";

//	field labels
$fieldLabelsunidad = array();
$fieldToolTipsunidad = array();
$pageTitlesunidad = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelsunidad["Spanish"] = array();
	$fieldToolTipsunidad["Spanish"] = array();
	$pageTitlesunidad["Spanish"] = array();
	$fieldLabelsunidad["Spanish"]["Id_Unidad"] = "Id Unidad";
	$fieldToolTipsunidad["Spanish"]["Id Unidad"] = "";
	$fieldLabelsunidad["Spanish"]["Nombre"] = "Nombre";
	$fieldToolTipsunidad["Spanish"]["Nombre"] = "";
	if (count($fieldToolTipsunidad["Spanish"]))
		$tdataunidad[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsunidad[""] = array();
	$fieldToolTipsunidad[""] = array();
	$pageTitlesunidad[""] = array();
	if (count($fieldToolTipsunidad[""]))
		$tdataunidad[".isUseToolTips"] = true;
}
	
	
	$tdataunidad[".NCSearch"] = true;



$tdataunidad[".shortTableName"] = "unidad";
$tdataunidad[".nSecOptions"] = 0;
$tdataunidad[".recsPerRowList"] = 1;
$tdataunidad[".recsPerRowPrint"] = 1;
$tdataunidad[".mainTableOwnerID"] = "";
$tdataunidad[".moveNext"] = 1;
$tdataunidad[".entityType"] = 0;

$tdataunidad[".strOriginalTableName"] = "unidad";




$tdataunidad[".showAddInPopup"] = false;

$tdataunidad[".showEditInPopup"] = false;

$tdataunidad[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdataunidad[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdataunidad[".fieldsForRegister"] = array();

$tdataunidad[".listAjax"] = false;

	$tdataunidad[".audit"] = false;

	$tdataunidad[".locking"] = false;









$tdataunidad[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdataunidad[".searchSaving"] = false;
//

$tdataunidad[".showSearchPanel"] = true;
		$tdataunidad[".flexibleSearch"] = true;		

if (isMobile())
	$tdataunidad[".isUseAjaxSuggest"] = false;
else 
	$tdataunidad[".isUseAjaxSuggest"] = true;

$tdataunidad[".rowHighlite"] = true;



$tdataunidad[".addPageEvents"] = false;

// use timepicker for search panel
$tdataunidad[".isUseTimeForSearch"] = false;





$tdataunidad[".allSearchFields"] = array();
$tdataunidad[".filterFields"] = array();
$tdataunidad[".requiredSearchFields"] = array();



$tdataunidad[".googleLikeFields"] = array();
$tdataunidad[".googleLikeFields"][] = "Id Unidad";
$tdataunidad[".googleLikeFields"][] = "Nombre";


$tdataunidad[".advSearchFields"] = array();
$tdataunidad[".advSearchFields"][] = "Id Unidad";
$tdataunidad[".advSearchFields"][] = "Nombre";

$tdataunidad[".tableType"] = "list";

$tdataunidad[".printerPageOrientation"] = 0;
$tdataunidad[".nPrinterPageScale"] = 100;

$tdataunidad[".nPrinterSplitRecords"] = 40;

$tdataunidad[".nPrinterPDFSplitRecords"] = 40;



$tdataunidad[".geocodingEnabled"] = false;




	





// view page pdf

// print page pdf


$tdataunidad[".pageSize"] = 20;

$tdataunidad[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdataunidad[".strOrderBy"] = $tstrOrderBy;

$tdataunidad[".orderindexes"] = array();

$tdataunidad[".sqlHead"] = "SELECT `Id Unidad`,  Nombre";
$tdataunidad[".sqlFrom"] = "FROM unidad";
$tdataunidad[".sqlWhereExpr"] = "";
$tdataunidad[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdataunidad[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdataunidad[".arrGroupsPerPage"] = $arrGPP;

$tdataunidad[".highlightSearchResults"] = true;

$tableKeysunidad = array();
$tableKeysunidad[] = "Id Unidad";
$tdataunidad[".Keys"] = $tableKeysunidad;

$tdataunidad[".listFields"] = array();

$tdataunidad[".hideMobileList"] = array();


$tdataunidad[".viewFields"] = array();

$tdataunidad[".addFields"] = array();

$tdataunidad[".masterListFields"] = array();
$tdataunidad[".masterListFields"][] = "Id Unidad";
$tdataunidad[".masterListFields"][] = "Nombre";

$tdataunidad[".inlineAddFields"] = array();

$tdataunidad[".editFields"] = array();

$tdataunidad[".inlineEditFields"] = array();

$tdataunidad[".exportFields"] = array();

$tdataunidad[".importFields"] = array();

$tdataunidad[".printFields"] = array();

//	Id Unidad
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "Id Unidad";
	$fdata["GoodName"] = "Id_Unidad";
	$fdata["ownerTable"] = "unidad";
	$fdata["Label"] = GetFieldLabel("unidad","Id_Unidad"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Id Unidad"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "`Id Unidad`";
	
		
		
				
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
			$edata["EditParams"].= " maxlength=30";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	

	

	
	$tdataunidad["Id Unidad"] = $fdata;
//	Nombre
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "Nombre";
	$fdata["GoodName"] = "Nombre";
	$fdata["ownerTable"] = "unidad";
	$fdata["Label"] = GetFieldLabel("unidad","Nombre"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		
		
		
		
		
		
		
		
		
		$fdata["strField"] = "Nombre"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "Nombre";
	
		
		
				
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
			$edata["EditParams"].= " maxlength=255";
	
		$edata["controlWidth"] = 200;
	
//	Begin validation
	$edata["validateAs"] = array();
	$edata["validateAs"]["basicValidate"] = array();
	$edata["validateAs"]["customMessages"] = array();
		
		
	//	End validation
	
		
				
		
	
		
	$fdata["EditFormats"]["edit"] = $edata;
//	End Edit Formats
	
	
	$fdata["isSeparate"] = false;
	
	
	
	

	

	
	$tdataunidad["Nombre"] = $fdata;

	
$tables_data["unidad"]=&$tdataunidad;
$field_labels["unidad"] = &$fieldLabelsunidad;
$fieldToolTips["unidad"] = &$fieldToolTipsunidad;
$page_titles["unidad"] = &$pageTitlesunidad;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["unidad"] = array();
//	win10
	
	

		$dIndex = 0;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="win10";
		$detailsParam["dOriginalTable"] = "win10";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "win10";
	$detailsParam["dCaptionTable"] = GetTableCaption("win10");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
			$detailsParam["dispChildCount"] = 0;
		$detailsParam["hideChild"] = false;
			$detailsParam["previewOnList"] = "1";
	$detailsParam["previewOnAdd"] = 1;
	$detailsParam["previewOnEdit"] = 1;
	$detailsParam["previewOnView"] = 1;
			
	$detailsTablesData["unidad"][$dIndex] = $detailsParam;
	
			$detailsTablesData["unidad"][$dIndex]["previewOnAdd"] = false;
	
		$detailsTablesData["unidad"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["unidad"][$dIndex]["masterKeys"][]="Id Unidad";

				$detailsTablesData["unidad"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["unidad"][$dIndex]["detailKeys"][]="unidad";
//	reportesaio
	
	

		$dIndex = 1;
	$detailsParam = array();
	$detailsParam["dDataSourceTable"]="reportesaio";
		$detailsParam["dOriginalTable"] = "reportesaio";
				$detailsParam["dType"]=PAGE_LIST;
	$detailsParam["dShortTable"] = "reportesaio";
	$detailsParam["dCaptionTable"] = GetTableCaption("reportesaio");
	$detailsParam["masterKeys"] =array();
	$detailsParam["detailKeys"] =array();
			$detailsParam["dispChildCount"] = 0;
		$detailsParam["hideChild"] = false;
			$detailsParam["previewOnList"] = "1";
	$detailsParam["previewOnAdd"] = 1;
	$detailsParam["previewOnEdit"] = 1;
	$detailsParam["previewOnView"] = 1;
			
	$detailsTablesData["unidad"][$dIndex] = $detailsParam;
	
			$detailsTablesData["unidad"][$dIndex]["previewOnAdd"] = false;
	
		$detailsTablesData["unidad"][$dIndex]["masterKeys"] = array();

	$detailsTablesData["unidad"][$dIndex]["masterKeys"][]="Id Unidad";

				$detailsTablesData["unidad"][$dIndex]["detailKeys"] = array();

	$detailsTablesData["unidad"][$dIndex]["detailKeys"][]="unidad";
	
// tables which are master tables for current table (detail)
$masterTablesData["unidad"] = array();


// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_unidad()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "`Id Unidad`,  Nombre";
$proto0["m_strFrom"] = "FROM unidad";
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
	"m_strName" => "Id Unidad",
	"m_strTable" => "unidad",
	"m_srcTableName" => "unidad"
));

$proto5["m_sql"] = "`Id Unidad`";
$proto5["m_srcTableName"] = "unidad";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "Nombre",
	"m_strTable" => "unidad",
	"m_srcTableName" => "unidad"
));

$proto7["m_sql"] = "Nombre";
$proto7["m_srcTableName"] = "unidad";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto9=array();
$proto9["m_link"] = "SQLL_MAIN";
			$proto10=array();
$proto10["m_strName"] = "unidad";
$proto10["m_srcTableName"] = "unidad";
$proto10["m_columns"] = array();
$proto10["m_columns"][] = "Id Unidad";
$proto10["m_columns"][] = "Id Referencia";
$proto10["m_columns"][] = "Nombre";
$proto10["m_columns"][] = "Tipo";
$proto10["m_columns"][] = "Calle y número";
$proto10["m_columns"][] = "Colonia";
$proto10["m_columns"][] = "Municipio";
$proto10["m_columns"][] = "Código postal";
$proto10["m_columns"][] = "Latitud";
$proto10["m_columns"][] = "Longitud";
$proto10["m_columns"][] = "map";
$obj = new SQLTable($proto10);

$proto9["m_table"] = $obj;
$proto9["m_sql"] = "unidad";
$proto9["m_alias"] = "";
$proto9["m_srcTableName"] = "unidad";
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
$proto0["m_srcTableName"]="unidad";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_unidad = createSqlQuery_unidad();


	
		
	
$tdataunidad[".sqlquery"] = $queryData_unidad;

$tableEvents["unidad"] = new eventsBase;
$tdataunidad[".hasEvents"] = false;

?>