<?
$aMenuLinks = Array(
	Array(
		"CRM", 
		"/crm/", 
		Array(), 
		Array(), 
		"CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()" 
	),
    Array(
        "Планирование",
        "/planning/deallist/",
        Array(),
        Array(),
        "CBXFeatures::IsFeatureEnabled('crm') && CModule::IncludeModule('crm') && CCrmPerms::IsAccessEnabled()"
    )
);
?>