<?
$aMenuLinks = Array(
	Array(
		"Список сделок", 
		"/planning/deallist/index.php", 
		Array(), 
		Array(),
        "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"
	),
	Array(
		"Список планов", 
		"/planning/planlist/index.php", 
		Array(), 
		Array(),
        "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"
	),
	Array(
		"Подразделы планов", 
		"/planning/plansubsection/index.php", 
		Array(), 
		Array(),
        "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"
	),
	Array(
		"Детальные планы", 
		"/planning/plandetail/index.php", 
		Array(), 
		Array(),
        "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"
	)
);
?>