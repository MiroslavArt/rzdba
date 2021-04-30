<?

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Контакты');
$APPLICATION->IncludeComponent(
    'darneo:servicedesk.client',
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
