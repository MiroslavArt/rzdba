<?

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Объекты обслуживания');
$APPLICATION->IncludeComponent(
    'darneo:servicedesk.object',
    '',
    [
        'COMPONENT_TEMPLATE' => '',
        'SEF_URL_TEMPLATES' => [
            'list' => '',
            'detail' => '#ELEMENT_ID#/',
            'add' => 'add/'
        ],
        'SEF_MODE' => 'Y'
    ]
);
require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/footer.php';
