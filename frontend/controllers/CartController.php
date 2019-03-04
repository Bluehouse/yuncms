<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\UserModel;
use common\models\CartModel;
use Yii;

class CartController extends Controller {
    public function actionIndex() {
        $this->layout = false;
        return $this->render("index");
    }

    public function actionAdd() {
        $this->layout = false;

        return $this->redirect(['cart/index']);
    }
}