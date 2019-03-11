<?php

namespace frontend\controllers;

use Yii;

class IndexController extends CommonController
{
    public function actionIndex() {
//        $this->layout = false; // 不是用公共layout
        Yii::warning('this is a test warning');
        $this->layout = "layout";
        return $this->render("index");
    }
}