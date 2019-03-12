<?php

namespace backend\controllers;

use Yii;
use common\models\OrderModel;
use yii\data\Pagination;

class OrderController extends CommonController{
    public $layout = "layout";

    public function actionList() {

        // 查询所有订单信息
        $model = OrderModel::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['order'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        $data = $model->offset($pager->offset)->limit($pager->limit)->all();
        $data = OrderModel::getDetail($data);

        return $this->render('list', ['data' => $data, 'pager' => $pager]);
    }
}