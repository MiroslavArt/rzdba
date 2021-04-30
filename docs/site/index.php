<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/docs/shared/index.php");
$APPLICATION->SetTitle("Site");
$APPLICATION->AddChainItem($APPLICATION->GetTitle(), "/docs/site/");
?><?$APPLICATION->IncludeComponent(
	"bitrix:disk.common",
	".default",
	Array(
		"SEF_FOLDER" => "/docs/site/",
		"SEF_MODE" => "Y",
		"STORAGE_ID" => "171"
	)
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>