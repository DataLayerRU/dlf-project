<?php
date_default_timezone_set('Europe/Moscow');

require_once("../vendor/autoload.php");
require_once("../vendor/datalayerru/dlf/autoloader/Autoloader.php");

\dlf\autoloader\Autoloader::Register(new \dlf\autoloader\Basic());


$app = new \project\Application();
$app->run();
