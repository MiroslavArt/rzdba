<?

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Список договоров');
$APPLICATION->IncludeComponent(
    'darneo:servicedesk.contract',
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
