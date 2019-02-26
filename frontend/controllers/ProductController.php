<?php
/**
 * Created by PhpStorm.
 * User: 潞城
 * Date: 2019/2/26
 * Time: 23:18
 */

namespace frontend\controllers;

use yii\web\Controller;

class ProductController extends Controller
{
    public $layout = false;

    public function actionIndex(){
        return $this->render("index");
    }

    public function actionDetail() {
        return $this->render("detail");
    }
}