<?php

namespace frontend\controllers;

use yii\web\Controller;

class MemberController extends Controller
{
    public $layout = "layout-ucenter";
    public function actionAuth(){

        return $this->render("auth");
    }

    public function actionLogin(){
        return $this->render("login");
    }
}