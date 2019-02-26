<?php
/**
 * Created by PhpStorm.
 * User: 潞城
 * Date: 2019/2/26
 * Time: 23:35
 */

namespace frontend\controllers;

use yii\web\Controller;

class CartController extends Controller {
    public $layout = false;
    public function actionIndex() {
        return $this->render("index");
    }

    public function actionCheck() {
        return $this->render("check");
    }
}