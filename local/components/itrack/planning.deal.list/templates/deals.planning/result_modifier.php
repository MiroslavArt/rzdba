<?php
$groups = [];
foreach ($arResult['DEAL'] as $deal) {
    if($deal['custom']) {
        $groups[] = $deal['id'];
    }
}
$gridoptions = new \Bitrix\Main\Grid\Options($arResult['GRID_ID']);
$gridoptions->setCollapsedGroups($groups);

