<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use backend\models\RbacModel;

class RbacController extends CommonController{
    public function actionCreateRole() {
        $this->layout = "layout";

        if (Yii::$app->request->isPost) {
            // RBAC交给authManage来处理，不用再单独创建model,也不用往视图传递model
            $auth = Yii::$app->authManager;
            $role = $auth->createRole(null); // 不知道创建的名称时候，默认传参给null, $role是用来管理***？表的，$role不能用来传递activeForm

            $post = Yii::$app->request->post();
            $role->name = $post['name'];
            $role->description = $post['description'];
            $role->ruleName = !empty($post['rule_name']) ? $post['rule_name'] : null;
            $role->data = !empty($post['data']) ? $post['data'] : null;
            if ($auth->add($role)) {
                Yii::$app->session->setFlash('info', '创建角色成功');
            }
        }

        return $this->render('_createitem');
    }

    public function actionRoles() {
        $this->layout = "layout";

        $auth = Yii::$app->authManager;
        $data = new ActiveDataProvider([
            'query' => (new Query)->from($auth->itemTable)->where('type = 1')->orderBy('created_at desc'),
            'pagination' => ['pageSize' => 5],
        ]);
        return $this->render('_items', ['dataProvider' => $data]);
    }

    // 给角色分配子角色，或者权限
    public function actionAssignItem($name) {
        $this->layout = "layout";

        // 渲染一个模板，可以选择权限或者子角色，保存
        $name = htmlspecialchars($name);

        // 需要所有的角色和权限
        $auth = Yii::$app->authManager;
        $parent = $auth->getRole($name);

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if (RbacModel::addChild($name, $data['children'])) {
                Yii::$app->session->setFlash('info', '分配权限成功');
            }
        }

        $children = RbacModel::getChildrenByName($name);
        $roles = RbacModel::getOptions($auth->getRoles(), $parent); // 获取所有角色
        $permissions = RbacModel::getOptions($auth->getPermissions(), $parent);

        // 不方便使用checkbox，重组数据
        return $this->render('_assignitem', ['parent' => $name, 'roles' => $roles, 'children' => $children, 'permissions' => $permissions]);
    }
}