<?

require $_SERVER['DOCUMENT_ROOT'] . '/bitrix/header.php';
$APPLICATION->SetTitle('Сотрудники');
$APPLICATION->IncludeComponent(
    'darneo:servicedesk.staff',
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
