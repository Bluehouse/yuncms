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

        // 未登录跳转到登录
        if (!isset(Yii::$app->session['isLogin'])) {
            $this->redirect(['member/login']);
            return false;
        }

        return $this->redirect(['cart/index']);
    }
}