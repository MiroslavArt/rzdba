<?php
$arUrlRewrite=array (
  5 => 
  array (
    'CONDITION' => '#^/docs/pub/(?<hash>[0-9a-f]{32})/(?<action>[0-9a-zA-Z]+)/\\?#',
    'RULE' => 'hash=$1&action=$2&',
    'ID' => 'bitrix:disk.external.link',
    'PATH' => '/docs/pub/index.php',
    'SORT' => 100,
  ),
  129 => 
  array (
    'CONDITION' => '#^/extranet/timeman/schedules/(?<ACTION>[0-9a-zA-Z\\/]+)?/?.*#',
    'RULE' => 'ACTION=$1&',
    'ID' => 'bitrix:timeman.schedules',
    'PATH' => '/extranet/timeman/schedules.php',
    'SORT' => 100,
  ),
  130 => 
  array (
    'CONDITION' => '#^/extranet/timeman/worktime/(?<ACTION>[0-9a-zA-Z\\/]+)?/?.*#',
    'RULE' => 'ACTION=$1&',
    'ID' => 'bitrix:timeman.worktime',
    'PATH' => '/extranet/timeman/worktime.php',
    'SORT' => 100,
  ),
  78 => 
  array (
    'CONDITION' => '#^/pub/document/([0-9a-zA-Z_-]+)/([0-9a-zA-Z]+)/([^/]*)#',
    'RULE' => 'id=$1&hash=$2',
    'ID' => 'bitrix:documentgenerator.view',
    'PATH' => '/pub/document.php',
    'SORT' => 100,
  ),
  6 => 
  array (
    'CONDITION' => '#^/disk/(?<action>[0-9a-zA-Z]+)/(?<fileId>[0-9]+)/\\?#',
    'RULE' => 'action=$1&fileId=$2&',
    'ID' => 'bitrix:disk.services',
    'PATH' => '/bitrix/services/disk/index.php',
    'SORT' => 100,
  ),
  126 => 
  array (
    'CONDITION' => '#^/timeman/schedules/(?<ACTION>[0-9a-zA-Z\\/]+)?/?.*#',
    'RULE' => 'ACTION=$1&',
    'ID' => 'bitrix:timeman.schedules',
    'PATH' => '/timeman/schedules.php',
    'SORT' => 100,
  ),
  138 => 
  array (
    'CONDITION' => '#^/extranet/pub/form/([0-9a-z_]+?)/([0-9a-z]+?)/.*#',
    'RULE' => 'form_code=$1&sec=$2',
    'ID' => NULL,
    'PATH' => '/extranet/pub/form.php',
    'SORT' => 100,
  ),
  127 => 
  array (
    'CONDITION' => '#^/timeman/worktime/(?<ACTION>[0-9a-zA-Z\\/]+)?/?.*#',
    'RULE' => 'ACTION=$1&',
    'ID' => 'bitrix:timeman.worktime',
    'PATH' => '/timeman/worktime.php',
    'SORT' => 100,
  ),
  17 => 
  array (
    'CONDITION' => '#^\\/?\\/mobile/web_mobile_component\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => '',
    'PATH' => '/bitrix/services/mobile/webcomponent.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/pub/pay/([\\w\\W]+)/([0-9a-zA-Z]+)/([^/]*)#',
    'RULE' => 'account_number=$1&hash=$2',
    'ID' => NULL,
    'PATH' => '/pub/payment.php',
    'SORT' => 100,
  ),
  133 => 
  array (
    'CONDITION' => '#^/pub/form/([0-9a-z_]+?)/([0-9a-z]+?)/.*#',
    'RULE' => 'form_code=$1&sec=$2',
    'ID' => NULL,
    'PATH' => '/pub/form.php',
    'SORT' => 100,
  ),
  106 => 
  array (
    'CONDITION' => '#^/extranet/settings/configs/userconsent/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/extranet/configs/userconsent.php',
    'SORT' => 100,
  ),
  16 => 
  array (
    'CONDITION' => '#^\\/?\\/mobile/mobile_component\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => '',
    'PATH' => '/bitrix/services/mobile/jscomponent.php',
    'SORT' => 100,
  ),
  18 => 
  array (
    'CONDITION' => '#^/mobile/disk/(?<hash>[0-9]+)/download#',
    'RULE' => 'download=1&objectId=$1',
    'ID' => 'bitrix:mobile.disk.file.detail',
    'PATH' => '/mobile/disk/index.php',
    'SORT' => 100,
  ),
  11 => 
  array (
    'CONDITION' => '#^/online/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  167 => 
  array (
    'CONDITION' => '#^/video/([\\.\\-0-9a-zA-Z]+)(/?)([^/]*)#',
    'RULE' => 'alias=$1&videoconf',
    'ID' => 'bitrix:im.router',
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  101 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/deal_category/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.deal_category',
    'PATH' => '/extranet/crm/configs/deal_category/index.php',
    'SORT' => 100,
  ),
  96 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/mailtemplate/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.mail_template',
    'PATH' => '/extranet/crm/configs/mailtemplate/index.php',
    'SORT' => 100,
  ),
  34 => 
  array (
    'CONDITION' => '#^/tasks/getfile/(\\d+)/(\\d+)/([^/]+)#',
    'RULE' => 'taskid=$1&fileid=$2&filename=$3',
    'ID' => 'bitrix:tasks_tools_getfile',
    'PATH' => '/tasks/getfile.php',
    'SORT' => 100,
  ),
  103 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/automation/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.automation',
    'PATH' => '/extranet/crm/configs/automation/index.php',
    'SORT' => 100,
  ),
  95 => 
  array (
    'CONDITION' => '#^/crm/configs/document_numerators/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.document_numerators.list',
    'PATH' => '/crm/configs/document_numerators/index.php',
    'SORT' => 100,
  ),
  155 => 
  array (
    'CONDITION' => '#^/extranet/mobile/knowledge/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/extranet/mobile/knowledge/group/index.php',
    'SORT' => 100,
  ),
  94 => 
  array (
    'CONDITION' => '#^/extranet/marketing/config/role/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/config/role.php',
    'SORT' => 100,
  ),
  104 => 
  array (
    'CONDITION' => '#^/extranet/company/personal/mail/#',
    'RULE' => '',
    'ID' => 'bitrix:intranet.mail.config',
    'PATH' => '/extranet/mail/index.php',
    'SORT' => 100,
  ),
  27 => 
  array (
    'CONDITION' => '#^/extranet/company/personal/mail/#',
    'RULE' => '',
    'ID' => 'bitrix:intranet.mail.config',
    'PATH' => '/extranet/mail/index.php',
    'SORT' => 100,
  ),
  100 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/mycompany/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.company',
    'PATH' => '/extranet/crm/configs/mycompany/index.php',
    'SORT' => 100,
  ),
  108 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/exclusion/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/extranet/crm/configs/exclusion/index.php',
    'SORT' => 100,
  ),
  8 => 
  array (
    'CONDITION' => '#^/stssync/contacts_extranet_emp/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/contacts_extranet_emp/index.php',
    'SORT' => 100,
  ),
  135 => 
  array (
    'CONDITION' => '#^/settings/configs/userconsent/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/configs/userconsent.php',
    'SORT' => 100,
  ),
  91 => 
  array (
    'CONDITION' => '#^/extranet/marketing/blacklist/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/blacklist.php',
    'SORT' => 100,
  ),
  131 => 
  array (
    'CONDITION' => '#^/extranet/timeman/settings/.*#',
    'RULE' => '',
    'ID' => 'bitrix:timeman.settings',
    'PATH' => '/extranet/timeman/settings.php',
    'SORT' => 100,
  ),
  90 => 
  array (
    'CONDITION' => '#^/extranet/marketing/template/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/template.php',
    'SORT' => 100,
  ),
  97 => 
  array (
    'CONDITION' => '#^/extranet/crm/configs/exch1c/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.exch1c',
    'PATH' => '/extranet/crm/configs/exch1c/index.php',
    'SORT' => 100,
  ),
  76 => 
  array (
    'CONDITION' => '#^/extranet/contacts/personal/#',
    'RULE' => NULL,
    'ID' => 'bitrix:socialnetwork_user',
    'PATH' => '/extranet/contacts/personal.php',
    'SORT' => 100,
  ),
  75 => 
  array (
    'CONDITION' => '#^/extranet/workgroups/create/#',
    'RULE' => NULL,
    'ID' => 'bitrix:extranet.group_create',
    'PATH' => '/extranet/workgroups/create/index.php',
    'SORT' => 100,
  ),
  92 => 
  array (
    'CONDITION' => '#^/extranet/marketing/contact/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/contact.php',
    'SORT' => 100,
  ),
  89 => 
  array (
    'CONDITION' => '#^/extranet/marketing/segment/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/segment.php',
    'SORT' => 100,
  ),
  160 => 
  array (
    'CONDITION' => '#^/marketplace/configuration/#',
    'RULE' => '',
    'ID' => 'bitrix:rest.configuration',
    'PATH' => '/marketplace/configuration/index.php',
    'SORT' => 100,
  ),
  119 => 
  array (
    'CONDITION' => '#^/extranet/shop/buyer_group/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.buyer_group',
    'PATH' => '/extranet/shop/buyer_group/index.php',
    'SORT' => 100,
  ),
  151 => 
  array (
    'CONDITION' => '#^/extranet/mobile/knowledge/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/extranet/mobile/knowledge/index.php',
    'SORT' => 100,
  ),
  10 => 
  array (
    'CONDITION' => '#^/stssync/calendar_extranet/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar_extranet/index.php',
    'SORT' => 100,
  ),
  123 => 
  array (
    'CONDITION' => '#^\\/?\\/mobileapp/jn\\/(.*)\\/.*#',
    'RULE' => 'componentName=$1',
    'ID' => NULL,
    'PATH' => '/bitrix/services/mobileapp/jn.php',
    'SORT' => 100,
  ),
  166 => 
  array (
    'CONDITION' => '#^/extranet/marketing/toloka/#',
    'RULE' => '',
    'ID' => 'bitrix:sender.yandex.toloka',
    'PATH' => '/extranet/marketing/toloka.php',
    'SORT' => 100,
  ),
  7 => 
  array (
    'CONDITION' => '#^/stssync/contacts_extranet/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/contacts_extranet/index.php',
    'SORT' => 100,
  ),
  87 => 
  array (
    'CONDITION' => '#^/extranet/marketing/letter/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/letter.php',
    'SORT' => 100,
  ),
  71 => 
  array (
    'CONDITION' => '#^/crm/configs/deal_category/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.deal_category',
    'PATH' => '/crm/configs/deal_category/index.php',
    'SORT' => 100,
  ),
  67 => 
  array (
    'CONDITION' => '#^/crm/configs/productprops/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.productprops',
    'PATH' => '/crm/configs/productprops/index.php',
    'SORT' => 100,
  ),
  149 => 
  array (
    'CONDITION' => '#^/extranet/knowledge/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/extranet/knowledge/group/index.php',
    'SORT' => 100,
  ),
  63 => 
  array (
    'CONDITION' => '#^/crm/configs/mailtemplate/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.mail_template',
    'PATH' => '/crm/configs/mailtemplate/index.php',
    'SORT' => 100,
  ),
  118 => 
  array (
    'CONDITION' => '#^/extranet/shop/orderform/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.matcher',
    'PATH' => '/extranet/shop/orderform/index.php',
    'SORT' => 100,
  ),
  24 => 
  array (
    'CONDITION' => '#^/bitrix/services/ymarket/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/services/ymarket/index.php',
    'SORT' => 100,
  ),
  88 => 
  array (
    'CONDITION' => '#^/extranet/marketing/ads/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/ads.php',
    'SORT' => 100,
  ),
  54 => 
  array (
    'CONDITION' => '#^/crm/configs/automation/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.automation',
    'PATH' => '/crm/configs/automation/index.php',
    'SORT' => 100,
  ),
  115 => 
  array (
    'CONDITION' => '#^/extranet/shop/settings/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.admin.page.controller',
    'PATH' => '/extranet/shop/settings/index.php',
    'SORT' => 100,
  ),
  9 => 
  array (
    'CONDITION' => '#^/stssync/tasks_extranet/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/tasks_extranet/index.php',
    'SORT' => 100,
  ),
  154 => 
  array (
    'CONDITION' => '#^/mobile/knowledge/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/mobile/knowledge/group/index.php',
    'SORT' => 100,
  ),
  164 => 
  array (
    'CONDITION' => '#^/extranet/shop/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.productcard.controller',
    'PATH' => '/extranet/shop/catalog/index.php',
    'SORT' => 100,
  ),
  43 => 
  array (
    'CONDITION' => '#^/crm/configs/exclusion/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/crm/configs/exclusion/index.php',
    'SORT' => 100,
  ),
  77 => 
  array (
    'CONDITION' => '#^/extranet/mobile/webdav#',
    'RULE' => NULL,
    'ID' => 'bitrix:mobile.webdav.file.list',
    'PATH' => '/extranet/mobile/webdav/index.php',
    'SORT' => 100,
  ),
  70 => 
  array (
    'CONDITION' => '#^/crm/configs/mycompany/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.company',
    'PATH' => '/crm/configs/mycompany/index.php',
    'SORT' => 100,
  ),
  125 => 
  array (
    'CONDITION' => '#^/extranet/crm/tracking/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/crm/tracking/index.php',
    'SORT' => 100,
  ),
  60 => 
  array (
    'CONDITION' => '#^/crm/configs/locations/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.locations',
    'PATH' => '/crm/configs/locations/index.php',
    'SORT' => 100,
  ),
  86 => 
  array (
    'CONDITION' => '#^/marketing/config/role/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/config/role.php',
    'SORT' => 100,
  ),
  93 => 
  array (
    'CONDITION' => '#^/extranet/marketing/rc/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/extranet/marketing/rc.php',
    'SORT' => 100,
  ),
  117 => 
  array (
    'CONDITION' => '#^/extranet/shop/orders/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order',
    'PATH' => '/extranet/shop/orders/index.php',
    'SORT' => 100,
  ),
  165 => 
  array (
    'CONDITION' => '#^/extranet/crm/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.catalog.controller',
    'PATH' => '/extranet/crm/catalog/index.php',
    'SORT' => 100,
  ),
  58 => 
  array (
    'CONDITION' => '#^/crm/configs/currency/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.currency',
    'PATH' => '/crm/configs/currency/index.php',
    'SORT' => 100,
  ),
  116 => 
  array (
    'CONDITION' => '#^/extranet/shop/stores/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/extranet/shop/stores/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/stssync/contacts_crm/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/contacts_crm/index.php',
    'SORT' => 100,
  ),
  137 => 
  array (
    'CONDITION' => '#^/extranet/crm/webform/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/extranet/crm/webform/index.php',
    'SORT' => 100,
  ),
  139 => 
  array (
    'CONDITION' => '#^/extranet/crm/button/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/extranet/crm/button/index.php',
    'SORT' => 100,
  ),
  65 => 
  array (
    'CONDITION' => '#^/crm/configs/measure/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.measure',
    'PATH' => '/crm/configs/measure/index.php',
    'SORT' => 100,
  ),
  74 => 
  array (
    'CONDITION' => '#^/extranet/workgroups/#',
    'RULE' => NULL,
    'ID' => 'bitrix:socialnetwork_group',
    'PATH' => '/extranet/workgroups/index.php',
    'SORT' => 100,
  ),
  83 => 
  array (
    'CONDITION' => '#^/marketing/blacklist/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/blacklist.php',
    'SORT' => 100,
  ),
  120 => 
  array (
    'CONDITION' => '#^/extranet/shop/buyer/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.buyer',
    'PATH' => '/extranet/shop/buyer/index.php',
    'SORT' => 100,
  ),
  98 => 
  array (
    'CONDITION' => '#^/services/processes/#',
    'RULE' => '',
    'ID' => 'bitrix:lists',
    'PATH' => '/services/processes/index.php',
    'SORT' => 100,
  ),
  128 => 
  array (
    'CONDITION' => '#^/timeman/settings/.*#',
    'RULE' => '',
    'ID' => 'bitrix:timeman.settings',
    'PATH' => '/timeman/settings.php',
    'SORT' => 100,
  ),
  53 => 
  array (
    'CONDITION' => '#^/crm/configs/fields/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.fields',
    'PATH' => '/crm/configs/fields/index.php',
    'SORT' => 100,
  ),
  66 => 
  array (
    'CONDITION' => '#^/crm/configs/volume/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.volume',
    'PATH' => '/crm/configs/volume/index.php',
    'SORT' => 100,
  ),
  181 => 
  array (
    'CONDITION' => '#^/helpdesk/equipment/#',
    'RULE' => '',
    'ID' => 'darneo:equipment',
    'PATH' => '/helpdesk/equipment/index.php',
    'SORT' => 100,
  ),
  68 => 
  array (
    'CONDITION' => '#^/crm/configs/preset/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.preset',
    'PATH' => '/crm/configs/preset/index.php',
    'SORT' => 100,
  ),
  64 => 
  array (
    'CONDITION' => '#^/crm/configs/exch1c/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.exch1c',
    'PATH' => '/crm/configs/exch1c/index.php',
    'SORT' => 100,
  ),
  82 => 
  array (
    'CONDITION' => '#^/marketing/template/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/template.php',
    'SORT' => 100,
  ),
  62 => 
  array (
    'CONDITION' => '#^/crm/reports/report/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.report',
    'PATH' => '/crm/reports/report/index.php',
    'SORT' => 100,
  ),
  150 => 
  array (
    'CONDITION' => '#^/extranet/knowledge/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/extranet/knowledge/index.php',
    'SORT' => 100,
  ),
  178 => 
  array (
    'CONDITION' => '#^/helpdesk/settings/#',
    'RULE' => '',
    'ID' => 'darneo:settings',
    'PATH' => '/helpdesk/settings/index.php',
    'SORT' => 100,
  ),
  12 => 
  array (
    'CONDITION' => '#^/online/(/?)([^/]*)#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/desktop_app/router.php',
    'SORT' => 100,
  ),
  152 => 
  array (
    'CONDITION' => '#^/extranet/kb/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/extranet/kb/group/index.php',
    'SORT' => 100,
  ),
  180 => 
  array (
    'CONDITION' => '#^/helpdesk/contract/#',
    'RULE' => '',
    'ID' => 'darneo:contract',
    'PATH' => '/helpdesk/contract/index.php',
    'SORT' => 100,
  ),
  84 => 
  array (
    'CONDITION' => '#^/marketing/contact/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/contact.php',
    'SORT' => 100,
  ),
  21 => 
  array (
    'CONDITION' => '#^/marketplace/local/#',
    'RULE' => '',
    'ID' => 'bitrix:rest.marketplace.localapp',
    'PATH' => '/marketplace/local/index.php',
    'SORT' => 100,
  ),
  143 => 
  array (
    'CONDITION' => '#^/timeman/schedules/#',
    'RULE' => '',
    'ID' => 'bitrix:timeman.schedules',
    'PATH' => '/timeman/schedules.php',
    'SORT' => 100,
  ),
  81 => 
  array (
    'CONDITION' => '#^/marketing/segment/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/segment.php',
    'SORT' => 100,
  ),
  40 => 
  array (
    'CONDITION' => '#^/bizproc/processes/#',
    'RULE' => '',
    'ID' => 'bitrix:lists',
    'PATH' => '/bizproc/processes/index.php',
    'SORT' => 100,
  ),
  56 => 
  array (
    'CONDITION' => '#^/crm/configs/perms/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.perms',
    'PATH' => '/crm/configs/perms/index.php',
    'SORT' => 100,
  ),
  113 => 
  array (
    'CONDITION' => '#^/shop/buyer_group/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.buyer_group',
    'PATH' => '/shop/buyer_group/index.php',
    'SORT' => 100,
  ),
  13 => 
  array (
    'CONDITION' => '#^/stssync/contacts/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/contacts/index.php',
    'SORT' => 100,
  ),
  163 => 
  array (
    'CONDITION' => '#^/marketing/toloka/#',
    'RULE' => '',
    'ID' => 'bitrix:sender.yandex.toloka',
    'PATH' => '/marketing/toloka.php',
    'SORT' => 100,
  ),
  79 => 
  array (
    'CONDITION' => '#^/marketing/letter/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/letter.php',
    'SORT' => 100,
  ),
  172 => 
  array (
    'CONDITION' => '#^/helpdesk/tickets/#',
    'RULE' => '',
    'ID' => 'darneo:tickets',
    'PATH' => '/helpdesk/tickets/index.php',
    'SORT' => 100,
  ),
  141 => 
  array (
    'CONDITION' => '#^/timeman/worktime/#',
    'RULE' => '',
    'ID' => 'bitrix:timeman.worktime',
    'PATH' => '/timeman/worktime.php',
    'SORT' => 100,
  ),
  23 => 
  array (
    'CONDITION' => '#^/marketplace/hook/#',
    'RULE' => '',
    'ID' => 'bitrix:rest.hook',
    'PATH' => '/marketplace/hook/index.php',
    'SORT' => 100,
  ),
  173 => 
  array (
    'CONDITION' => '#^/helpdesk/company/#',
    'RULE' => '',
    'ID' => 'darneo:company',
    'PATH' => '/helpdesk/company/index.php',
    'SORT' => 100,
  ),
  28 => 
  array (
    'CONDITION' => '#^/company/personal/#',
    'RULE' => '',
    'ID' => 'bitrix:socialnetwork_user',
    'PATH' => '/company/personal.php',
    'SORT' => 100,
  ),
  0 => 
  array (
    'CONDITION' => '#^/stssync/calendar/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/calendar/index.php',
    'SORT' => 100,
  ),
  179 => 
  array (
    'CONDITION' => '#^/helpdesk/history/#',
    'RULE' => '',
    'ID' => 'darneo:history',
    'PATH' => '/helpdesk/history/index.php',
    'SORT' => 100,
  ),
  142 => 
  array (
    'CONDITION' => '#^/timeman/settings/#',
    'RULE' => '',
    'ID' => 'bitrix:timeman.settings',
    'PATH' => '/timeman/settings.php',
    'SORT' => 100,
  ),
  146 => 
  array (
    'CONDITION' => '#^/mobile/knowledge/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/mobile/knowledge/index.php',
    'SORT' => 100,
  ),
  140 => 
  array (
    'CONDITION' => '#^/extranet/crm/ml/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/extranet/crm/ml/index.php',
    'SORT' => 100,
  ),
  176 => 
  array (
    'CONDITION' => '#^/helpdesk/report/#',
    'RULE' => '',
    'ID' => 'darneo:report',
    'PATH' => '/helpdesk/report/index.php',
    'SORT' => 100,
  ),
  26 => 
  array (
    'CONDITION' => '#^/company/gallery/#',
    'RULE' => '',
    'ID' => 'bitrix:photogallery_user',
    'PATH' => '/company/gallery/index.php',
    'SORT' => 100,
  ),
  177 => 
  array (
    'CONDITION' => '#^/helpdesk/object/#',
    'RULE' => '',
    'ID' => 'darneo:object',
    'PATH' => '/helpdesk/object/index.php',
    'SORT' => 100,
  ),
  144 => 
  array (
    'CONDITION' => '#^/knowledge/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/knowledge/group/index.php',
    'SORT' => 100,
  ),
  59 => 
  array (
    'CONDITION' => '#^/crm/configs/tax/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.tax',
    'PATH' => '/crm/configs/tax/index.php',
    'SORT' => 100,
  ),
  22 => 
  array (
    'CONDITION' => '#^/marketplace/app/#',
    'RULE' => '',
    'ID' => 'bitrix:app.layout',
    'PATH' => '/marketplace/app/index.php',
    'SORT' => 100,
  ),
  73 => 
  array (
    'CONDITION' => '#^/timeman/meeting/#',
    'RULE' => '',
    'ID' => 'bitrix:meetings',
    'PATH' => '/timeman/meeting/index.php',
    'SORT' => 100,
  ),
  174 => 
  array (
    'CONDITION' => '#^/helpdesk/client/#',
    'RULE' => '',
    'ID' => 'darneo:client',
    'PATH' => '/helpdesk/client/index.php',
    'SORT' => 100,
  ),
  31 => 
  array (
    'CONDITION' => '#^/services/lists/#',
    'RULE' => '',
    'ID' => 'bitrix:lists',
    'PATH' => '/services/lists/index.php',
    'SORT' => 100,
  ),
  55 => 
  array (
    'CONDITION' => '#^/crm/configs/bp/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.bp',
    'PATH' => '/crm/configs/bp/index.php',
    'SORT' => 100,
  ),
  61 => 
  array (
    'CONDITION' => '#^/crm/configs/ps/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.config.ps',
    'PATH' => '/crm/configs/ps/index.php',
    'SORT' => 100,
  ),
  175 => 
  array (
    'CONDITION' => '#^/helpdesk/staff/#',
    'RULE' => '',
    'ID' => 'darneo:staff',
    'PATH' => '/helpdesk/staff/index.php',
    'SORT' => 100,
  ),
  112 => 
  array (
    'CONDITION' => '#^/shop/orderform/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.matcher',
    'PATH' => '/shop/orderform/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/crm/invoicing/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/crm/invoicing/index.php',
    'SORT' => 100,
  ),
  29 => 
  array (
    'CONDITION' => '#^/about/gallery/#',
    'RULE' => '',
    'ID' => 'bitrix:photogallery',
    'PATH' => '/about/gallery/index.php',
    'SORT' => 100,
  ),
  80 => 
  array (
    'CONDITION' => '#^/marketing/ads/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/ads.php',
    'SORT' => 100,
  ),
  25 => 
  array (
    'CONDITION' => '#^/stssync/tasks/#',
    'RULE' => '',
    'ID' => 'bitrix:stssync.server',
    'PATH' => '/bitrix/services/stssync/tasks/index.php',
    'SORT' => 100,
  ),
  33 => 
  array (
    'CONDITION' => '#^/services/idea/#',
    'RULE' => '',
    'ID' => 'bitrix:idea',
    'PATH' => '/services/idea/index.php',
    'SORT' => 100,
  ),
  107 => 
  array (
    'CONDITION' => '#^/pub/site/(.*?)#',
    'RULE' => 'path=$1',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/pub/site/index.php',
    'SORT' => 100,
  ),
  46 => 
  array (
    'CONDITION' => '#^/services/wiki/#',
    'RULE' => '',
    'ID' => 'bitrix:wiki',
    'PATH' => '/services/wiki.php',
    'SORT' => 100,
  ),
  109 => 
  array (
    'CONDITION' => '#^/shop/settings/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.admin.page.controller',
    'PATH' => '/shop/settings/index.php',
    'SORT' => 100,
  ),
  105 => 
  array (
    'CONDITION' => '#^/extranet/onec/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.1C.start',
    'PATH' => '/extranet/onec/index.php',
    'SORT' => 100,
  ),
  15 => 
  array (
    'CONDITION' => '#^/mobile/webdav#',
    'RULE' => '',
    'ID' => 'bitrix:mobile.webdav.file.list',
    'PATH' => '/mobile/webdav/index.php',
    'SORT' => 100,
  ),
  72 => 
  array (
    'CONDITION' => '#^/crm/activity/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.activity',
    'PATH' => '/crm/activity/index.php',
    'SORT' => 100,
  ),
  32 => 
  array (
    'CONDITION' => '#^/services/faq/#',
    'RULE' => '',
    'ID' => 'bitrix:support.faq',
    'PATH' => '/services/faq/index.php',
    'SORT' => 100,
  ),
  85 => 
  array (
    'CONDITION' => '#^/marketing/rc/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/marketing/rc.php',
    'SORT' => 100,
  ),
  161 => 
  array (
    'CONDITION' => '#^/shop/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:catalog.productcard.controller',
    'PATH' => '/shop/catalog/index.php',
    'SORT' => 100,
  ),
  124 => 
  array (
    'CONDITION' => '#^/crm/tracking/#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/crm/tracking/index.php',
    'SORT' => 100,
  ),
  153 => 
  array (
    'CONDITION' => '#^/extranet/kb/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/extranet/kb/index.php',
    'SORT' => 100,
  ),
  111 => 
  array (
    'CONDITION' => '#^/shop/orders/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order',
    'PATH' => '/shop/orders/index.php',
    'SORT' => 100,
  ),
  49 => 
  array (
    'CONDITION' => '#^/crm/company/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.company',
    'PATH' => '/crm/company/index.php',
    'SORT' => 100,
  ),
  162 => 
  array (
    'CONDITION' => '#^/crm/catalog/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.catalog.controller',
    'PATH' => '/crm/catalog/index.php',
    'SORT' => 100,
  ),
  57 => 
  array (
    'CONDITION' => '#^/crm/product/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.product',
    'PATH' => '/crm/product/index.php',
    'SORT' => 100,
  ),
  110 => 
  array (
    'CONDITION' => '#^/shop/stores/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/shop/stores/index.php',
    'SORT' => 100,
  ),
  4 => 
  array (
    'CONDITION' => '#^/\\.well-known#',
    'RULE' => '',
    'ID' => '',
    'PATH' => '/bitrix/groupdav.php',
    'SORT' => 100,
  ),
  20 => 
  array (
    'CONDITION' => '#^/marketplace/#',
    'RULE' => '',
    'ID' => 'bitrix:rest.marketplace',
    'PATH' => '/marketplace/index.php',
    'SORT' => 100,
  ),
  48 => 
  array (
    'CONDITION' => '#^/crm/contact/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.contact',
    'PATH' => '/crm/contact/index.php',
    'SORT' => 100,
  ),
  132 => 
  array (
    'CONDITION' => '#^/crm/webform/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/crm/webform/index.php',
    'SORT' => 100,
  ),
  39 => 
  array (
    'CONDITION' => '#^/docs/manage/#',
    'RULE' => '',
    'ID' => 'bitrix:disk.common',
    'PATH' => '/docs/manage/index.php',
    'SORT' => 100,
  ),
  52 => 
  array (
    'CONDITION' => '#^/crm/invoice/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.invoice',
    'PATH' => '/crm/invoice/index.php',
    'SORT' => 100,
  ),
  169 => 
  array (
    'CONDITION' => '#^/conference/#',
    'RULE' => '',
    'ID' => 'bitrix:im.conference.center',
    'PATH' => '/conference/index.php',
    'SORT' => 100,
  ),
  159 => 
  array (
    'CONDITION' => '#^/docs/shared#',
    'RULE' => '',
    'ID' => 'bitrix:disk.common',
    'PATH' => '/docs/shared/index.php',
    'SORT' => 100,
  ),
  134 => 
  array (
    'CONDITION' => '#^/crm/button/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/crm/button/index.php',
    'SORT' => 100,
  ),
  114 => 
  array (
    'CONDITION' => '#^/shop/buyer/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.order.buyer',
    'PATH' => '/shop/buyer/index.php',
    'SORT' => 100,
  ),
  30 => 
  array (
    'CONDITION' => '#^/workgroups/#',
    'RULE' => '',
    'ID' => 'bitrix:socialnetwork_group',
    'PATH' => '/workgroups/index.php',
    'SORT' => 100,
  ),
  145 => 
  array (
    'CONDITION' => '#^/knowledge/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/knowledge/index.php',
    'SORT' => 100,
  ),
  170 => 
  array (
    'CONDITION' => '#^/docs/site/#',
    'RULE' => '',
    'ID' => 'bitrix:disk.common',
    'PATH' => '/docs/site/index.php',
    'SORT' => 100,
  ),
  51 => 
  array (
    'CONDITION' => '#^/crm/quote/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.quote',
    'PATH' => '/crm/quote/index.php',
    'SORT' => 100,
  ),
  37 => 
  array (
    'CONDITION' => '#^/docs/sale/#',
    'RULE' => '',
    'ID' => 'bitrix:disk.common',
    'PATH' => '/docs/sale/index.php',
    'SORT' => 100,
  ),
  35 => 
  array (
    'CONDITION' => '#^/docs/pub/#',
    'RULE' => '',
    'ID' => 'bitrix:disk.external.link',
    'PATH' => '/docs/pub/extlinks.php',
    'SORT' => 100,
  ),
  122 => 
  array (
    'CONDITION' => '#^/pub/site/#',
    'RULE' => NULL,
    'ID' => 'bitrix:landing.pub',
    'PATH' => '/pub/site/index.php',
    'SORT' => 100,
  ),
  50 => 
  array (
    'CONDITION' => '#^/crm/deal/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.deal',
    'PATH' => '/crm/deal/index.php',
    'SORT' => 100,
  ),
  36 => 
  array (
    'CONDITION' => '#^//docs/all#',
    'RULE' => '',
    'ID' => 'bitrix:disk.aggregator',
    'PATH' => '/docs/index.php',
    'SORT' => 100,
  ),
  47 => 
  array (
    'CONDITION' => '#^/crm/lead/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.lead',
    'PATH' => '/crm/lead/index.php',
    'SORT' => 100,
  ),
  171 => 
  array (
    'CONDITION' => '#^/crm/type/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.router',
    'PATH' => '/crm/type/index.php',
    'SORT' => 100,
  ),
  147 => 
  array (
    'CONDITION' => '#^/kb/group/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/kb/group/index.php',
    'SORT' => 100,
  ),
  157 => 
  array (
    'CONDITION' => '#^/docs/all#',
    'RULE' => '',
    'ID' => 'bitrix:webdav.aggregator',
    'PATH' => '/docs/all.php',
    'SORT' => 100,
  ),
  136 => 
  array (
    'CONDITION' => '#^/crm/ml/#',
    'RULE' => NULL,
    'ID' => NULL,
    'PATH' => '/crm/ml/index.php',
    'SORT' => 100,
  ),
  168 => 
  array (
    'CONDITION' => '#^/devops/#',
    'RULE' => NULL,
    'ID' => 'bitrix:rest.devops',
    'PATH' => '/devops/index.php',
    'SORT' => 100,
  ),
  14 => 
  array (
    'CONDITION' => '#^/sites/#',
    'RULE' => NULL,
    'ID' => 'bitrix:landing.start',
    'PATH' => '/sites/index.php',
    'SORT' => 100,
  ),
  44 => 
  array (
    'CONDITION' => '#^/onec/#',
    'RULE' => '',
    'ID' => 'bitrix:crm.1c.start',
    'PATH' => '/onec/index.php',
    'SORT' => 100,
  ),
  19 => 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  121 => 
  array (
    'CONDITION' => '#^/mail/#',
    'RULE' => '',
    'ID' => 'bitrix:mail.client',
    'PATH' => '/mail/index.php',
    'SORT' => 100,
  ),
  156 => 
  array (
    'CONDITION' => '#^/rpa/#',
    'RULE' => '',
    'ID' => 'bitrix:rpa.router',
    'PATH' => '/rpa/index.php',
    'SORT' => 100,
  ),
  148 => 
  array (
    'CONDITION' => '#^/kb/#',
    'RULE' => '',
    'ID' => 'bitrix:landing.start',
    'PATH' => '/kb/index.php',
    'SORT' => 100,
  ),
    188 =>
        array (
            'CONDITION' => '#^/planning/planlist/#',
            'RULE' => '',
            'ID' => 'itrack:planning.list',
            'PATH' => '/planning/planlist/index.php',
            'SORT' => 100,
        ),
);
