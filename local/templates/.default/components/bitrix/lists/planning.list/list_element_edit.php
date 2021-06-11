<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?><?
$APPLICATION->ShowViewContent('list_detail');

$this->SetViewTarget('pagetitle');
$APPLICATION->IncludeComponent(
    'itrack:planning.deal.menu',
    '',
    array(
        'PATH_TO_DEAL_LIST' => $arResult['PATH_TO_DEAL_LIST'],
        'PATH_TO_DEAL_SHOW' => $arResult['PATH_TO_DEAL_SHOW'],
        'PATH_TO_DEAL_EDIT' => $arResult['PATH_TO_DEAL_EDIT'],
        'PATH_TO_DEAL_FUNNEL' => $arResult['PATH_TO_DEAL_FUNNEL'],
        'PATH_TO_DEAL_IMPORT' => $arResult['PATH_TO_DEAL_IMPORT'],
        'PATH_TO_DEAL_RECUR' => $arResult['PATH_TO_DEAL_RECUR'],
        'PATH_TO_DEAL_RECUR_CATEGORY' => $arResult['PATH_TO_DEAL_RECUR_CATEGORY'],
        'IS_RECURRING' => $arResult['IS_RECURRING'],
        'ELEMENT_ID' => 0,
        'CATEGORY_ID' => $categoryID,
        'TYPE' => 'list',
        'DISABLE_IMPORT' => 'Y',
        'DISABLE_DEDUPE' => 'Y',
        'INTERNAL_FILTER' => [PLAN_UF => $arResult["VARIABLES"]["element_id"]],
        'GRID_ID_SUFFIX' => 'IPL'
    ),
    $component
);
$this->EndViewTarget();

$componentParams['AJAX_MODE'] = 'Y';
$componentParams['AJAX_OPTION_JUMP'] = 'N';
$componentParams['AJAX_OPTION_HISTORY'] = 'N';
$componentParams['GRID_ID_SUFFIX'] = 'IPL';
$componentParams['DISABLE_NAVIGATION_BAR'] = 'Y';
$componentParams['HIDE_FILTER'] = true;
$componentParams['INTERNAL_FILTER'] = [PLAN_UF => $arResult["VARIABLES"]["element_id"]];
$APPLICATION->IncludeComponent('itrack:planning.deal.list',
    '.default',
    $componentParams,
    false,
    array('HIDE_ICONS' => 'Y', 'ACTIVE_COMPONENT' => 'Y')
);

ob_start();
$APPLICATION->IncludeComponent("bitrix:lists.element.edit", "planning.element.edit", array(
    "IBLOCK_TYPE_ID" => $arParams["IBLOCK_TYPE_ID"],
    "IBLOCK_ID" => $arResult["VARIABLES"]["list_id"],
    "SECTION_ID" => $arResult["VARIABLES"]["section_id"],
    "ELEMENT_ID" => $arResult["VARIABLES"]["element_id"],
    "LISTS_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["lists"],
    "LIST_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["list"],
    "LIST_ELEMENT_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["list_element_edit"],
    "LIST_FILE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["list_file"],
    "BIZPROC_LOG_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["bizproc_log"],
    "BIZPROC_WORKFLOW_START_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["bizproc_workflow_start"],
    "BIZPROC_TASK_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["bizproc_task"],
    "BIZPROC_WORKFLOW_DELETE_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["bizproc_workflow_delete"],
    "CACHE_TYPE" => $arParams["CACHE_TYPE"],
    "CACHE_TIME" => $arParams["CACHE_TIME"],
),
    $component
);
$customHtml = ob_get_clean();
$APPLICATION->AddViewContent('list_detail', $customHtml, 0);
?>