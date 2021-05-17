<?php

use Itrack\Custom\Helpers\Utils;

define('STOP_STATISTICS', true);
define('NO_AGENT_CHECK', true);
define('DisableEventsCheck', true);
define('BX_SECURITY_SHOW_MESSAGE', true);


//extranet users visibility
const SHOW_ALL = 1;
const SHOW_FROM_MY_GROUPS = 2;
const SHOW_NONE = 3;
const SHOW_FROM_EXACT_GROUP = 4;

/** @var CAllUser $USER */
/** @var CCacheManager $CACHE_MANAGER */

$SITE_ID = '';
if (isset($_GET["SITE_ID"]) && is_string($_GET['SITE_ID']))
	$SITE_ID = mb_substr(preg_replace("/[^a-z0-9_]/i", "", $_GET["SITE_ID"]), 0, 2);

if($SITE_ID != '')
	define("SITE_ID", $SITE_ID);

$showUsers = (isset($_GET["SHOW_USERS"]) && $_GET["SHOW_USERS"] == "N" ? false : true);

$showExtranetUsers = SHOW_ALL;

if(!isset($_GET["SHOW_EXTRANET_USERS"]) || $_GET["SHOW_EXTRANET_USERS"] == "ALL")
{
	$showExtranetUsers = SHOW_ALL;
}
elseif ($_GET["SHOW_EXTRANET_USERS"] == "FROM_MY_GROUPS") //used when inviting to groups
{
	$showExtranetUsers = SHOW_FROM_MY_GROUPS;
}
elseif ($_GET["SHOW_EXTRANET_USERS"] == "FROM_EXACT_GROUP") //used in calendars
{
	if (isset($_GET["EX_GROUP"]) && intval($_GET["EX_GROUP"]) > 0)
	{
		$showExtranetUsers = SHOW_FROM_EXACT_GROUP;
		$exGroupID = intval($_GET["EX_GROUP"]);
	}
	else
		$showExtranetUsers = SHOW_NONE;
}
elseif ($_GET["SHOW_EXTRANET_USERS"] == "NONE")
{
	$showExtranetUsers = SHOW_NONE;
}

if (isset($_GET["GROUP_SITE_ID"]) && is_string($_GET["GROUP_SITE_ID"]))
	$GLOBALS["GROUP_SITE_ID"] = mb_substr(preg_replace("/[^a-z0-9_]/i", "", $_GET["GROUP_SITE_ID"]), 0, 2);
elseif($SITE_ID != '')
	$GLOBALS["GROUP_SITE_ID"] = $SITE_ID;

require_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
require_once("functions.php");

CModule::IncludeModule('intranet');

if (!$USER->IsAuthorized())
	die;

__IncludeLang(dirname(__FILE__).'/lang/'.LANGUAGE_ID.'/'.basename(__FILE__));


if (isset($_REQUEST["nt"]))
{
	//todo not so good
	preg_match_all("/(#NAME#)|(#NOBR#)|(#\/NOBR#)|(#LAST_NAME#)|(#SECOND_NAME#)|(#NAME_SHORT#)|(#SECOND_NAME_SHORT#)|\s|\,/", urldecode($_REQUEST["nt"]), $matches);
	$nameTemplate = str_replace("#COMMA#", ',', implode("", $matches[0]));
}
else
{
	$nameTemplate = CSite::GetNameFormat(false);
}

if ($_REQUEST['MODE'] == 'SEARCH')
{
	CUtil::JSPostUnescape();
	$APPLICATION->RestartBuffer();
	$search = $_REQUEST['SEARCH_STRING'];
	$arUsers = array();

	if (GetFilterQuery("TEST", $search))
	{
		$arSearch = preg_split('/\s+/', trim($search), ($words_limit = 10)+1);
		unset($arSearch[$words_limit]);

		$sortExpr  = '0';
		$sqlHelper = \Bitrix\Main\Application::getConnection()->getSqlHelper();
		foreach ($arSearch as $word)
		{
			$word = str_replace('%', '%%', $word);
			$word = $sqlHelper->forSql($word);

			$sortExpr .= sprintf(
				'+(CASE WHEN %s THEN 3 WHEN %s THEN 2 WHEN %s THEN 1 ELSE 0 END)',
				"(%1\$s LIKE '%%" . $word . "%%')",
				"(%2\$s LIKE '%%" . $word . "%%')",
				"(%3\$s LIKE '%%" . $word . "%%')"
			);
		}

		$sortWeight = new \Bitrix\Main\Entity\ExpressionField('SORT_WEIGHT', $sortExpr, array('LAST_NAME', 'NAME', 'SECOND_NAME'));

		$arFilter = array(
		    '%NAME' => $arSearch,
            'PROPERTY_SOSTOYANIE'=>IBPL_SOST
		);

        $planib = Utils::getIDIblockByCode(IBPL_PLAN, IBPL_TYPE);
        $plans = Utils::getIBlockElementsByConditions($planib, $arFilter);

        $arPlans = [];

        foreach($plans as $plan) {
            $arPlans[] = array(
                'ID' => $plan['ID'],
                'NAME' => $plan['NAME'],
            );
        }
	}

	Header('Content-Type: application/x-javascript; charset='.LANG_CHARSET);
    echo CUtil::PhpToJsObject(array_values($arPlans));
	die;
}
?>