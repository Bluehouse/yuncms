<?php

namespace backend\controllers;

use yii\web\Controller;
use Yii;

class CommonController extends Controller{
    // 前置方法(所有aciton执行之前执行),获取控制器和方法名，跟权限列表进行比对
    public function beforeAction($action) {
        $this->layout = "layout";
//        var_dump(Yii::$app->params['adminmenu']);die;
//        var_dump(Yii::$app->user->isGuest);die;
        if (!parent::beforeAction($action)) { // ?不太理解
            return false;
        }

        $controller = $action->controller->id;
        $actionName = $action->id;

        if (Yii::$app->user->can($controller . '/*')) { // 不是Yii::$app->admin->can，可以打印数据看下
            return true;
        }

        if (Yii::$app->user->can($controller . '/' . $actionName)) {
            return true;
        }
        return true;
//        throw new \yii\web\unAuthorizedHttpException('没有'. $controller . '/'. $actionName . '权限!');
    }
    public function init() {
        // 该方法内无法准备获取到controller和action名称
//        var_dump(Yii::$app->controller); // 得到的为null
    }
}