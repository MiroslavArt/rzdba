<?php

namespace iTrack\Custom;

use Bitrix\Main\Config\Option;
use Bitrix\Main\EventManager;
use Bitrix\Main\Page\Asset;


class Application
{


    public static function init()
    {
        self::setConstants();
        self::initJsHandlers();
        self::initEventHandlers();
    }

    protected static function setConstants() {
        define('IBPL_TYPE', 'lists');
        // символьный код ИБ маршруты
        define('IBPL_ROUTE', 'route');
        // символьный код ИБ план
        define('IBPL_PLAN', 'plan');
        // символьный код свойста - 'Планирование перевозок'
        define('IBPL_SOST', '379');
        // символьный код ИБ лог сектор
        define('IBPL_LOGSECT', 'logsector2');
        // код ПП станция обеспечения (НЕ трогать) в сделке
        define('DEPARTURE_UF', 'UF_CRM_1619614028');
        // код ПП станция назначения (НЕ трогать) в сделке
        define('ARRIVAL_UF', 'UF_CRM_1619614056');
        // код ПП маршрут (техническое) в сделке
        define('ROUTE_UF', 'UF_CRM_1620289503');
        // код ПП план в сделке
        define('PLAN_UF', 'UF_CRM_1618904516');
        // код ПП Оговариваемый объем ДФЭ в сделке
        define('DFE_UF', 'UF_CRM_5FBD24C4EE591');
        // код ПП статус сделки
        define('STAT_UF', 'UF_CRM_1620752404');
    }


    protected static function initJsHandlers()
    {

    }

    public static function initEventHandlers()
    {
        $eventManager = EventManager::getInstance();
        $eventManager->addEventHandler('crm','OnBeforeCrmDealUpdate', ['\iTrack\Custom\EventHandlers\Crm','onBeforeCrmDealUpdate']);
        $eventManager->addEventHandler('crm','OnBeforeCrmDealAdd', ['\iTrack\Custom\EventHandlers\Crm','OnBeforeCrmDealAdd']);
    }

    public static function log($msg, $file = 'main.log')
    {
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/local/logs/'.$file, date(DATE_COOKIE).': '.$msg."\n", FILE_APPEND);
    }
}