<?php

namespace project\controllers;

class MainController extends \pwf\basic\Controller
{

    public function index()
    {
        $this->title = 'Main page';

        return $this->render('project/views/main/index.php',
            [
                'name' => 'World!'
            ]);
    }
}