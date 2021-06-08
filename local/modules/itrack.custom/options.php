<?php

$MODULE_ID = 'itrack.custom';

use Bitrix\Main\Config\Option;
use Bitrix\Main\Localization\Loc;
use Bitrix\Main\Application;
use Bitrix\Main\Loader;

$app = Application::getInstance();
$context = $app->getContext();
$request = $context->getRequest();
Loc::loadMessages($context->getServer()->getDocumentRoot()."/bitrix/modules/main/options.php");
Loc::loadMessages(__FILE__);

global $USER;
if (!$USER->CanDoOperation($MODULE_ID . '_settings')) {
    $APPLICATION->AuthForm(Loc::getMessage("ACCESS_DENIED"));
}

if(!Loader::includeModule('iblock')) {
    ShowError(Loc::GetMessage($MODULE_ID."_MODULE_iblock_NOT_INSTALLED"));
    return;
}

$arIblocks = [];
$dbIblock = \Bitrix\Iblock\IblockTable::query()
    ->setSelect(['ID','NAME'])
    ->exec();
while($arIBlock = $dbIblock->fetch()) {
    $arIblocks[$arIBlock['ID']] = '['.$arIBlock['ID'].']: '.$arIBlock['NAME'];
}

$arAllOptions = [
    'main' => [
        [
            'main_IBPL_TYPE',
            Loc::getMessage($MODULE_ID.'_IBPL_TYPE'),
            Option::get($MODULE_ID, '_IBPL_TYPE'),
            ['text']
        ],
        [
            'main_IBPL_ROUTE',
            Loc::getMessage($MODULE_ID.'_IBPL_ROUTE'),
            Option::get($MODULE_ID, '_IBPL_ROUTE'),
            ['text']
        ],
        [
            'main_IBPL_PLAN',
            Loc::getMessage($MODULE_ID.'_IBPL_PLAN'),
            Option::get($MODULE_ID, '_IBPL_PLAN'),
            ['text']
        ],
        [
            'main_IBPL_PLAN_code',
            Loc::getMessage($MODULE_ID.'_IBPL_PLAN_code'),
            Option::get($MODULE_ID, '_IBPL_PLAN_code'),
            ['text']
        ],
        [
            'main_IBPL_SOST',
            Loc::getMessage($MODULE_ID.'_IBPL_SOST'),
            Option::get($MODULE_ID, '_IBPL_SOST'),
            ['text']
        ],
        [
            'main_IBPL_ZAKR',
            Loc::getMessage($MODULE_ID.'_IBPL_ZAKR'),
            Option::get($MODULE_ID, '_IBPL_ZAKR'),
            ['text']
        ],
        [
            'main_IBPL_LOGSECT',
            Loc::getMessage($MODULE_ID.'_IBPL_LOGSECT'),
            Option::get($MODULE_ID, '_IBPL_LOGSECT'),
            ['text']
        ],
        [
            'main_DEPARTURE_UF',
            Loc::getMessage($MODULE_ID.'_DEPARTURE_UF'),
            Option::get($MODULE_ID, '_DEPARTURE_UF'),
            ['text']
        ],
        [
            'main_ARRIVAL_UF',
            Loc::getMessage($MODULE_ID.'_ARRIVAL_UF'),
            Option::get($MODULE_ID, '_ARRIVAL_UF'),
            ['text']
        ],
        [
            'main_ROUTE_UF',
            Loc::getMessage($MODULE_ID.'_ROUTE_UF'),
            Option::get($MODULE_ID, '_ROUTE_UF'),
            ['text']
        ],
        [
            'main_PLAN_UF',
            Loc::getMessage($MODULE_ID.'_PLAN_UF'),
            Option::get($MODULE_ID, '_PLAN_UF'),
            ['text']
        ],
        [
            'main_DFE_UF',
            Loc::getMessage($MODULE_ID.'_DFE_UF'),
            Option::get($MODULE_ID, '_DFE_UF'),
            ['text']
        ],
        [
            'main_STAT_UF',
            Loc::getMessage($MODULE_ID.'_STAT_UF'),
            Option::get($MODULE_ID, '_STAT_UF'),
            ['text']
        ],
        [
            'main_APP_STAT',
            Loc::getMessage($MODULE_ID.'_APP_STAT'),
            Option::get($MODULE_ID, '_APP_STAT'),
            ['text']
        ],
        [
            'main_NO_PLAN_VAL',
            Loc::getMessage($MODULE_ID.'_NO_PLAN_VAL'),
            Option::get($MODULE_ID, '_NO_PLAN_VAL'),
            ['text']
        ],
        [
            'main_NO_PLAN_VAL_class',
            Loc::getMessage($MODULE_ID.'_NO_PLAN_VAL_class'),
            Option::get($MODULE_ID, '_NO_PLAN_VAL_class'),
            ['text']
        ],
        [
            'main_PROB',
            Loc::getMessage($MODULE_ID.'_PROB'),
            Option::get($MODULE_ID, '_PROB'),
            ['text']
        ],
        [
            'main_PROB_1_VAL',
            Loc::getMessage($MODULE_ID.'_PROB_1_VAL'),
            Option::get($MODULE_ID, '_PROB_1_VAL'),
            ['text']
        ],
        [
            'main_PROB_1_class',
            Loc::getMessage($MODULE_ID.'_PROB_1_class'),
            Option::get($MODULE_ID, '_PROB_1_class'),
            ['text']
        ],
        [
            'main_PROB_2_VAL',
            Loc::getMessage($MODULE_ID.'_PROB_2_VAL'),
            Option::get($MODULE_ID, '_PROB_2_VAL'),
            ['text']
        ],
        [
            'main_PROB_2_class',
            Loc::getMessage($MODULE_ID.'_PROB_2_class'),
            Option::get($MODULE_ID, '_PROB_2_class'),
            ['text']
        ],
        [
            'main_PROB_3_VAL',
            Loc::getMessage($MODULE_ID.'_PROB_3_VAL'),
            Option::get($MODULE_ID, '_PROB_3_VAL'),
            ['text']
        ],
        [
            'main_PROB_3_class',
            Loc::getMessage($MODULE_ID.'_PROB_3_class'),
            Option::get($MODULE_ID, '_PROB_3_class'),
            ['text']
        ],
        [
            'main_WF_contract',
            Loc::getMessage($MODULE_ID.'_WF_contract'),
            Option::get($MODULE_ID, '_WF_contract'),
            ['text']
        ],
        [
            'main_IBPL_CONTR',
            Loc::getMessage($MODULE_ID.'_IBPL_CONTR'),
            Option::get($MODULE_ID, '_IBPL_CONTR'),
            ['text']
        ]
    ],
    '1cint' => [
        [
            'main_1CDO_serv',
            Loc::getMessage($MODULE_ID.'_1CDO_serv'),
            Option::get($MODULE_ID, '_1CDO_serv'),
            ['text']
        ],
        [
            'main_1CDO_login',
            Loc::getMessage($MODULE_ID.'_1CDO_login'),
            Option::get($MODULE_ID, '_1CDO_login'),
            ['text']
        ],
        [
            'main_1CDO_pwd',
            Loc::getMessage($MODULE_ID.'_1CDO_pwd'),
            Option::get($MODULE_ID, '_1CDO_pwd'),
            ['text']
        ]
    ],
    'STZint' => [
        [
            'main_STZ_serv',
            Loc::getMessage($MODULE_ID.'_STZ_serv'),
            Option::get($MODULE_ID, '_STZ_serv'),
            ['text']
        ],
        [
            'main_STZ_db',
            Loc::getMessage($MODULE_ID.'_STZ_db'),
            Option::get($MODULE_ID, '_STZ_db'),
            ['text']
        ],
        [
            'main_STZ_login',
            Loc::getMessage($MODULE_ID.'_STZ_login'),
            Option::get($MODULE_ID, '_STZ_login'),
            ['text']
        ],
        [
            'main_STZ_pwd',
            Loc::getMessage($MODULE_ID.'_STZ_pwd'),
            Option::get($MODULE_ID, '_STZ_pwd'),
            ['text']
        ],
        [
            'main_STZ_implog_IBPL',
            Loc::getMessage($MODULE_ID.'_STZ_implog_IBPL'),
            Option::get($MODULE_ID, '_STZ_implog_IBPL'),
            ['text']
        ],
        [
            'main_STZ_WF_export',
            Loc::getMessage($MODULE_ID.'_STZ_WF_export'),
            Option::get($MODULE_ID, '_STZ_WF_export'),
            ['text']
        ],
        [
            'main_WF_copydeal',
            Loc::getMessage($MODULE_ID.'_WF_copydeal'),
            Option::get($MODULE_ID, '_WF_copydeal'),
            ['text']
        ],
        [
            'main_STZ_stagedeal',
            Loc::getMessage($MODULE_ID.'_STZ_stagedeal'),
            Option::get($MODULE_ID, '_STZ_stagedeal'),
            ['text']
        ],
        [
            'main_STZ_zak_UF',
            Loc::getMessage($MODULE_ID.'_STZ_zak_UF'),
            Option::get($MODULE_ID, '_STZ_zak_UF'),
            ['text']
        ],
        [
            'main_STZ_carqty_UF',
            Loc::getMessage($MODULE_ID.'_STZ_carqty_UF'),
            Option::get($MODULE_ID, '_STZ_carqty_UF'),
            ['text']
        ],
        [
            'main_STZ_contqty_UF',
            Loc::getMessage($MODULE_ID.'_STZ_contqty_UF'),
            Option::get($MODULE_ID, '_STZ_contqty_UF'),
            ['text']
        ],
        [
            'main_STZ_carowner_UF',
            Loc::getMessage($MODULE_ID.'_STZ_carowner_UF'),
            Option::get($MODULE_ID, '_STZ_carowner_UF'),
            ['text']
        ],
        [
            'main_STZ_rate_UF',
            Loc::getMessage($MODULE_ID.'_STZ_rate_UF'),
            Option::get($MODULE_ID, '_STZ_rate_UF'),
            ['text']
        ],
        [
            'main_STZ_DFE_UF',
            Loc::getMessage($MODULE_ID.'_STZ_DFE_UF'),
            Option::get($MODULE_ID, '_STZ_DFE_UF'),
            ['text']
        ],
        [
            'main_STZ_vyd_UF',
            Loc::getMessage($MODULE_ID.'_STZ_vyd_UF'),
            Option::get($MODULE_ID, '_STZ_vyd_UF'),
            ['text']
        ],
        [
            'main_STZ_pogr_UF',
            Loc::getMessage($MODULE_ID.'_STZ_pogr_UF'),
            Option::get($MODULE_ID, '_STZ_pogr_UF'),
            ['text']
        ],
        [
            'main_STZ_osv_UF',
            Loc::getMessage($MODULE_ID.'_STZ_osv_UF'),
            Option::get($MODULE_ID, '_STZ_osv_UF'),
            ['text']
        ],
        [
            'main_STZ_cash_UF',
            Loc::getMessage($MODULE_ID.'_STZ_cash_UF'),
            Option::get($MODULE_ID, '_STZ_cash_UF'),
            ['text']
        ],
        [
            'main_STZ_type_UF',
            Loc::getMessage($MODULE_ID.'_STZ_type_UF'),
            Option::get($MODULE_ID, '_STZ_type_UF'),
            ['text']
        ],
        [
            'main_STZ_type_por',
            Loc::getMessage($MODULE_ID.'_STZ_type_por'),
            Option::get($MODULE_ID, '_STZ_type_por'),
            ['text']
        ],
        [
            'main_STZ_type_gru',
            Loc::getMessage($MODULE_ID.'_STZ_type_gru'),
            Option::get($MODULE_ID, '_STZ_type_gru'),
            ['text']
        ],
        [
            'main_STZ_status_UF',
            Loc::getMessage($MODULE_ID.'_STZ_status_UF'),
            Option::get($MODULE_ID, '_STZ_status_UF'),
            ['text']
        ],
        [
            'main_STZ_IBPL_STATUS',
            Loc::getMessage($MODULE_ID.'_STZ_IBPL_STATUS'),
            Option::get($MODULE_ID, '_STZ_IBPL_STATUS'),
            ['text']
        ]
    ]
];

//$ufarr = array("НИЧЕГО НЕ ВЫБРАНО", "FORMATTED_OPPORTUNITY", "OPPORTUNITY_WITH_CURRENCY", "OPPORTUNITY");

$ufarr['EMPTY'] = 'НИЧЕГО НЕ ВЫБРАНО';
$ufarr["FORMATTED_OPPORTUNITY"] = "FORMATTED_OPPORTUNITY";
$ufarr["OPPORTUNITY_WITH_CURRENCY"] = "OPPORTUNITY_WITH_CURRENCY";
$ufarr["OPPORTUNITY"] = "OPPORTUNITY";

if(isset($request["save"]) && check_bitrix_sessid()) {
    foreach ($arAllOptions as $part) {
        foreach($part as $arOption) {
            if(is_array($arOption)) {
                __AdmSettingsSaveOption($MODULE_ID, $arOption);
            }
        }
    }
}

$arTabs = [
    [
        "DIV" => "main",
        "TAB" => Loc::getMessage($MODULE_ID.'_main'),
        "ICON" => $MODULE_ID . '_settings',
        "TITLE" => Loc::getMessage($MODULE_ID.'_main'),
        'TYPE' => 'options', //options || rights || user defined
    ],
    [
        "DIV" => "1cint",
        "TAB" => Loc::getMessage($MODULE_ID.'_1с'),
        "ICON" => $MODULE_ID . '_settings',
        "TITLE" => Loc::getMessage($MODULE_ID.'_1с'),
        'TYPE' => 'options', //options || rights || user defined
    ],
    [
        "DIV" => "STZint",
        "TAB" => Loc::getMessage($MODULE_ID.'_STZ'),
        "ICON" => $MODULE_ID . '_settings',
        "TITLE" => Loc::getMessage($MODULE_ID.'_STZ'),
        'TYPE' => 'options', //options || rights || user defined
    ]
];

$tabControl = new CAdminTabControl("tabControl", $arTabs);

$tabControl->Begin();
?>
<form method="POST" action="<?= $APPLICATION->GetCurPage() ?>?mid=<?= htmlspecialcharsbx($mid) ?>&amp;lang=<?= LANG ?>"
      name="<?= $MODULE_ID ?>_settings">
    <?= bitrix_sessid_post(); ?>
    <?
    foreach ($arTabs as $tab) {
        $tabControl->BeginNextTab();
        __AdmSettingsDrawList($MODULE_ID, $arAllOptions[$tab['DIV']]);
    }?>
    <?$tabControl->Buttons();?>
    <input type="submit" class="adm-btn-save" name="save" value="<?=Loc::getMessage($MODULE_ID.'_save');?>">
    <?=bitrix_sessid_post();?>
    <? $tabControl->End(); ?>
</form>
