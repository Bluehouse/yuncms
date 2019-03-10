<?php

namespace frontend\controllers;

use common\models\OrderModel;
use Yii;

class PayController extends CommonController{

    // 关闭csrf验证
    public $enableCsrfValidation = false;

    // 同步通知，显示订单支付状态
    public functiono actionReturn(){
        $this->layout = false;

        $status = Yii::$app->request->get('trade_status');
        $orderstatus = $status == OrderModel::TRADESUCCESS ? 'ok' : 'no';

        return $this->render('status', ['orderstatus' => $orderstatus]);
    }

    // 异步通知，修改订单状态
    public function actionNotify() {
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post();
            if (Pay::notify($post)) {
                echo "sucess";
                exit;
            }
            echo 'faild';
            exit;
        }
    }
}