<?php

namespace backend\models;

use yii\rbac\Rule;
use common\models\CategoryModel;
use Yii;

class AuthRule extends Rule {
    // 供rule规则调用
    public $name = "isAuthor";

    // rule是权限校验外的额外校验
    public function execute($user, $item, $param) {
        $action = yii::$app->controller->action->id;
        if ($aciton == 'delete') {
            $cateid= Yii::$app->request->get('id');
            $cate = CategoryModel::findOne($cateid);
            return $cate->adminid = $user;
        }

        return true;
    }
}