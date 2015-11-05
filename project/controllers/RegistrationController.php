<?php

namespace project\controllers;

use dlf\web\Response;
use project\Application;
use project\models\UserModel;

class RegistrationController extends \dlf\basic\Controller
{

    public function index()
    {
        $model = new UserModel(Application::$instance->getComponent('db'));

        $request = Application::$instance->getRequest();

        if ($request->isPost() && $model->validate($request->getRequestParams())
            && $model->save()
        ) {
            Application::$instance->getResponse()->redirect('/registration/success');
        }

        return $this->render('project/views/registration/index.php',
            [
                'model' => $model
            ]);
    }

    public function success()
    {
        return $this->render('project/views/registration/success.php');
    }
}