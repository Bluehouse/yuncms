<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\AdminModel;
use Yii;
use yii\data\Pagination;

class ManageController extends Controller{
    public function actionMailChangePass() {
        $model = new AdminModel;
        if (!Yii::$app->request->isPost) {
            // 获取邮件链接数据
            $time = Yii::$app->request->get('timestamp');
            $adminuser = Yii::$app->request->get('adminuser');
            $token = Yii::$app->request->get('token');

            // 比对数据(token正确，并且没有过期)

            $mytoken = $model->createToken($adminuser, $time);

            if ($token != $mytoken) {
//                $this->addError("adminrepass", "验证失败");
                $this->redirect(['public/login']);
                Yii::$app->end();
            }
            if (time() - $time > 300){
//                $this->addError('adminrepass', '邮件已超时');
                $this->redirect(['public/login']);
                Yii::$app->end();
            }

            $model->adminuser = $adminuser;
        } else {
            $data = Yii::$app->request->post();
            if ($model->changePass($data)) {
                Yii::$app->session->setFlash('info', '密码修改成功');
            }
        }

        return $this->renderPartial('changepass', ['model' => $model]);
    }

    // 管理员列表
    public function actionList() {
        $this->layout = "layout";
//        $adminList = AdminModel::find()->all();
        $model = AdminModel::find();
        $pageSize = Yii::$app->params['pageSize']['manage'];
        $count = $model->count();
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $adminList = $model->offset($pager->offset)->limit($pager->limit)->all();
        return $this->render("list", ['adminList' => $adminList, 'pager' => $pager]);
    }

    public function actionAdd() {
        $this->layout = "layout";

        return $this->render("add");
    }
}