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
}
$gridoptions = new \Bitrix\Main\Grid\Options($arResult['GRID_ID']);
$gridoptions->setCollapsedGroups($groups);



