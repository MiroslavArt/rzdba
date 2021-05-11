<?php
$routes = $arResult['HEADERS'][ROUTE_UF]['editable']['items'];

$groups = [];
foreach ($arResult['DEAL'] as &$deal) {
    if($deal['custom']) {
        $groups[] = $deal['id'];
        $deal['custom'] = preg_replace('/Маршрут/', $routes[$deal['group_id']], $deal['custom']);
    }
}
$gridoptions = new \Bitrix\Main\Grid\Options($arResult['GRID_ID']);
$gridoptions->setCollapsedGroups($groups);



