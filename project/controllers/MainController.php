<?php

namespace project\controllers;

use project\models\PostModel;

class MainController extends \dlf\basic\Controller
{

    public function index()
    {
        $this->title = 'Глваная страница';

        return $this->render('project/views/main/index.php',
                [
                'name' => 'World!',
                'posts' => PostModel::getAll(\project\Application::$instance->getComponent('db'))
        ]);
    }
}