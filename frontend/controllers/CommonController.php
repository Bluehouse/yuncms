<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\CategoryModel;

class CommonController extends Controller{
    public function init() {
        $menu = CategoryModel::getMenu();
        // 将查询到的数据存入$this->>view，可供其他方法和layout使用
        $this->view->params['menu'] = $menu;
    }
}