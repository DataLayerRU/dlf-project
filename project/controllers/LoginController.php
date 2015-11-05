<?php

namespace project\controllers;

use dlf\web\Response;
use project\Application;
use project\models\LoginForm;

class LoginController extends \dlf\basic\Controller
{

    public function index()
    {
        if (Application::$instance->getComponent('auth')->isAuthorized()) {
            Application::$instance->getResponse()->redirect('/');
        }

        $model = new LoginForm(Application::$instance->getComponent('db'), Application::$instance->getRequest()->get());

        $request = Application::$instance->getRequest();

        if ($request->isPost() && $model->login()) {
            Application::$instance->getComponent('auth')->setIdentity($model);
            Application::$instance->getResponse()->redirect('/');
        }

        return $this->render('project/views/login/index.php',
            [
                'model' => $model
            ]);
    }

    public function logout()
    {
        Application::$instance->getComponent('auth')->clearIdentity();
        Application::$instance->getResponse()->redirect('/');
    }
}