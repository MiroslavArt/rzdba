<?php

namespace iTrack\Custom\Exchange;

use Bitrix\Main\Loader;
use Itrack\Custom\Helpers\Utils;

class ExportImport
{
    public function __construct()
    {
        Loader::includeModule('crm');
    }

    public static function exportContract($dataexport = array())
    {
        //\Bitrix\Main\Diag\Debug::writeToFile($dataexport, "export1", "__miros.log");
        $dataexport['StartDate'] = substr($dataexport['StartDate'], 0, 10);
        $dataexport['ExpirationDate'] = substr($dataexport['ExpirationDate'], 0, 10);
        //\Bitrix\Main\Diag\Debug::writeToFile($dataexport, "export", "__miros.log");
        if($dataexport['AmountC']) {
            $dataexport['Amount'] = preg_replace("/[^\d]/", '', $dataexport['AmountC']);
            $dataexport['Currency'] = mb_eregi_replace('[0-9|]', '', $dataexport['AmountC']);
            unset($dataexport['AmountC']);
        }

        if($dataexport['Disk_id']) {
            $resObjects = \Bitrix\Disk\Internals\ObjectTable::getList([
                'select' => ['NAME','FILE_ID'],
                'filter' => [
                    'ID' => $dataexport['Disk_id']
                ]
            ])->fetch();
            $filename = $resObjects['NAME'];
            $dataexport['NameFile'] = $resObjects['NAME'];
            $dataexport['ExpansionFile'] = end(explode(".", $filename));
            $file = \CFile::MakeFileArray($resObjects['FILE_ID']);
            $dataexport['File'] = base64_encode(file_get_contents($file['tmp_name']));
        }
        unset($dataexport['Disk_id']);

        echo OneCDO_serv;
        echo OneCDO_login;
        echo OneCDO_pwd;

        $opt = json_encode($dataexport);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_USERPWD, OneCDO_login . ":" . OneCDO_pwd);
        curl_setopt($ch, CURLOPT_URL, OneCDO_serv);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $opt);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json'
        ));

        // Выполнение запроса и получение ответа
        $output = curl_exec($ch);
        print_r($output);

        $obj = json_decode($output,true);
        echo "<pre>";
        print_r($obj);
        echo "<pre>";



        // Очистка ресурсов
        curl_close($ch);

        if($obj['UID']) {
            $response = [
                'UID' => $obj['UID'],
                'LINK' =>  $obj['LINK']
            ];
            //return $obj['UID'];
        } else {
            $response = [
                'UID' => "Ошибка в процессе создания договора",
                'LINK' =>  ''
            ];
            //return "Ошибка в процессе создания договора";
        }
        return $response;
    }

    public static function exportDealSTZ($dataexport = array())
    {
        $conn = new \PDO('sqlsrv:Server='.STZ_serv.',4788;Database='.STZ_db.'', STZ_login, STZ_pwd);
        \Bitrix\Main\Diag\Debug::writeToFile($dataexport, "dataexp".date("d.m.Y G.i.s"), "__stzexp.log");

        Loader::includeModule('crm');
        $xmlstr = <<<XML
        <?xml version='1.0'?>
        <Import>
            <Documents>
                <ShippingOrders>
                </ShippingOrders>
            </Documents>
        </Import>
        XML;

        $sxe = new \SimpleXMLElement($xmlstr);
        $sxe->addAttribute('xmlns', 'http://schemas.railsoft.ru/ExtApi');

        $shiporder = $sxe->Documents->ShippingOrders->addChild('ShippingOrder');
        if($dataexport['ID']) {
            $shiporder->addAttribute('ID', $dataexport['ID']);
        }

        $shiporder->addAttribute('DocumentDate', date('Y-m-d'));

        if($dataexport['ContractorID']) {
            $res = \CCrmCompany::GetListEx(
                $arOrder = array(),
                $arFilter = array('ID'=>$dataexport['ContractorID']),
                $arGroupBy = false,
                $arNavStartParams = false,
                $arSelectFields = array('ID', 'ORIGIN_ID')
            )->fetch();

            if($res['ORIGIN_ID']) {
                $shiporder->addAttribute('ContractorID', $res['ORIGIN_ID']);
            }
        }

        if($dataexport['ContainerOwnerID']) {
            $res = \CCrmCompany::GetListEx(
                $arOrder = array(),
                $arFilter = array('ID'=>$dataexport['ContainerOwnerID']),
                $arGroupBy = false,
                $arNavStartParams = false,
                $arSelectFields = array('ID', 'ORIGIN_ID')
            )->fetch();

            if($res['ORIGIN_ID']) {
                $shiporder->addAttribute('ContainerOwnerID', $res['ORIGIN_ID']);
            }
        }

        if($dataexport['AgreementID']) {
            $dogib = Utils::getIDIblockByCode(IBPL_CONTR, IBPL_TYPE);
            $dogval = Utils::getIblockElementByID($dogib, $dataexport['AgreementID']);
            $guid = $dogval['PROPERTIES']['UID']['VALUE'];
            $guidukh = $dogval['PROPERTIES']['UID_UKH']['VALUE'];
            if($guidukh && !preg_match("/Ошибка/", $guid)) {
                $shiporder->addAttribute('AgreementID', $guidukh);
            }
        }

        if($dataexport['SourceStationID']) {
            $logib = Utils::getIDIblockByCode(IBPL_LOGSECT, IBPL_TYPE);
            $ibdept = Utils::getIblockElementByID($logib, $dataexport['SourceStationID']);
            $sourcest = $ibdept['PROPERTIES']['KOD_STANTSII']['VALUE'];
            if(intval($sourcest)) {
                $shiporder->addAttribute('SourceStationCode', $sourcest);
            }
        }

        if($dataexport['DestStationID']) {
            $logib = Utils::getIDIblockByCode(IBPL_LOGSECT, IBPL_TYPE);
            $ibdept = Utils::getIblockElementByID($logib, $dataexport['DestStationID']);
            $sourcest = $ibdept['PROPERTIES']['KOD_STANTSII']['VALUE'];
            if(intval($sourcest)) {
                $shiporder->addAttribute('DestStationCode', $sourcest);
            }
        }

        if($dataexport['SD']) {
            $shiporder->addAttribute('SD', date('Y-m-d', strtotime($dataexport['SD'])));
        }

        if($dataexport['ED']) {
            $shiporder->addAttribute('ED', date('Y-m-d', strtotime($dataexport['ED'])));
        }


        if($dataexport['ManagerEMail']) {
            $shiporder->addAttribute('ManagerEMail', $dataexport['ManagerEMail']);
        }

        if($dataexport['RequestType']) {
            $shiporder->addAttribute('KindID', $dataexport['RequestType']);
        }

        $xml = $sxe->asXML();
        echo $xml;
        \Bitrix\Main\Diag\Debug::writeToFile($xml, "xml", "__miros.log");

        $sql = 'EXEC Local.InteropAcnt_ImportData @importData = ?';

        $st = $conn->prepare($sql);

        if(!$st) {
            print_r($conn->errorInfo());
        } else {
            $st->bindParam(1, $xml);
            $res = $st->execute();
            if(!$res) {
                var_dump($st->errorInfo());
                return "error";
            } else {
                $result = $st->fetchAll();
                if(empty($result)) {
                    return "added";
                } else {
                    return "error";
                }
                //print_r($result);
            }
        }
    }

    public static function importDealSTZ()
    {
        $logib = Utils::getIDIblockByCode(STZ_implog_IBPL, IBPL_TYPE);
        $elementsList = current(Utils::getIBlockElementsByConditions($logib, [], ['NAME'=>'desc'], ['NAME']));

        Loader::includeModule('crm');
        if($elementsList) {
            $lastrv = $elementsList['NAME'];
        } else {
            $lastrv = 0;
        }

        $conn = new \PDO('sqlsrv:Server='.STZ_serv.',4788;Database='.STZ_db.'', STZ_login, STZ_pwd);

        $sql = 'EXEC Local.InteropAcnt_ExportData '.$lastrv;
        $st = $conn->prepare($sql);

        if(!$st) {
            print "err 1";
            print_r($conn->errorInfo());
        } else {

            $res = $st->execute();
            if(!$res) {
                print "err 2";
                var_dump($st->errorInfo());
            } else {
                $result = $st->fetchAll();

                $xml = new \SimpleXMLElement($result[0][0]);

                foreach ($xml->Documents->ShippingOrders->ShippingOrder as $element) {

                    $elementatr = end($element->attributes());
                    \Bitrix\Main\Diag\Debug::writeToFile($elementatr, "импорт из СТЖ".date("d.m.Y G.i.s"), "__stzimp.log");
                    //$arDeal = \CCrmDeal::GetByID($elementatr['ID'],false);
                    $arFilter = array(
                        "ID"=>$elementatr['ID'], //выбираем определенную сделку по ID
                        "CHECK_PERMISSIONS"=>"N" //не проверять права доступа текущего пользователя
                    );
                    $arSelect = array(
                        "ID",
                        "STAGE_ID",
                        "UF_*"
                    );
                    $res = \CCrmDeal::GetList(Array(), $arFilter, $arSelect);
                    $arDeal = $res->fetch();

                    if(Loader::includeModule('iblock') && $logib) {
                        $el = new \CIBlockElement;
                        if(empty($arDeal)) {
                            $PROP = [
                                'DATA_IMPORTA' => date('d.m.Y'),
                                'REZULTAT_IMPORTA' => 'Ошибка обновления, сделка c ID '.$elementatr['ID'].'не обнаружена в системе'
                            ];
                        } elseif($arDeal['STAGE_ID']!=STZ_stagedeal) {
                            $PROP = [
                                'DATA_IMPORTA' => date('d.m.Y'),
                                'ID_SDELKI' => $elementatr['ID'],
                                'REZULTAT_IMPORTA' => 'Ошибка обновления, сделка не находится на этапе Успешная воронки Прием заказа'
                            ];
                        } elseif ($arDeal['STAGE_ID']==STZ_stagedeal) {
                            if($elementatr['DocStateName']) {
                                $stagestz = current(Utils::getIBlockElementsByConditions(STZ_IBPL_STATUS, ['NAME'=>$elementatr['DocStateName']], ['NAME'=>'desc']));
                            }

                            $arParams = array();

                            $deal=new \CCrmDeal(false);
                            if($elementatr['Number'] && $arDeal[STZ_zak_UF]!=$elementatr['Number']) {
                                $arParams = array_merge($arParams, [STZ_zak_UF=> $elementatr['Number']]);
                            }

                            if($elementatr['CarQuantity'] && $arDeal[STZ_carqty_UF]!=$elementatr['Number']) {
                                $arParams = array_merge($arParams, [STZ_carqty_UF=>$elementatr['CarQuantity']]);
                            }

                            if($elementatr['ContainerQuantity'] && $arDeal[STZ_contqty_UF]!=$elementatr['Number']) {
                                $arParams = array_merge($arParams, [STZ_contqty_UF=>$elementatr['ContainerQuantity']]);
                            }

                            if($elementatr['Rate'] && $arDeal[STZ_rate_UF]!=$elementatr['Rate']) {
                                $arParams = array_merge($arParams, [STZ_rate_UF => $elementatr['Rate']]);
                            }

                            if($elementatr['Dfe'] && $arDeal[STZ_DFE_UF]!=$elementatr['Dfe']) {
                                $arParams = array_merge($arParams, [STZ_DFE_UF => preg_replace("/[^\d]/", '', $elementatr['Dfe'])]);
                            }

                            if($elementatr['ContainerIssueDate'] && strtotime($arDeal[STZ_vyd_UF])!=strtotime($elementatr['ContainerIssueDate'])) {
                                $arParams = array_merge($arParams, [STZ_vyd_UF => date("d.m.Y", strtotime($elementatr['ContainerIssueDate']))]);
                            }

                            if($elementatr['CarLoadingDate'] && strtotime($arDeal[STZ_pogr_UF])!=strtotime($elementatr['CarLoadingDate'])) {
                                $arParams = array_merge($arParams, [STZ_pogr_UF => date("d.m.Y", strtotime($elementatr['CarLoadingDate']))]);
                            }

                            if($elementatr['CarReleaseDate'] && strtotime($arDeal[STZ_osv_UF])!=strtotime($elementatr['CarReleaseDate'])) {
                                $arParams = array_merge($arParams, [STZ_osv_UF => date("d.m.Y", strtotime($elementatr['CarReleaseDate']))]);
                            }

                            if($elementatr['Amount'] && $arDeal[STZ_cash_UF]!=$elementatr['Amount']) {
                                $arParams = array_merge($arParams, [STZ_cash_UF => preg_replace("/[^\d]/", '', $elementatr['Amount'])]);
                            }

                            if($elementatr['DocStateName'] && $arDeal[STZ_status_UF]!=$stagestz['ID']) {
                                $arParams = array_merge($arParams, [STZ_status_UF => $stagestz['ID']]);
                            }
                            if(array_key_exists('ShippingType', $elementatr)) {
                                if($elementatr['ShippingType']==0 && $arDeal[STZ_type_UF]!=STZ_type_por) {
                                    $arParams = array_merge($arParams, [STZ_type_UF => STZ_type_por]);
                                } elseif($elementatr['ShippingType']==1 && $arDeal[STZ_type_UF]!=STZ_type_gru) {
                                    $arParams = array_merge($arParams, [STZ_type_UF => STZ_type_gru]);
                                }
                            }

                            /*$arParams = array(
                                STZ_zak_UF=> $elementatr['Number'],
                                STZ_carqty_UF=>$elementatr['CarQuantity'],
                                STZ_contqty_UF=>$elementatr['ContainerQuantity'],
                                STZ_rate_UF => $elementatr['Rate'],
                                STZ_DFE_UF => $elementatr['Dfe'],
                                STZ_vyd_UF => date("d.m.Y", strtotime($elementatr['ContainerIssueDate'])),
                                STZ_pogr_UF => date("d.m.Y", strtotime($elementatr['CarLoadingDate'])),
                                STZ_osv_UF => date("d.m.Y", strtotime($elementatr['CarReleaseDate'])),
                                STZ_cash_UF => date("d.m.Y", strtotime($elementatr['CarReleaseDate'])),
                                STZ_status_UF => $stagestz['ID']
                            );*/

                            if($arParams) {
                                $res = $deal->Update($arDeal['ID'],$arParams);
                            }

                            if(!$arDeal[STZ_zak_UF]) {
                                if(Loader::includeModule("bizproc"))
                                {
                                    $deal = 'DEAL_'.$arDeal['ID'];
                                    $wfId = \CBPDocument::StartWorkflow(
                                        STZ_WF_copydeal,
                                        array("crm","CCrmDocumentDeal", $deal),
                                        [],
                                        $arErrorsTmp
                                    );
                                }
                                if($res=='1') {
                                    $PROP = [
                                        'DATA_IMPORTA' => date('d.m.Y'),
                                        'ID_SDELKI' => $elementatr['ID'],
                                        'REZULTAT_IMPORTA' => 'Сделка '.$elementatr['ID'].' успешно обновлена и скопирована в воронку Исполнение заказа'
                                    ];
                                } else {
                                    $PROP = [
                                        'DATA_IMPORTA' => date('d.m.Y'),
                                        'ID_SDELKI' => $elementatr['ID'],
                                        'REZULTAT_IMPORTA' => 'Сделка '.$elementatr['ID'].' не обновлена, но скопирована в воронку Исполнение заказа'
                                    ];
                                }
                            } else {
                                $arFilter = array(
                                    STZ_zak_UF =>$elementatr['Number'], //выбираем определенную сделку по ID
                                    "CHECK_PERMISSIONS"=>"N", //не проверять права доступа текущего пользователя
                                    "!STAGE_ID" => STZ_stagedeal
                                );
                                $arSelect = array(
                                    "ID",
                                    "STAGE_ID",
                                    "UF_*"
                                );
                                $resd = \CCrmDeal::GetList(Array(), $arFilter, $arSelect);
                                $updateddeals = [];


                                while($arCopydeal = $resd->fetch()) {
                                    $arParams = array();

                                    if($elementatr['Number'] && $arCopydeal[STZ_zak_UF]!=$elementatr['Number']) {
                                        $arParams = array_merge($arParams, [STZ_zak_UF=> $elementatr['Number']]);
                                    }

                                    if($elementatr['CarQuantity'] && $arCopydeal[STZ_carqty_UF]!=$elementatr['Number']) {
                                        $arParams = array_merge($arParams, [STZ_carqty_UF=>$elementatr['CarQuantity']]);
                                    }

                                    if($elementatr['ContainerQuantity'] && $arCopydeal[STZ_contqty_UF]!=$elementatr['Number']) {
                                        $arParams = array_merge($arParams, [STZ_contqty_UF=>$elementatr['ContainerQuantity']]);
                                    }

                                    if($elementatr['Rate'] && $arCopydeal[STZ_rate_UF]!=$elementatr['Rate']) {
                                        $arParams = array_merge($arParams, [STZ_rate_UF => $elementatr['Rate']]);
                                    }

                                    if($elementatr['Dfe'] && $arCopydeal[STZ_DFE_UF]!=$elementatr['Dfe']) {
                                        $arParams = array_merge($arParams, [STZ_DFE_UF => $elementatr['Dfe']]);
                                    }

                                    if($elementatr['ContainerIssueDate'] && strtotime($arCopydeal[STZ_vyd_UF])!=strtotime($elementatr['ContainerIssueDate'])) {
                                        $arParams = array_merge($arParams, [STZ_vyd_UF => date("d.m.Y", strtotime($elementatr['ContainerIssueDate']))]);
                                    }

                                    if($elementatr['CarLoadingDate'] && strtotime($arCopydeal[STZ_pogr_UF])!=strtotime($elementatr['CarLoadingDate'])) {
                                        $arParams = array_merge($arParams, [STZ_pogr_UF => date("d.m.Y", strtotime($elementatr['CarLoadingDate']))]);
                                    }

                                    if($elementatr['CarReleaseDate'] && strtotime($arCopydeal[STZ_osv_UF])!=strtotime($elementatr['CarReleaseDate'])) {
                                        $arParams = array_merge($arParams, [STZ_osv_UF => date("d.m.Y", strtotime($elementatr['CarReleaseDate']))]);
                                    }

                                    if($elementatr['Amount'] && $arCopydeal[STZ_cash_UF]!=$elementatr['Amount']) {
                                        $arParams = array_merge($arParams, [STZ_cash_UF => preg_replace("/[^\d]/", '', $elementatr['Amount'])]);
                                    }

                                    if(array_key_exists('ShippingType', $elementatr)) {
                                        if($elementatr['ShippingType']==0 && $arCopydeal[STZ_type_UF]!=STZ_type_por) {
                                            $arParams = array_merge($arParams, [STZ_type_UF => STZ_type_por]);
                                        } elseif($elementatr['ShippingType']==1 && $arCopydeal[STZ_type_UF]!=STZ_type_gru) {
                                            $arParams = array_merge($arParams, [STZ_type_UF => STZ_type_gru]);
                                        }
                                    }

                                    if($elementatr['DocStateName'] && $arCopydeal[STZ_status_UF]!=$stagestz['ID']) {
                                        $arParams = array_merge($arParams, [STZ_status_UF => $stagestz]);
                                    }

                                    if($elementatr['DocStateName'] && $arCopydeal['STAGE_ID']!=$stagestz['PROPERTIES']['KOD_ETAPA_SDELKI']['VALUE']) {
                                        $arParams = array_merge($arParams, ['STAGE_ID' => $stagestz['PROPERTIES']['KOD_ETAPA_SDELKI']['VALUE']]);
                                    }
                                    if($arParams) {
                                        $resud = $deal->Update($arCopydeal['ID'],$arParams);
                                        if($resud==1) {
                                            array_push($updateddeals, $arCopydeal['ID']);
                                        }
                                    }
                                }
                                if($res=='1' && $updateddeals) {
                                    $PROP = [
                                        'DATA_IMPORTA' => date('d.m.Y'),
                                        'ID_SDELKI' => $elementatr['ID'],
                                        'REZULTAT_IMPORTA' => 'Сделка '.$elementatr['ID'].' успешно обновлена, 
                                            также обновлены сделки в воронке приема заказа:'.implode(",", $updateddeals)
                                    ];
                                } elseif($res=='1' && !$updateddeals) {
                                    $PROP = [
                                        'DATA_IMPORTA' => date('d.m.Y'),
                                        'ID_SDELKI' => $elementatr['ID'],
                                        'REZULTAT_IMPORTA' => 'Сделка '.$elementatr['ID'].' успешно обновлена, скопированные сделки не найдены'
                                    ];
                                } else {
                                    $PROP = [
                                        'DATA_IMPORTA' => date('d.m.Y'),
                                        'ID_SDELKI' => $elementatr['ID'],
                                        'REZULTAT_IMPORTA' => 'Обновление сделок не имело места'
                                    ];
                                }
                                /*$PROP = [
                                    'DATA_IMPORTA' => date('d.m.Y'),
                                    'ID_SDELKI' => $elementatr['ID'],
                                    'REZULTAT_IMPORTA' => 'Сделка найдена, но в процессе обновления возникла ошибка'
                                ];*/
                            }
                        }

                        if($PROP) {
                            $arLoadProductArray = Array(
                                "IBLOCK_ID"      => $logib,
                                "PROPERTY_VALUES"=> $PROP,
                                "NAME"           => $elementatr['__rv']
                            );
                            $el->Add($arLoadProductArray);
                        }
                    }
                }
            }
        }
        return '\iTrack\Custom\Exchange\ExportImport::importDealSTZ();';
    }
}