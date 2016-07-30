<?php
date_default_timezone_set('Europe/Moscow');

require_once("../vendor/autoload.php");

\pwf\autoloader\Autoloader::Register(new \pwf\autoloader\Basic());


$app = new \project\Application();
$app->run();
