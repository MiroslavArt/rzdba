<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->IncludeComponent("bitrix:sender.blacklist", ".default", array(
	'SEF_FOLDER' => '/extranet/marketing/blacklist/',
	'SEF_MODE' => 'Y',
));

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");