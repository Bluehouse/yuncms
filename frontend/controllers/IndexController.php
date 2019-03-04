<?php

namespace frontend\controllers;

class IndexController extends CommonController
{
    public function actionIndex() {
//        $this->layout = false; // 不是用公共layout
        $this->layout = "layout";
        return $this->render("index");
    }
}