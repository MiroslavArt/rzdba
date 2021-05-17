<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Список планов");
?>
<?$APPLICATION->IncludeComponent("bitrix:lists", "planning.list", array(
    "IBLOCK_TYPE_ID" => "lists",
    "SEF_MODE" => "Y",
    "SEF_FOLDER" => "/planning/planlist/",
    "CACHE_TYPE" => "A",
    "CACHE_TIME" => "36000000",
    "SEF_URL_TEMPLATES" => array(
        "lists" => "",
        "list" => "#list_id#/view/#section_id#/",
        "list_sections" => "#list_id#/edit/#section_id#/",
        "list_edit" => "#list_id#/edit/",
        "list_fields" => "#list_id#/fields/",
        "list_field_edit" => "#list_id#/field/#field_id#/",
    )
),
    false
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>