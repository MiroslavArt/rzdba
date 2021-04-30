<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
IncludeModuleLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/intranet/public/docs/shared/index.php");
$APPLICATION->SetTitle(GetMessage("DOCS_TITLE"));
$APPLICATION->AddChainItem($APPLICATION->GetTitle(), "/docs/shared/");

$commonStorageId = 77;
if (\Bitrix\Main\Loader::includeModule('disk'))
{
    $commonStorage = \Bitrix\Disk\Driver::getInstance()->getStorageByCommonId('shared_files_s1');
    $commonStorageId = $commonStorage? $commonStorage->getId() : $commonStorageId;
}
?>
<?$APPLICATION->IncludeComponent("bitrix:disk.common", ".default", Array(
        "SEF_MODE" => "Y",
        "SEF_FOLDER" => "/docs/shared",
        "STORAGE_ID" => $commonStorageId,
    )
);?>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>