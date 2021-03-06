<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class itrack_custom extends \CModule
{
    /**
     * @return string
     */
    public static function getModuleId()
    {
        return basename(dirname(__DIR__));
    }

    public function __construct()
    {
        $arModuleVersion = array();
        include(dirname(__FILE__) . "/version.php");
        $this->MODULE_ID = self::getModuleId();
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("ITRACK_CUSTOM_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("ITRACK_CUSTOM_MODULE_DESC");

        $this->PARTNER_NAME = Loc::getMessage("ITRACK_CUSTOM_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("ITRACK_CUSTOM_PARTNER_URI");
    }

    public function installEvents()
    {
        $eventManager = Bitrix\Main\EventManager::getInstance();
        $eventManager->registerEventHandler('main','OnProlog','itrack.custom','\iTrack\Custom\EventHandlers\Main','onProlog');
    }

    public function uninstallEvents()
    {
        $eventManager = Bitrix\Main\EventManager::getInstance();
        $eventManager->unRegisterEventHandler('main','OnProlog','itrack.custom','\iTrack\Custom\EventHandlers\Main','onProlog');
    }

    function InstallDB()
    {
        global $APPLICATION, $DB;
        $bInstall = true;

        $errors = false;
        //$errors = $DB->RunSQLBatch(__DIR__.'/db/'.strtolower($DB->type).'/install.sql');

        if ($errors !== false)
        {
            $APPLICATION->throwException(implode('', $errors));
            $bInstall = false;
        } else {

        }

        return $bInstall;
    }

    function UnInstallDB()
    {
        global $APPLICATION, $DB;
        $bInstall = true;

        $errors = false;
        //$errors = $DB->RunSQLBatch(__DIR__.'/db/'.strtolower($DB->type).'/uninstall.sql');

        if ($errors !== false)
        {
            $APPLICATION->throwException(implode('', $errors));
            $bInstall = false;
        }

        return $bInstall;
    }

    public function doInstall()
    {
        try {
            $this->InstallDB();
            $this->installEvents();
            Main\ModuleManager::registerModule($this->MODULE_ID);
        } catch (\Exception $e) {
            global $APPLICATION;
            $APPLICATION->ThrowException($e->getMessage());

            return false;
        }

        return true;
    }

    public function doUninstall()
    {
        try {
            $this->uninstallEvents();
            Main\ModuleManager::unRegisterModule($this->MODULE_ID);
            $this->UnInstallDB();
        } catch (\Exception $e) {
            global $APPLICATION;
            $APPLICATION->ThrowException($e->getMessage());

            return false;
        }

        return true;
    }
}