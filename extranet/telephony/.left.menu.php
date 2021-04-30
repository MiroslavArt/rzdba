<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/telephony/.left.menu.php");
if(CModule::IncludeModule('voximplant'))
{
	$aMenuLinks = Array(
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_CONNECT"),
			"/extranet/telephony/index.php",
			Array(),
			Array("menu_item_id"=>"menu_telephony_start"),
			'Bitrix\Voximplant\Security\Helper::isMainMenuEnabled()'
		),
		Array(
			GetMessage("SERVICES_MENU_TELEPHONY_DETAIL"),
			"/extranet/telephony/detail.php",
			Array(),
			Array("menu_item_id"=>"menu_telephony_detail"),
			'Bitrix\Voximplant\Security\Helper::isBalanceMenuEnabled()'
		),
	);

	if (CModule::IncludeModule('report'))
	{
		\Bitrix\Main\UI\Extension::load('report.js.analytics');
		$aMenuLinks[] = Array(
			GetMessage("SERVICES_MENU_TELEPHONY_ANALYTICS"),
			"/extranet/report/telephony/?analyticBoardKey=telephony_calls_dynamics",
			Array(),
			Array("menu_item_id" => "menu_telephony_reports"),
			""
		);
	}
}
?>