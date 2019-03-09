<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use common\models\AddressModel;

class AddressController extends CommonController{
    public $layout = false;

    public function actionAdd() {
        // 判断是否登陆
//        if (Yii::$app->session['isLogin'] != 1) {
//            return $this->redirect(['member/auth']);
//        }

        // POST获取数据
        $userid = 1;
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            $post['AddressModel']['userid'] = $userid;
            $post['AddressModel']['createtime'] = time();

            // 插入数据库，关闭弹层
            $model = new AddressModel;
            $model->load($post) && $model->save();
        }

        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionEdit() {

    }

    public function actionDel() {
        //        if (Yii::$app->session['isLogin'] != 1) {
//            return $this->redirect(['member/auth']);
//        }

        // 删除地址
        $addressid = Yii::$app->request->get('aid');
        AddressModel::deleteAll("addressid = :aid", [':aid' => $addressid]);

        // 跳转上一页
        return $this->redirect($_SERVER['HTTP_REFERER']);
    }

    public function actionSetDefault() {

    }
}