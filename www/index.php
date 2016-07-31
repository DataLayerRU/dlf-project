<?php
date_default_timezone_set('Europe/Moscow');

require_once("../vendor/autoload.php");


$app = new \project\Application();
$app->run();
