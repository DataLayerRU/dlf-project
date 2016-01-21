<?php

namespace project;

use pwf\basic\RouteHandler;
use Symfony\Component\Yaml\Yaml;

class Application extends \pwf\basic\Application
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