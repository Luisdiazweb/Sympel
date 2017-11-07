<?php

namespace app\controllers;


class DashboardController extends AdminController
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}