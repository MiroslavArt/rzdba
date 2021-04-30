<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Все документы");
?><?$APPLICATION->IncludeComponent(
	"bitrix:webdav.aggregator",
	"",
	Array(
		"SEF_MODE" => "Y",
		"IBLOCK_TYPE" => "library",
		"IBLOCK_OTHER_IDS" => array("7","9","11"),
		"IBLOCK_GROUP_ID" => "7",
		"IBLOCK_USER_ID" => "9",
		"CACHE_TYPE" => "A",
		"CACHE_TIME" => "3600",
		"SEF_FOLDER" => "/docs/all/",
		"SEF_URL_TEMPLATES" => Array(
			"USER_FILE_PATH" => "company/personal/user/#USER_ID#/files/lib/#PATH#",
			"GROUP_FILE_PATH" => "workgroups/group/#GROUP_ID#/files/#PATH#"
		),
		"VARIABLE_ALIASES" => Array(
			"USER_FILE_PATH" => Array(),
			"GROUP_FILE_PATH" => Array(),
		)
	)
);?> 
<br />
 
<br />
 
<div style="background-color: rgb(253, 255, 201); border: 1px solid rgb(237, 239, 185); font-size: 0.95em; padding: 0pt 15px;"> 
  <p>Здесь показаны ссылки на все библиотеки документов, доступ к которым имеет сотрудник компании: личные документы пользователя; персональные документы других сотрудников; страницы раздела &laquo;Документы&raquo; и документы групп интранета и экстранета.</p>
  <p>Чтобы получить доступ сразу ко всем доступным вам библиотекам документов корпоративного портала и работать с ними, как с обычными папками и документами, подключите эту страницу как сетевой диск. </p>
</div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
