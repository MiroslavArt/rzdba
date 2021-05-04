<?php
use Bitrix\Main\Context;
\Bitrix\Main\Diag\Debug::writeToFile($_REQUEST, "request", "__miros.log");
\Bitrix\Main\Diag\Debug::writeToFile($_POST, "post", "__miros.log");
\Bitrix\Main\Diag\Debug::writeToFile($_GET, "get", "__miros.log");
$context = Context::getCurrent();
$request = $context->getRequest();

\Bitrix\Main\Diag\Debug::writeToFile($arResult, "arresult", "__miros.log");