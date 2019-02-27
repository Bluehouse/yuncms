<?php

namespace frontend\controllers;

use yii\web\Controller;

class IndexController extends Controller
{
    public function actionIndex() {
//        $this->layout = false; // 不是用公共layout
        $this->layout = "layout";
        return $this->render("index");
    }
}