<?php

namespace project\controllers;

class MainController extends \dlf\basic\Controller
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