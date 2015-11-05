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
        RouteHandler::registerHandler('/registration',
            '\project\controllers\RegistrationController::index');
        RouteHandler::registerHandler('/registration/success',
            '\project\controllers\RegistrationController::success');
        RouteHandler::registerHandler('/login',
            '\project\controllers\LoginController::index');
        RouteHandler::registerHandler('/logout',
            '\project\controllers\LoginController::logout');
        RouteHandler::registerHandler('/post/create',
            '\project\controllers\PostController::create');
        RouteHandler::registerHandler('/post/view',
            '\project\controllers\PostController::view');
        RouteHandler::registerHandler('/comment/create',
            '\project\controllers\CommentController::create');

        $this->getResponse()->setHeaders([
            "Access-Control-Allow-Headers: Content-Type",
            "Content-Type:text/html; charset=utf-8"
        ]);


        if (($token = $this->getRequest()->getCookie('auth-token')) !== null) {
            $model = new LoginForm(Application::getComponent('db'));
            if ($model->getByAuthToken($token)->getAttribute('id') > 0) {
                $this->getComponent('auth')->setIdentity($model);
            }
        }
    }
}