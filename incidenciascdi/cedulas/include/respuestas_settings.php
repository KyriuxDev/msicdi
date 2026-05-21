<?php
require_once(getabspath("classes/cipherer.php"));




$tdatarespuestas = array();	
	$tdatarespuestas[".truncateText"] = true;
	$tdatarespuestas[".NumberOfChars"] = 80; 
	$tdatarespuestas[".ShortName"] = "respuestas";
	$tdatarespuestas[".OwnerID"] = "";
	$tdatarespuestas[".OriginalTable"] = "respuestas";

//	field labels
$fieldLabelsrespuestas = array();
$fieldToolTipsrespuestas = array();
$pageTitlesrespuestas = array();

if(mlang_getcurrentlang()=="Spanish")
{
	$fieldLabelsrespuestas["Spanish"] = array();
	$fieldToolTipsrespuestas["Spanish"] = array();
	$pageTitlesrespuestas["Spanish"] = array();
	$fieldLabelsrespuestas["Spanish"]["serie_pc"] = "Serie Pc";
	$fieldToolTipsrespuestas["Spanish"]["serie_pc"] = "";
	$fieldLabelsrespuestas["Spanish"]["id_criterio"] = "Id Criterio";
	$fieldToolTipsrespuestas["Spanish"]["id_criterio"] = "";
	$fieldLabelsrespuestas["Spanish"]["fecha"] = "Fecha";
	$fieldToolTipsrespuestas["Spanish"]["fecha"] = "";
	$fieldLabelsrespuestas["Spanish"]["cumplimiento"] = "Cumplimiento";
	$fieldToolTipsrespuestas["Spanish"]["cumplimiento"] = "";
	$fieldLabelsrespuestas["Spanish"]["recomendacion"] = "Recomendacion";
	$fieldToolTipsrespuestas["Spanish"]["recomendacion"] = "";
	if (count($fieldToolTipsrespuestas["Spanish"]))
		$tdatarespuestas[".isUseToolTips"] = true;
}
if(mlang_getcurrentlang()=="")
{
	$fieldLabelsrespuestas[""] = array();
	$fieldToolTipsrespuestas[""] = array();
	$pageTitlesrespuestas[""] = array();
	if (count($fieldToolTipsrespuestas[""]))
		$tdatarespuestas[".isUseToolTips"] = true;
}
	
	
	$tdatarespuestas[".NCSearch"] = true;



$tdatarespuestas[".shortTableName"] = "respuestas";
$tdatarespuestas[".nSecOptions"] = 0;
$tdatarespuestas[".recsPerRowList"] = 1;
$tdatarespuestas[".recsPerRowPrint"] = 1;
$tdatarespuestas[".mainTableOwnerID"] = "";
$tdatarespuestas[".moveNext"] = 1;
$tdatarespuestas[".entityType"] = 0;

$tdatarespuestas[".strOriginalTableName"] = "respuestas";




$tdatarespuestas[".showAddInPopup"] = false;

$tdatarespuestas[".showEditInPopup"] = false;

$tdatarespuestas[".showViewInPopup"] = false;

//page's base css files names
$popupPagesLayoutNames = array();
$tdatarespuestas[".popupPagesLayoutNames"] = $popupPagesLayoutNames;


$tdatarespuestas[".fieldsForRegister"] = array();

$tdatarespuestas[".listAjax"] = false;

	$tdatarespuestas[".audit"] = false;

	$tdatarespuestas[".locking"] = false;


$tdatarespuestas[".add"] = true;
$tdatarespuestas[".afterAddAction"] = 1;
$tdatarespuestas[".closePopupAfterAdd"] = 1;
$tdatarespuestas[".afterAddActionDetTable"] = "";

$tdatarespuestas[".list"] = true;

$tdatarespuestas[".inlineAdd"] = true;

$tdatarespuestas[".import"] = true;

$tdatarespuestas[".exportTo"] = true;

$tdatarespuestas[".printFriendly"] = true;


$tdatarespuestas[".showSimpleSearchOptions"] = false;

// search Saving settings
$tdatarespuestas[".searchSaving"] = false;
//

$tdatarespuestas[".showSearchPanel"] = true;
		$tdatarespuestas[".flexibleSearch"] = true;		

if (isMobile())
	$tdatarespuestas[".isUseAjaxSuggest"] = false;
else 
	$tdatarespuestas[".isUseAjaxSuggest"] = true;

$tdatarespuestas[".rowHighlite"] = true;



$tdatarespuestas[".addPageEvents"] = false;

// use timepicker for search panel
$tdatarespuestas[".isUseTimeForSearch"] = false;





$tdatarespuestas[".allSearchFields"] = array();
$tdatarespuestas[".filterFields"] = array();
$tdatarespuestas[".requiredSearchFields"] = array();

$tdatarespuestas[".allSearchFields"][] = "serie_pc";
	$tdatarespuestas[".allSearchFields"][] = "id_criterio";
	$tdatarespuestas[".allSearchFields"][] = "fecha";
	$tdatarespuestas[".allSearchFields"][] = "cumplimiento";
	$tdatarespuestas[".allSearchFields"][] = "recomendacion";
	

$tdatarespuestas[".googleLikeFields"] = array();
$tdatarespuestas[".googleLikeFields"][] = "serie_pc";
$tdatarespuestas[".googleLikeFields"][] = "id_criterio";
$tdatarespuestas[".googleLikeFields"][] = "fecha";
$tdatarespuestas[".googleLikeFields"][] = "cumplimiento";
$tdatarespuestas[".googleLikeFields"][] = "recomendacion";


$tdatarespuestas[".advSearchFields"] = array();
$tdatarespuestas[".advSearchFields"][] = "serie_pc";
$tdatarespuestas[".advSearchFields"][] = "id_criterio";
$tdatarespuestas[".advSearchFields"][] = "fecha";
$tdatarespuestas[".advSearchFields"][] = "cumplimiento";
$tdatarespuestas[".advSearchFields"][] = "recomendacion";

$tdatarespuestas[".tableType"] = "list";

$tdatarespuestas[".printerPageOrientation"] = 0;
$tdatarespuestas[".nPrinterPageScale"] = 100;

$tdatarespuestas[".nPrinterSplitRecords"] = 40;

$tdatarespuestas[".nPrinterPDFSplitRecords"] = 40;



$tdatarespuestas[".geocodingEnabled"] = false;




	





// view page pdf
$tdatarespuestas[".isViewPagePDF"] = true;
$tdatarespuestas[".nViewPagePDFScale"] = 100;

// print page pdf
$tdatarespuestas[".isPrinterPagePDF"] = true;
$tdatarespuestas[".nPrinterPagePDFScale"] = 100;


$tdatarespuestas[".pageSize"] = 20;

$tdatarespuestas[".warnLeavingPages"] = true;



$tstrOrderBy = "";
if(strlen($tstrOrderBy) && strtolower(substr($tstrOrderBy,0,8))!="order by")
	$tstrOrderBy = "order by ".$tstrOrderBy;
$tdatarespuestas[".strOrderBy"] = $tstrOrderBy;

$tdatarespuestas[".orderindexes"] = array();

$tdatarespuestas[".sqlHead"] = "SELECT serie_pc,  	id_criterio,  	fecha,  	cumplimiento,  	recomendacion";
$tdatarespuestas[".sqlFrom"] = "FROM respuestas";
$tdatarespuestas[".sqlWhereExpr"] = "";
$tdatarespuestas[".sqlTail"] = "";









//fill array of records per page for list and report without group fields
$arrRPP = array();
$arrRPP[] = 10;
$arrRPP[] = 20;
$arrRPP[] = 30;
$arrRPP[] = 50;
$arrRPP[] = 100;
$arrRPP[] = 500;
$arrRPP[] = -1;
$tdatarespuestas[".arrRecsPerPage"] = $arrRPP;

//fill array of groups per page for report with group fields
$arrGPP = array();
$arrGPP[] = 1;
$arrGPP[] = 3;
$arrGPP[] = 5;
$arrGPP[] = 10;
$arrGPP[] = 50;
$arrGPP[] = 100;
$arrGPP[] = -1;
$tdatarespuestas[".arrGroupsPerPage"] = $arrGPP;

$tdatarespuestas[".highlightSearchResults"] = true;

$tableKeysrespuestas = array();
$tdatarespuestas[".Keys"] = $tableKeysrespuestas;

$tdatarespuestas[".listFields"] = array();
$tdatarespuestas[".listFields"][] = "serie_pc";
$tdatarespuestas[".listFields"][] = "id_criterio";
$tdatarespuestas[".listFields"][] = "fecha";
$tdatarespuestas[".listFields"][] = "cumplimiento";
$tdatarespuestas[".listFields"][] = "recomendacion";

$tdatarespuestas[".hideMobileList"] = array();


$tdatarespuestas[".viewFields"] = array();

$tdatarespuestas[".addFields"] = array();
$tdatarespuestas[".addFields"][] = "serie_pc";
$tdatarespuestas[".addFields"][] = "id_criterio";
$tdatarespuestas[".addFields"][] = "fecha";
$tdatarespuestas[".addFields"][] = "cumplimiento";
$tdatarespuestas[".addFields"][] = "recomendacion";

$tdatarespuestas[".masterListFields"] = array();
$tdatarespuestas[".masterListFields"][] = "serie_pc";
$tdatarespuestas[".masterListFields"][] = "id_criterio";
$tdatarespuestas[".masterListFields"][] = "fecha";
$tdatarespuestas[".masterListFields"][] = "cumplimiento";
$tdatarespuestas[".masterListFields"][] = "recomendacion";

$tdatarespuestas[".inlineAddFields"] = array();
$tdatarespuestas[".inlineAddFields"][] = "serie_pc";
$tdatarespuestas[".inlineAddFields"][] = "id_criterio";
$tdatarespuestas[".inlineAddFields"][] = "fecha";
$tdatarespuestas[".inlineAddFields"][] = "cumplimiento";
$tdatarespuestas[".inlineAddFields"][] = "recomendacion";

$tdatarespuestas[".editFields"] = array();

$tdatarespuestas[".inlineEditFields"] = array();

$tdatarespuestas[".exportFields"] = array();
$tdatarespuestas[".exportFields"][] = "serie_pc";
$tdatarespuestas[".exportFields"][] = "id_criterio";
$tdatarespuestas[".exportFields"][] = "fecha";
$tdatarespuestas[".exportFields"][] = "cumplimiento";
$tdatarespuestas[".exportFields"][] = "recomendacion";

$tdatarespuestas[".importFields"] = array();
$tdatarespuestas[".importFields"][] = "serie_pc";
$tdatarespuestas[".importFields"][] = "id_criterio";
$tdatarespuestas[".importFields"][] = "fecha";
$tdatarespuestas[".importFields"][] = "cumplimiento";
$tdatarespuestas[".importFields"][] = "recomendacion";

$tdatarespuestas[".printFields"] = array();
$tdatarespuestas[".printFields"][] = "serie_pc";
$tdatarespuestas[".printFields"][] = "id_criterio";
$tdatarespuestas[".printFields"][] = "fecha";
$tdatarespuestas[".printFields"][] = "cumplimiento";
$tdatarespuestas[".printFields"][] = "recomendacion";

//	serie_pc
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 1;
	$fdata["strName"] = "serie_pc";
	$fdata["GoodName"] = "serie_pc";
	$fdata["ownerTable"] = "respuestas";
	$fdata["Label"] = GetFieldLabel("respuestas","serie_pc"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
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

	

	
	$tdatarespuestas["serie_pc"] = $fdata;
//	id_criterio
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 2;
	$fdata["strName"] = "id_criterio";
	$fdata["GoodName"] = "id_criterio";
	$fdata["ownerTable"] = "respuestas";
	$fdata["Label"] = GetFieldLabel("respuestas","id_criterio"); 
	$fdata["FieldType"] = 3;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
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

	

	
	$tdatarespuestas["id_criterio"] = $fdata;
//	fecha
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 3;
	$fdata["strName"] = "fecha";
	$fdata["GoodName"] = "fecha";
	$fdata["ownerTable"] = "respuestas";
	$fdata["Label"] = GetFieldLabel("respuestas","fecha"); 
	$fdata["FieldType"] = 135;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
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
	
		$edata["ShowTime"] = true; 
		
	
	


		$edata["IsRequired"] = true; 
	
		
		
		
			$edata["acceptFileTypes"] = ".+$";
	
		$edata["maxNumberOfFiles"] = 1;
	
		
		
		$edata["DateEditType"] = 13; 
	$edata["InitialYearFactor"] = 100; 
	$edata["LastYearFactor"] = 10; 
	
		
		
		
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

	

	
	$tdatarespuestas["fecha"] = $fdata;
//	cumplimiento
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 4;
	$fdata["strName"] = "cumplimiento";
	$fdata["GoodName"] = "cumplimiento";
	$fdata["ownerTable"] = "respuestas";
	$fdata["Label"] = GetFieldLabel("respuestas","cumplimiento"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "cumplimiento"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "cumplimiento";
	
		
		
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
			$edata["EditParams"].= " maxlength=2";
	
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

	

	
	$tdatarespuestas["cumplimiento"] = $fdata;
//	recomendacion
//	Custom field settings
	$fdata = array();
	$fdata["Index"] = 5;
	$fdata["strName"] = "recomendacion";
	$fdata["GoodName"] = "recomendacion";
	$fdata["ownerTable"] = "respuestas";
	$fdata["Label"] = GetFieldLabel("respuestas","recomendacion"); 
	$fdata["FieldType"] = 200;
	
		
		
		
				
		$fdata["bListPage"] = true; 
	
		$fdata["bAddPage"] = true; 
	
		$fdata["bInlineAdd"] = true; 
	
		
		
		
		$fdata["bAdvancedSearch"] = true; 
	
		$fdata["bPrinterPage"] = true; 
	
		$fdata["bExportPage"] = true; 
	
		$fdata["strField"] = "recomendacion"; 
	
		$fdata["isSQLExpression"] = true;
	$fdata["FullName"] = "recomendacion";
	
		
		
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
			$edata["EditParams"].= " maxlength=150";
	
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

	

	
	$tdatarespuestas["recomendacion"] = $fdata;

	
$tables_data["respuestas"]=&$tdatarespuestas;
$field_labels["respuestas"] = &$fieldLabelsrespuestas;
$fieldToolTips["respuestas"] = &$fieldToolTipsrespuestas;
$page_titles["respuestas"] = &$pageTitlesrespuestas;

// -----------------start  prepare master-details data arrays ------------------------------//
// tables which are detail tables for current table (master)
$detailsTablesData["respuestas"] = array();
	
// tables which are master tables for current table (detail)
$masterTablesData["respuestas"] = array();


	
				$strOriginalDetailsTable="cat_criterios";
	$masterParams = array();
	$masterParams["mDataSourceTable"]="cat_criterios";
	$masterParams["mOriginalTable"]= $strOriginalDetailsTable;
	$masterParams["mShortTable"]= "cat_criterios";
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
					$masterTablesData["respuestas"][0] = $masterParams;	
				$masterTablesData["respuestas"][0]["masterKeys"] = array();
	$masterTablesData["respuestas"][0]["masterKeys"][]="id_criterio";
				$masterTablesData["respuestas"][0]["detailKeys"] = array();
	$masterTablesData["respuestas"][0]["detailKeys"][]="id_criterio";
		
// -----------------end  prepare master-details data arrays ------------------------------//

require_once(getabspath("classes/sql.php"));










function createSqlQuery_respuestas()
{
$proto0=array();
$proto0["m_strHead"] = "SELECT";
$proto0["m_strFieldList"] = "serie_pc,  	id_criterio,  	fecha,  	cumplimiento,  	recomendacion";
$proto0["m_strFrom"] = "FROM respuestas";
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
	"m_strName" => "serie_pc",
	"m_strTable" => "respuestas",
	"m_srcTableName" => "respuestas"
));

$proto5["m_sql"] = "serie_pc";
$proto5["m_srcTableName"] = "respuestas";
$proto5["m_expr"]=$obj;
$proto5["m_alias"] = "";
$obj = new SQLFieldListItem($proto5);

$proto0["m_fieldlist"][]=$obj;
						$proto7=array();
			$obj = new SQLField(array(
	"m_strName" => "id_criterio",
	"m_strTable" => "respuestas",
	"m_srcTableName" => "respuestas"
));

$proto7["m_sql"] = "id_criterio";
$proto7["m_srcTableName"] = "respuestas";
$proto7["m_expr"]=$obj;
$proto7["m_alias"] = "";
$obj = new SQLFieldListItem($proto7);

$proto0["m_fieldlist"][]=$obj;
						$proto9=array();
			$obj = new SQLField(array(
	"m_strName" => "fecha",
	"m_strTable" => "respuestas",
	"m_srcTableName" => "respuestas"
));

$proto9["m_sql"] = "fecha";
$proto9["m_srcTableName"] = "respuestas";
$proto9["m_expr"]=$obj;
$proto9["m_alias"] = "";
$obj = new SQLFieldListItem($proto9);

$proto0["m_fieldlist"][]=$obj;
						$proto11=array();
			$obj = new SQLField(array(
	"m_strName" => "cumplimiento",
	"m_strTable" => "respuestas",
	"m_srcTableName" => "respuestas"
));

$proto11["m_sql"] = "cumplimiento";
$proto11["m_srcTableName"] = "respuestas";
$proto11["m_expr"]=$obj;
$proto11["m_alias"] = "";
$obj = new SQLFieldListItem($proto11);

$proto0["m_fieldlist"][]=$obj;
						$proto13=array();
			$obj = new SQLField(array(
	"m_strName" => "recomendacion",
	"m_strTable" => "respuestas",
	"m_srcTableName" => "respuestas"
));

$proto13["m_sql"] = "recomendacion";
$proto13["m_srcTableName"] = "respuestas";
$proto13["m_expr"]=$obj;
$proto13["m_alias"] = "";
$obj = new SQLFieldListItem($proto13);

$proto0["m_fieldlist"][]=$obj;
$proto0["m_fromlist"] = array();
												$proto15=array();
$proto15["m_link"] = "SQLL_MAIN";
			$proto16=array();
$proto16["m_strName"] = "respuestas";
$proto16["m_srcTableName"] = "respuestas";
$proto16["m_columns"] = array();
$proto16["m_columns"][] = "serie_pc";
$proto16["m_columns"][] = "id_criterio";
$proto16["m_columns"][] = "fecha";
$proto16["m_columns"][] = "cumplimiento";
$proto16["m_columns"][] = "recomendacion";
$obj = new SQLTable($proto16);

$proto15["m_table"] = $obj;
$proto15["m_sql"] = "respuestas";
$proto15["m_alias"] = "";
$proto15["m_srcTableName"] = "respuestas";
$proto17=array();
$proto17["m_sql"] = "";
$proto17["m_uniontype"] = "SQLL_UNKNOWN";
	$obj = new SQLNonParsed(array(
	"m_sql" => ""
));

$proto17["m_column"]=$obj;
$proto17["m_contained"] = array();
$proto17["m_strCase"] = "";
$proto17["m_havingmode"] = false;
$proto17["m_inBrackets"] = false;
$proto17["m_useAlias"] = false;
$obj = new SQLLogicalExpr($proto17);

$proto15["m_joinon"] = $obj;
$obj = new SQLFromListItem($proto15);

$proto0["m_fromlist"][]=$obj;
$proto0["m_groupby"] = array();
$proto0["m_orderby"] = array();
$proto0["m_srcTableName"]="respuestas";		
$obj = new SQLQuery($proto0);

	return $obj;
}
$queryData_respuestas = createSqlQuery_respuestas();


	
					
	
$tdatarespuestas[".sqlquery"] = $queryData_respuestas;

$tableEvents["respuestas"] = new eventsBase;
$tdatarespuestas[".hasEvents"] = false;

?>