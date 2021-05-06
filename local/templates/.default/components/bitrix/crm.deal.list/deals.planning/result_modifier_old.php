<?php
use Bitrix\Main\Context;
\Bitrix\Main\Diag\Debug::writeToFile($_REQUEST, "request", "__miros.log");
\Bitrix\Main\Diag\Debug::writeToFile($_POST, "post", "__miros.log");
\Bitrix\Main\Diag\Debug::writeToFile($_GET, "get", "__miros.log");
$context = Context::getCurrent();
$request = $context->getRequest();
\Bitrix\Main\Diag\Debug::writeToFile($arResult['GRID_ID'], "grid", "__miros.log");
$gridoptions = new \Bitrix\Main\Grid\Options($arResult['GRID_ID']);
$gridoptions->setCollapsedGroups(['group_50', 'group_51']);

// вариант с группой
$deals = $arResult['DEAL'];
unset($arResult['DEAL']);
$groupdeal = [
    'id' => 'group_50',
    'group_id' => 50,
    'parent_id' => 0,
    'has_child' => true,
    'not_count' => false,
    'draggable' => false,
    'expand' => false,
    'custom' => "<div class='tasks-grid-wrapper'>Проект 1</div>",
    'attrs' => [
        'data-type' => 'group',
        'data-group-id' => 50,
        'data-can-create-tasks' => '',
        'data-can-edit-tasks' => ''
    ]
];
$arResult['DEAL'] = [];
$arResult['DEAL']['group_50'] = $groupdeal;
$count = 0;
foreach ($deals as &$deal) {
    $count++;
    if($count < 5) {
        $deal['parent_group_id'] = '50';
        $deal['attrs'] = [
            'data-type' => 'task',
            'data-group-id' => 50,
            'data-can-edit' => true,
            'data-pinned' => 'N'
        ];
        $deal['expand'] = false;
        $arResult['DEAL'][$deal['ID']] = $deal;
    }

    if($count >= 5) {
        if($count == 5) {
            $groupdeal = [
                'id' => 'group_51',
                'group_id' => 51,
                'parent_id' => 0,
                'has_child' => true,
                'not_count' => false,
                'draggable' => false,
                'expand' => false,
                'custom' => "<div class='tasks-grid-wrapper'>Проект 2</div>",
                'attrs' => [
                    'data-type' => 'group',
                    'data-group-id' => 51,
                    'data-can-create-tasks' => true,
                    'data-can-edit-tasks' => true
                ]
            ];
            $arResult['DEAL']['group_51'] = $groupdeal;
        }
        $deal['parent_group_id'] = '51';
        $deal['group_id'] = '51';
        $deal['expand'] = false;
        $deal['attrs'] = [
            'data-type' => 'task',
            'data-group-id' => 51,
            'data-can-edit' => true,
            'data-pinned' => 'N'
        ];

        $arResult['DEAL'][$deal['ID']] = $deal;
    }
    /*else {
        if($count == 5) {
            $groupdeal = [
                'id' => 'group_51',
                'group_id' => 51,
                'parent_id' => 0,
                'has_child' => true,
                'not_count' => true,
                'draggable' => false,
                'custom' => "<div class='tasks-grid-wrapper'>Проект 2</div>",
                'attrs' => [
                    'data-type' => 'group',
                    'data-group-id' => 51,
                    'data-can-create-tasks' => true,
                    'data-can-edit-tasks' => true
                ]
            ];
            $arResult['DEAL'] = [];
            $arResult['DEAL']['group_51'] = $groupdeal;
        }
        $deal['parent_group_id'] = '51';
        $deal['attrs'] = [
            'data-type' => 'task',
            'data-group-id' => 51,
            'data-can-edit' => true,
            'data-pinned' => 'N'
        ];
        $deal['expand'] = true;
        $arResult['DEAL'][$deal['ID']] = $deal;
    }*/
}



// вариант с подзадачей
/*if($request['action']!='getChildRows') {
    foreach ($arResult['HEADERS'] as &$header) {
        if($header['id'] == 'DEAL_SUMMARY') {
            $header['shift'] = true;
            $header['type'] = 'custom';
            $header['editable'] = false;
        }
    }

    unset($arResult['DEAL']);

    $arResult['DEAL'] = [];
    $groupdeal = [
       'ID' => 'G1',
       'has_child' => true,
       'parent_id' => 0,
       'parent_group_id' => 0,
       'TITLE' => 'Group',
       'TYPE_ID' => 'SALE',
       'DATE_CREATE' => date('d.m.Y H:i:s'),
       'OPPORTUNITY' => '0.00',
       'CURRENCY_ID' => 'RUB',
       'STAGE_SEMANTIC_ID' => 'P',
       'ASSIGNED_BY_ID' => 47,
       'ASSIGNED_BY_LOGIN' => 'frolovav@rzdba.ru',
       'ASSIGNED_BY_NAME' => 'Anton',
       'ASSIGNED_BY_LAST_NAME' => 'Фролов',
       'ASSIGNED_BY_SECOND_NAME' => 'Владимирович',
       'CAN_EXCLUDE' => false,
       'DEAL_TYPE_NAME' => 'Продажа',
       'DEAL_STAGE_NAME' => 'Новая',
       'EDIT' => false,
       'DELETE' => false
    ];
    $arResult['DEAL'][] = $groupdeal;
} else {
    foreach ($arResult['DEAL'] as &$deal) {
        $deal['parent_id'] = 'G1';
    }
}*/




