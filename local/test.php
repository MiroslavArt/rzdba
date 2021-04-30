<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

use Bitrix\Transformer\Command;
use Bitrix\Transformer\FileTransformer;
$file = $_SERVER['DOCUMENT_ROOT'].'/upload/documentgenerator/fad/Счет_(Россия)_20.docx';
\Bitrix\Main\Loader::includeModule('transformer');
$result = FileTransformer::getTransformationInfoByFile($file);

echo '<pre>';
print_r($result);


// $file - абсолютный путь к файлу, ссылка на файл, ИД из b_file. ИД из b_file надо передавать как integer.
$foundFile = new \Bitrix\Transformer\File($file);
$publicPath = $foundFile->getPublicPath();
$command = Command::getByFile($publicPath);
// метод getByFile вернет объект \Bitrix\Transformer\Command или false, если файл не отправлялся на конвертацию
var_dump($command);
$error = $command->getError();

print_r($error);

// в результате вернет объект \Bitrix\Main\Error

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>