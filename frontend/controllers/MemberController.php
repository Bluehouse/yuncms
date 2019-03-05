<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use common\models\UserModel;

class MemberController extends CommonController
{
    public $layout = "layout-ucenter";
    public function actionAuth(){
        return $this->render("auth");
    }

    public function actionLogin() {
        $model = UserModel::find();

        if (Yii::$app->request->isPost) {
            // 获取表单数据
            $data = Yii::$app->request->post();

            // 校验是否用户是否存在，密码是否正确
            if ($) {

            }

            // 跳转到上一页
        }

        return $this->render("login");
    }

    // 注册
    public function actionReg() {

        $model = new UserModel;

        if (Yii::$app->request->isPost) {
            // 获取表单数据
            $data = Yii::$app->request->post();

            // 提交到model保存
            if ($model->load($data) && $model->save()) {
                Yii::$app->session->setFlash('info', '注册成功');
            }

            // 跳转到登录页
            $this->redirect(['member/login']);
        }

        // 非提交直接渲染页面
        return $this->render('reg', ['model' => $model]);
    }
}