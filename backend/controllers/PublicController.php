<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\AdminModel; // 引入之后，可以通过model调用activeForm表单
use Yii;

class PublicController extends Controller
{
    public function actionLogin(){
        $this->layout = false;
        $model = new AdminModel();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->login($data)) {
                $this->redirect(["index/index"]);
            }
        }

        return $this->render("login", ['model' => $model]);
    }

    // 找回密码
    public function actionSeekpass(){
        $model = new AdminModel;
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->seekpass($data)) {
                Yii::$app->session->setFlash('info', '邮件已发送到你的邮箱，请注意查收');
            }
        }
        return $this->renderPartial("seekpass", ['model' => $model]);
    }

    public function actionLogout(){
        Yii::$app->session->removeAll();
        if (!isset(Yii::$app->session['admin']['isLogin'])) {
            $this->redirect(['public/login']);
        }
    }
}