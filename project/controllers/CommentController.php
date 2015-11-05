<?php

namespace project\controllers;

use project\Application;
use project\models\CommentModel;

class CommentController extends \dlf\basic\Controller
{

    public function create()
    {
        $request = Application::$instance->getRequest();

        $model = new CommentModel(Application::$instance->getComponent('db'));
        if (Application::$instance->getComponent('auth')->isAuthorized()) {
            $model->setAttribute('id_user', Application::$instance->getComponent('auth')->getIdentity()->getAttribute('id'));
            $model->setAttribute('username', Application::$instance->getComponent('auth')->getIdentity()->getAttribute('username'));
        }
        $model->setAttribute('adate', time());

        if ($request->isPost() && $model->validate($request->getRequestParams())
            && $model->save()
        ) {
            Application::$instance->getResponse()->redirect('/post/view?id=' . $model->getAttribute('id_post'));
        }
    }
}