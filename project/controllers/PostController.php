<?php

namespace project\controllers;

use project\Application;
use project\models\PostModel;
use project\models\CommentModel;

class PostController extends \dlf\basic\Controller
{

    public function create()
    {
        if (!Application::$instance->getComponent('auth')->isAuthorized()) {
            throw new \Exception('Forbidden', 301);
        }

        $request = Application::$instance->getRequest();

        $model = new PostModel(Application::$instance->getComponent('db'));
        $model->setAttribute('id_user', Application::$instance->getComponent('auth')->getIdentity()->getAttribute('id'));
        $model->setAttribute('adate', time());

        if ($request->isPost() && $model->validate($request->getRequestParams())
            && $model->save()
        ) {
            Application::$instance->getResponse()->redirect('/post/view?id=' . $model->getAttribute('id'));
        }

        return $this->render('project/views/post/create.php',
            [
                'model' => $model
            ]);
    }

    public function view()
    {
        $id = Application::$instance->getRequest()->get('id');

        $comments = CommentModel::getAllByPostId(Application::$instance->getComponent('db'), $id);

        return $this->render('project/views/post/view.php',
            [
                'model' => $this->getModel($id),
                'comments' => $comments
            ]);
    }

    protected function getModel($id)
    {
        if (empty($id) || ($model = (new PostModel(Application::$instance->getComponent('db')))->getOne($id))
            === null
        ) {
            throw new \Exception('Page not found', 404);
        }

        return $model;
    }
}