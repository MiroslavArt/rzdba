<?php
if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED!==true) die();

$categoryID = isset($arResult['VARIABLES']['category_id']) ? (int)$arResult['VARIABLES']['category_id'] : -1;

$isSlider = ($_REQUEST['IFRAME'] == 'Y' && $_REQUEST['IFRAME_TYPE'] == 'SIDE_SLIDER');

if(!Bitrix\Crm\Integration\Bitrix24Manager::isAccessEnabled(CCrmOwnerType::Deal))
{
	$APPLICATION->IncludeComponent('bitrix:bitrix24.business.tools.info', '', array());
}
else
{
	$isBitrix24Template = SITE_TEMPLATE_ID === 'bitrix24';
	if($isBitrix24Template)
	{
		$this->SetViewTarget('below_pagetitle', 0);
	}

	if ($arResult['IS_RECURRING'] !== 'Y')
	{
	}

	if($isBitrix24Template)
	{
		$this->EndViewTarget();
	}

	$APPLICATION->IncludeComponent(
		'bitrix:ui.sidepanel.wrapper',
		'',
		[
            'POPUP_COMPONENT_NAME' => 'itrack:planning.deal.list',
            'POPUP_COMPONENT_TEMPLATE_NAME' => '',
			'POPUP_COMPONENT_PARAMS' => [
				'DEAL_COUNT' => '2000',
				'IS_RECURRING' => $arResult['IS_RECURRING'],
				'PATH_TO_DEAL_RECUR_SHOW' => $arResult['PATH_TO_DEAL_RECUR_SHOW'],
				'PATH_TO_DEAL_RECUR' => $arResult['PATH_TO_DEAL_RECUR'],
				'PATH_TO_DEAL_RECUR_EDIT' => $arResult['PATH_TO_DEAL_RECUR_EDIT'],
				'PATH_TO_DEAL_LIST' => $arResult['PATH_TO_DEAL_LIST'],
				'PATH_TO_DEAL_SHOW' => $arResult['PATH_TO_DEAL_SHOW'],
				'PATH_TO_DEAL_EDIT' => $arResult['PATH_TO_DEAL_EDIT'],
				'PATH_TO_DEAL_DETAILS' => $arResult['PATH_TO_DEAL_DETAILS'],
				'PATH_TO_DEAL_WIDGET' => $arResult['PATH_TO_DEAL_WIDGET'],
				'PATH_TO_DEAL_KANBAN' => $arResult['PATH_TO_DEAL_KANBAN'],
				'PATH_TO_DEAL_CALENDAR' => $arResult['PATH_TO_DEAL_CALENDAR'],
				'PATH_TO_DEAL_CATEGORY' => $arResult['PATH_TO_DEAL_CATEGORY'],
				'PATH_TO_DEAL_MERGE' => $arResult['PATH_TO_DEAL_MERGE'],
				'PATH_TO_DEAL_RECUR_CATEGORY' => $arResult['PATH_TO_DEAL_RECUR_CATEGORY'],
				'PATH_TO_DEAL_WIDGETCATEGORY' => $arResult['PATH_TO_DEAL_WIDGETCATEGORY'],
				'PATH_TO_DEAL_KANBANCATEGORY' => $arResult['PATH_TO_DEAL_KANBANCATEGORY'],
				'PATH_TO_DEAL_CALENDARCATEGORY' => $arResult['PATH_TO_DEAL_CALENDARCATEGORY'],
				'NAME_TEMPLATE' => $arParams['NAME_TEMPLATE'],
				'NAVIGATION_CONTEXT_ID' => $arResult['NAVIGATION_CONTEXT_ID'],
				'GRID_ID_SUFFIX' => 'PL', //$categoryID >= 0 ? "C_{$categoryID}" : '',
				'DISABLE_NAVIGATION_BAR' => 'Y',
				'CATEGORY_ID' => $categoryID,
                $arParams['CALENDAR_MODE_LIST'] => true
                //'INTERNAL_FILTER' => ['!UF_CRM_1620289503' => false]
			]
		]
	);
    $APPLICATION->SetTitle("Список сделок");
}
?>