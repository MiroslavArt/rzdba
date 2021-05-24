<?php

namespace iTrack\Custom\Exchange;

use Bitrix\Main\Loader;

class exportImport
{
    public function __construct()
    {
        Loader::includeModule('crm');
    }

    public static function exportContract($dataexport = array())
    {
        //echo "<pre>";
        //print_r($dataexport);
        //echo "</pre>";
        echo OneCDO_serv;
        echo OneCDO_login;
        echo OneCDO_pwd;

        $opt = json_encode($dataexport);
        //print_r($opt);
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
        echo "</pre>";
        // Очистка ресурсов
        curl_close($ch);
    }
}