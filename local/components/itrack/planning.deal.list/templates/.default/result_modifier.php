<?php
$routes = $arResult['HEADERS'][ROUTE_UF]['editable']['items'];

$groups = [];
foreach ($arResult['DEAL'] as &$deal) {
    if($deal['custom']) {
        $groups[] = $deal['id'];
        $streplace = $routes[$deal['group_id']].' cделок:'.$arResult['GROUPDEAL'][$deal['group_id']]['count']
            .', оговариваемый объем ДФЭ:'.$arResult['GROUPDEAL'][$deal['group_id']]['dfe'];
        $deal['custom'] = preg_replace('/Маршрут/', $streplace, $deal['custom']);
    }
    $colorclass = '';

    if($deal[PROB_UF]==PROB_1_VAL) {
        $colorclass = PROB_1_class;
    } elseif($deal[PROB_UF]==PROB_2_VAL) {
        $colorclass = PROB_2_class;
    } elseif($deal[PROB_UF]==PROB_3_VAL) {
        $colorclass = PROB_3_class;
    }

    if($deal[PLAN_UF]==NO_PLAN_VAL) {
        $colorclass = NO_PLAN_VAL_class;
    }

    if($colorclass) {
        foreach ($arResult['HEADERS'] as $header) {
            $deal['columnClasses'][$header['id']] = $colorclass;
        }
    }
}
$gridoptions = new \Bitrix\Main\Grid\Options($arResult['GRID_ID']);
$gridoptions->setCollapsedGroups($groups);




