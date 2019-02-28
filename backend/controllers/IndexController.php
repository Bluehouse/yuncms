<?php

namespace backend\controllers;

use yii\web\Controller;

class IndexController extends Controller{
    public function actionIndex(){
        $this->layout = "layout";
        return $this->render("/public/index"); // 引入其他目录模板
    }
}