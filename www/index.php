<?php
date_default_timezone_set('Europe/Moscow');

require_once("../vendor/autoload.php");
require_once("../vendor/professionalweb/pwf/framework/autoloader/Autoloader.php");

\pwf\autoloader\Autoloader::Register(new \pwf\autoloader\Basic());


$app = new \project\Application();
$app->run();
