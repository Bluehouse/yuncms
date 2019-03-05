<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;

class IndexController extends CommonController{
    public function actionIndex(){
        $this->layout = "layout";
        return $this->render("/public/index"); // 引入其他目录模板
    }
}