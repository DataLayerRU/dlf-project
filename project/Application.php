<?php

namespace project;

use dlf\basic\RouteHandler;
use Symfony\Component\Yaml\Yaml;

class Application extends \dlf\basic\Application
{

    public function __construct()
    {
        parent::__construct(Yaml::parse(file_get_contents('../project/config/config.yaml')));

        RouteHandler::registerHandler('/',
            '\project\controllers\MainController::index');

        $this->getResponse()->setHeaders([
            "Access-Control-Allow-Headers: Content-Type",
            "Content-Type:text/html; charset=utf-8"
        ]);
    }
}