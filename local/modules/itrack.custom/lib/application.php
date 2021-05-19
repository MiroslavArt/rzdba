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
        //define('IBPL_TYPE', 'lists');
        define('IBPL_TYPE', \COption::GetOptionString('itrack.custom', 'main_IBPL_TYPE'));
        // символьный код ИБ маршруты
        //define('IBPL_ROUTE', 'route');
        define('IBPL_ROUTE', \COption::GetOptionString('itrack.custom', 'main_IBPL_ROUTE'));
        // символьный код ИБ план
        //define('IBPL_PLAN', 'plan');
        define('IBPL_PLAN', \COption::GetOptionString('itrack.custom', 'main_IBPL_PLAN'));
        // код свойста - 'Планирование перевозок'
        //define('IBPL_SOST', '379');
        define('IBPL_SOST', \COption::GetOptionString('itrack.custom', 'main_IBPL_SOST'));
        define('IBPL_ZAKR', \COption::GetOptionString('itrack.custom', 'main_IBPL_ZAKR'));
        // код свойста - 'Закрыт'
        //define('IBPL_ZAKR', '384');
        // символьный код ИБ лог сектор
        //define('IBPL_LOGSECT', 'logsector2');
        define('IBPL_LOGSECT', \COption::GetOptionString('itrack.custom', 'main_IBPL_LOGSECT'));
        // код ПП станция обеспечения (НЕ трогать) в сделке
        //define('DEPARTURE_UF', 'UF_CRM_1619614028');
        define('DEPARTURE_UF', \COption::GetOptionString('itrack.custom', 'main_DEPARTURE_UF'));
        // код ПП станция назначения (НЕ трогать) в сделке
        //define('ARRIVAL_UF', 'UF_CRM_1619614056');
        define('ARRIVAL_UF', \COption::GetOptionString('itrack.custom', 'main_ARRIVAL_UF'));
        // код ПП маршрут (техническое) в сделке
        //define('ROUTE_UF', 'UF_CRM_1620289503');
        define('ROUTE_UF', \COption::GetOptionString('itrack.custom', 'main_ROUTE_UF'));
        // код ПП план в сделке
        //define('PLAN_UF', 'UF_CRM_1618904516');
        define('PLAN_UF', \COption::GetOptionString('itrack.custom', 'main_PLAN_UF'));
        // код ПП Оговариваемый объем ДФЭ в сделке
        //define('DFE_UF', 'UF_CRM_5FBD24C4EE591');
        define('DFE_UF', \COption::GetOptionString('itrack.custom', 'main_DFE_UF'));
        // код ПП статус сделки
        //define('STAT_UF', 'UF_CRM_1620752404');
        define('STAT_UF', \COption::GetOptionString('itrack.custom', 'main_STAT_UF'));
        // код свойства Подтвержден поля статуса сделки
        //define('APP_STAT', '351');
        define('APP_STAT', \COption::GetOptionString('itrack.custom', 'main_APP_STAT'));
        // код записи ИБ плане со значением Нет плана
        //define('NO_PLAN_VAL', '33297');
        define('NO_PLAN_VAL', \COption::GetOptionString('itrack.custom', 'main_NO_PLAN_VAL'));
        define('NO_PLAN_VAL_class', \COption::GetOptionString('itrack.custom', 'main_NO_PLAN_VAL_class'));
        define('main_PROB', \COption::GetOptionString('itrack.custom', 'main_PROB'));
        define('main_PROB_1_VAL', \COption::GetOptionString('itrack.custom', 'main_PROB_1_VAL'));
        define('main_PROB_1_class', \COption::GetOptionString('itrack.custom', 'main_PROB_1_class'));
        define('main_PROB_2_VAL', \COption::GetOptionString('itrack.custom', 'main_PROB_2_VAL'));
        define('main_PROB_2_class', \COption::GetOptionString('itrack.custom', 'main_PROB_2_class'));
        define('main_PROB_3_VAL', \COption::GetOptionString('itrack.custom', 'main_PROB_3_VAL'));
        define('main_PROB_3_class', \COption::GetOptionString('itrack.custom', 'main_PROB_3_class'));
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