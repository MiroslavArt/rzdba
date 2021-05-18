<?php
//\Bitrix\Main\Diag\Debug::writeToFile($arResult, "result", "__miros.log");
use Itrack\Custom\Helpers\Utils;
global $USER;

$iblockid = $arResult['IBLOCK_ID'];
$elementid = $arResult['ELEMENT_ID'];
$eldata = Utils::getIblockElementByID($iblockid, $elementid);
$arResult['EXTRA_FIELDS']['CREATED_DATE']['NAME'] = 'Дата создания:';
$arResult['EXTRA_FIELDS']['CREATED_DATE']['VALUE'] = $eldata['DATE_CREATE'];
$rsUser = \CUser::GetByID($eldata['CREATED_BY']);
$arUser = $rsUser->Fetch();
$arResult['EXTRA_FIELDS']['CREATED_BY']['NAME'] = 'Создано:';
$arResult['EXTRA_FIELDS']['CREATED_BY']['VALUE'] = $arUser['NAME'].' '.$arUser['LAST_NAME'];
$arResult['EXTRA_FIELDS']['MODIFIED_DATE']['NAME'] = 'Дата изменения:';
$arResult['EXTRA_FIELDS']['MODIFIED_DATE']['VALUE'] = $eldata['TIMESTAMP_X'];
$rsUser = \CUser::GetByID($eldata['MODIFIED_BY']);
$arUser = $rsUser->Fetch();
$arResult['EXTRA_FIELDS']['MODIFIED_BY']['NAME'] = 'Изменено:';
$arResult['EXTRA_FIELDS']['MODIFIED_BY']['VALUE'] = $arUser['NAME'].' '.$arUser['LAST_NAME'];


