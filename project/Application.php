<?php

namespace project;

use dlf\basic\RouteHandler;
use project\models\LoginForm;

class Application extends \dlf\basic\Application
{

    public function __construct()
    {
        parent::__construct(require_once('../project/config/db.php'));

        RouteHandler::registerHandler('/',
            '\project\controllers\MainController::index');

        $this->getResponse()->setHeaders([
            "Access-Control-Allow-Headers: Content-Type",
            "Content-Type:text/html; charset=utf-8"
        ]);
    }
}