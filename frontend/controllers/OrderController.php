<?php

namespace frontend\controllers;

use yii\web\Controller;
use common\models\OrderModel;
use common\models\OrderDetailModel;
use common\models\ProductModel;
use common\models\CartModel;
use common\models\AddressModel;
use Yii;

class OrderController extends CommonController {
    public $layout = false;
    public function actionIndex() {
        return $this->render("index");
    }

    // 订单确认，收银台
    public function actionCheck() {
        // 判断是否登录
//        if (Yii::$app->session['isLogin'] != 1) {
//            $this->redicret(['member/auth']);
//        }

        // 查询地址信息
        $userid = 1;
        $addressModel = new AddressModel;
        $addressList = AddressModel::find()->where('userid = :uid', [':uid' => $userid])->asArray()->all();

        // 查询订单详情,如果已经支付，则不再进入订单确认页面
        $orderid = Yii::$app->request->get('orderid');
        $orderInfo = OrderModel::findOne($orderid);
        if ($orderInfo && $orderInfo->status != OrderModel::CREATEORDER && $orderInfo->status != OrderModel::CHECKORDER) {
            $this->redirect(['order/index']);
        }

        $orderDetail = OrderDetailModel::find()->where('orderid = :oid', [':oid' => $orderid])->asArray()->all();
        $productDetail = [];
        foreach($orderDetail as $detail) {
            $proInfo = ProductModel::findOne($detail['productid']);
            $detail['title'] = $proInfo->title;
            $detail['cover'] = $proInfo->cover;
            $productDetail[] = $detail;
        }

        // 查询快递信息
        $express = Yii::$app->params['express'];
        $expressPrice = Yii::$app->params['expressPrice'];

        return $this->render("check", ['express' => $express, 'addressList' => $addressList, 'expressPrice' => $expressPrice, 'productDetail' => $productDetail, 'addressModel' => $addressModel]);
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
                foreach($post['orderDetail'] as $product) {
                    $model = new OrderDetailModel; // 这个放到外部的话，只会插入一遍？不是单例？？
                    $product['orderid'] = $orderid;
                    $product['createtime'] = time();
                    $data['OrderDetailModel'] = $product; // 接收数据的Model名称首字母必须大写！否则会报错exception 'Exception'
                    if (!$model->add($data)) {
                        throw new \Exception(); // 为什么报错？
                    }
                    // 减少商品库存，如果商品超卖，num - 1 < 0 , 因为库存定义为int unsigned，MySQL会报错Numeric value out of range: 1690 BIGINT UNSIGNED value is out of range
                    ProductModel::updateAllCounters(['num' => -$product['productnum']], 'productid = :pid', [':pid' => $product['productid']]);
                }
                // 删除当前用户的购物车数据
                CartModel::deleteAll('userid = :uid', [':uid' => $userid]);
                $trans->commit();
            }
        } catch(\Exception $e) {
            $trans->rollback();
            throw new \Exception($e);
            return $this->redirect(['cart/index']);
        }

        return $this->redirect(['order/check', 'orderid' => $orderid]);
    }

    // 确认订单就是更新订单，订单主要有两个点：判断价格和库存
    public function actionConfirm() {
        // addressid,expressid,status,amount
        if (Yii::$app->request->isPost) {
            $post = Yii::$app->request->post(); // addressid,expressid
            $userid = 1;
            $model = OrderModel::find()->where('orderid = :oid and userid = :uid', [':oid' => $post['orderid'], ':uid' => $userid])->one();
            if ($model) {
                $model->scenario = "orderupdate";
                $post['status'] = OrderModel::CHECKORDER;

                // 计算商品总价格
                $details = OrderDetailModel::find()->where('orderid = :oid', [':oid' => $post['orderid']])->all(); // 前台已经计算好了，为什么又要取数据？
                $amount = 0;
                foreach($details as $detail) {
                    $amount += $detail->productnum * $detail->price;
                }
                if ($amount < 0) {
                    $amount = 0; // 校验价格是应该的
                }
                $expressPrice = Yii::$app->params['express'][$post['expressid']];
                $amount += $expressPrice; // 合并邮费
                $post['amount'] = $amount;

                $data['OrderModel'] = $post;
                if ($model->load($data) && $model->save()) {
                    return $this->redirect(['order/pay']);
                }
            }

            return $this->redirect(['index/index']);
        }
    }
}