<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\UserModel;
use Yii;
use yii\data\Pagination;

class MemberController extends Controller {
    public $layout = "layout";

    // 添加用户
    public function actionAdd() {
        $model = new UserModel;
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->add($data)) {
                Yii::$app->session->setFlash('info', '添加用户成功');
            }
        }
        // 清空表单中浏览器保存的默认数据
        $model->userpass = "";
        $model->userrepass = "";
        return $this->render('/user/add', ['model' => $model]);
    }

    public function actionList() {
//        $model = UserModel::find(); // ?有时候用userModel，有时候用userModel::find
        $model = UserModel::find()->joinWith('profile'); // 对应getProfile
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['user'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $userList = $model->offset($pager->offset)->limit($pager->limit)->all();
//        var_dump($userList);die; // 关联表可能没值
        return $this->render("/user/list", ['userList' => $userList, 'pager' => $pager]);
    }

    public function actionEdit() {
        $userid = Yii::$app->request->get('id');
        $model = UserModel::find()->where('userid = :userid', [':userid' => $userid])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->edit($data)) {
                Yii::$app->session->setFlash('info', '用户更新成功');
            }
        }
        return $this->render("/user/edit", ['model' => $model]);
    }

    public function actionDel() {
        $userid = (int) Yii::$app->request->get('id');
        $model = new UserModel;
        if ($model->del($userid)) {
            Yii::$app->session->setFlash('info', '删除用户成功');
        }
        $this->redirect(['member/list']);
    }
}