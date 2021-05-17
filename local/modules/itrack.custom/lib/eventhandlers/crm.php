<?php

namespace iTrack\Custom\EventHandlers;

use Bitrix\Crm\DealTable;
use Bitrix\Main\Loader;
use Itrack\Custom\Helpers\Utils;

class Crm
{
    public static function onBeforeCrmDealUpdate(&$arFields)
    {
        if (\Bitrix\Main\Loader::includeModule('crm')) {
            if($arFields[DEPARTURE_UF] && !$arFields[ARRIVAL_UF]) {
                $foundf = ARRIVAL_UF;
            } elseif(!$arFields[DEPARTURE_UF] && $arFields[ARRIVAL_UF]) {
                $foundf = DEPARTURE_UF;
            }
            $arFilterDeal = array('ID'=>$arFields['ID']);
            $arSelectDeal = array('ID', $foundf);
            $obResDeal = \CCrmDeal::GetListEx(false,$arFilterDeal,false,false,$arSelectDeal)->Fetch();
            if($obResDeal[$foundf]) {
                $arFields[$foundf] = $obResDeal[$foundf];
            }
        }

        if($arFields[DEPARTURE_UF] && $arFields[ARRIVAL_UF]) {
            $routeid = self::actualiseRoute($arFields[DEPARTURE_UF], $arFields[ARRIVAL_UF]);
            if(intval($routeid) > 0) {
                $arFields[ROUTE_UF] = $routeid;
            }
        }

    }

    public static function onBeforeCrmDealAdd(&$arFields)
    {
        if($arFields[DEPARTURE_UF] && $arFields[ARRIVAL_UF]) {
            $routeid = self::actualiseRoute($arFields[DEPARTURE_UF], $arFields[ARRIVAL_UF]);
            if(intval($routeid) > 0) {
                $arFields[ROUTE_UF] = $routeid;
            }
        }
    }

    protected static function actualiseRoute($departure = null, $arrival = null)
    {
        $logib = Utils::getIDIblockByCode(IBPL_LOGSECT, IBPL_TYPE);
        $routeib = Utils::getIDIblockByCode(IBPL_ROUTE, IBPL_TYPE);
        if(!is_null($departure) && !is_null($arrival)) {
            $ibdept = Utils::getIblockElementByID($logib, $departure);
            $logdept = $ibdept['PROPERTIES']['LOGSEKTOR']['VALUE'];
            $ibarr =  Utils::getIblockElementByID($logib, $arrival);
            $logarr = $ibarr['PROPERTIES']['LOGSEKTOR']['VALUE'];
            $routes = Utils::getIBlockElementsByConditions($routeib, ['PROPERTY_LOG_OTPRAVLENIYA'=>$logdept, 'PROPERTY_LOG_PRIBYTIYA'=>$logarr]);
            if(empty($routes)) {
                $ID = Utils::createIBlockElement($routeib, ['NAME'=>$logdept.'->'.$logarr, 'ACTIVE' => 'Y',
                    'PROPERTY_VALUES' => [
                        'LOG_OTPRAVLENIYA'=>$logdept,
                        'LOG_PRIBYTIYA' => $logarr
                    ]
                ], []);
                return $ID;
            } else {
                return $routes[0]['ID'];
            }
        }
    }
}
