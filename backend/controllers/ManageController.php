<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\AdminModel;
use Yii;
use yii\data\Pagination;
use backend\models\RbacModel;

class ManageController extends CommonController{
    // 找回密码
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
        $adminList = $model->offset($pager->offset)->limit($pager->limit)->all(); // 控制器里直接操作model方法
        return $this->render("list", ['adminList' => $adminList, 'pager' => $pager]);
    }

    // 添加管理员
    public function actionAdd() {
        $this->layout = "layout";
        $model = new AdminModel;
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->add($data)) {
                Yii::$app->session->setFlash('info',"管理员添加成功！");
            }
        }
        return $this->render("add", ['model' => $model]);
    }

    // 编辑管理员
    public function actionEdit($id){
        $this->layout = "layout";

        $adminid = (int)Yii::$app->request->get('id');
        if (!is_numeric($adminid)) {
            $this->redirect(['manage/list']);
        }

        $model = AdminModel::find()->where('adminid = :adminid', ['adminid' => $adminid])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->edit($data)) {
                Yii::$app->session->setFlash('info', '编辑成功');
            }
        } else {
            $model->adminpass = "";
            $model->adminrepass = "";
        }

        return $this->render('edit', ['model' => $model]);
    }

    // 删除管理员
    public function actionDel(){
        $adminid = (int)Yii::$app->request->get('id');
        if (!is_numeric($adminid)) {
            $this->redirect(['manage/list']);
        }
        $model = new AdminModel;
        if ($model->del($adminid)) {
            Yii::$app->session->setFlash('info', '管理员删除成功');
        } else {
            Yii::$app->session->setFlash('info', '管理员删除失败');
        }

        $this->redirect(['manage/list']);
    }

    // 用户授权
    public function actionAssign() {
        $this->layout = "layout";

        $adminid = (int)Yii::$app->request->get('aid');
        if (empty($adminid)) {
            return false; // 参数为空
        }

        // 判断用户是否存在
//        if (!AdminModel::find()->where('adminid = :aid', [':aid' => $aid])->one()) {
        $admin = AdminModel::findOne($adminid);
        if (empty($admin)) {
            return false; // admin不存在
        }

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $children = empty($data['children']) ? [] : $data['children'];
            if (RbacModel::grant($adminid, $children)) {
                Yii::$app->session->setFlash('info', '授权成功');
            }
        }

        // 查询出所有角色和权限的子节点
        $auth = Yii::$app->authManager;
        $roles = RbacModel::getOptions($auth->getRoles(), null);
        $permissions = RbacModel::getOptions($auth->getPermissions(), null);
        // 重组成checkbox数据格式
        $children = RbacModel::getChildrenByUser($adminid);

        return $this->render('assign', ['roles' => $roles, 'permissions' => $permissions, 'admin' => $admin->adminuser, 'children' => $children]);
    }
}