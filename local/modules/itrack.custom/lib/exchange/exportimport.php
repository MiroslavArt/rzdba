<?php

namespace iTrack\Custom\Exchange;

use Bitrix\Main\Loader;

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
            unset($dataexport['Disk_id']);
        }

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
        //print_r($output);

        $obj = json_decode($output,true);

        // Очистка ресурсов
        curl_close($ch);

        if($obj['UID']) {
            return $obj['UID'];
        } else {
            return "Ошибка в процессе создания договора";
        }
    }
}