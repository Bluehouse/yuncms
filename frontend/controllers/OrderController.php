<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\OrderModel;
use common\models\OrderDetailModel;
use common\models\ProductModel;
use common\models\CartModel;
use Yii;

class OrderController extends CommonController {
    public $layout = false;
    public function actionIndex() {
        return $this->render("index");
    }

    public function actionCheck() {
        // 判断是否登录

        // 查询地址信息


        // 查询订单详情

        // 查询
        return $this->render("check");
    }

    // 创建订单
    public function actionAdd() {
        $this->layout = false;
        // 未登录的跳转到登录
        $session = Yii::$app->session;
//        if ($session['isLogin'] != 1) {
//            return $this->redirect(['member/auth']);
//        }
        $trans = Yii::$app->db->beginTransaction();
        try {
            // 获取订单信息
            if (Yii::$app->request->isPost) {
                $post = Yii::$app->request->post();
//                $userid = Yii::$app->session['userid'];
                $userid = 1; // 应该从cookie或者用户表中取值

                // 写入order表,初始化一个订单信息(orderid, userid,status,createtime固定不变的内容)，后续确认订单时候，更新此订单的信息
                $orderModel = new OrderModel;
                $orderModel->scenario = "orderadd";
                $orderModel->userid = $userid;
                $orderModel->status = OrderModel::CREATEORDER;
                $orderModel->createtime = time();
                if (!$orderModel->save()) {
                    throw new \Exception();
                }
                $orderid = $orderModel->getPrimaryKey();

                // 写入orderDetail表,productid,price,productnum, “orderid,createtime”
                $model = new OrderDetailModel;
                foreach($post['orderDetail'] as $product) {
                    $product['orderid'] = $orderid;
                    $product['createtime'] = time();
                    $data['orderDetailModel'] = $product;
                    if (!$model->add($data)) {
//                        throw new \Exception(); // 为什么报错？
                    }
                    // 删除购物车数据?
                    CartModel::deleteAll('productid = :pid', [':pid' => $product['productid']]);
                    // 减少商品库存
//                    ProductModel::updateAllCounters(['num' => - $product['productnum']], 'productid = :pid', [':pid' => $product['productid']]);
                }
                $trans->commit();
            }
        } catch(\Exception $e) {
            $trans->rollback();
            throw new \Exception($e);
            return $this->redirect(['cart/index']);
        }

        return $this->redirect(['order/check', 'orderid' => $orderid]);
    }
}