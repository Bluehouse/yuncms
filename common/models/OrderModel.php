<?php

namespace common\models;

use yii\db\ActiveRecord;

class OrderModel extends ActiveRecord{
    const CREATEORDER = 0;
    const CHECKORDER= 100;
    const PAYFAILED = 201;
    const PAYSUCCESS = 200;
    const SENDED = 220;
    const RECIEVED = 206;

    public $products; // 存储订单产品
    public $cn_status; // 订单中文状态
    public $username; // 订单用户名
    public $address;

    public static $status = [
        self::CREATEORDER => '订单初始化',
        self::CHECKORDER  => '待支付',
        self::PAYFAILED   => '支付失败',
        self::PAYSUCCESS  => '等待发货',
        self::SENDED      => '已发货',
        self::RECIEVED    => '订单完成',
    ];

    public static function tableName() {
        return "{{%order}}";
    }

    public function rules(){
        return [
            [['userid', 'status'], 'required', 'on' => ['orderadd']],
            [['addressid', 'expressid', 'amount', 'status'], 'required', 'on' => ['orderupdate']],
            ['expressno', 'required', 'message' => '请输入快递单号', 'on' => ['send']],
            ['createtime', 'safe', 'on' => 'orderadd']
        ];
    }

    // 后台获取订单列表获取附加数据
    public static function getDetail($orders) {
        foreach ($orders as $order) {
            $details = OrderDetailModel::find()->where('orderid = :oid', [':oid' => $order->orderid])->all();

            // 查询订单关联的商品信息
            $products = [];
            foreach ($details as $detail) {
                $product = ProductModel::findOne($detail->productid);
                $product->num = $detail->productnum; // 将库存更改成购买的商品数量，方便后台订单列表展示
                $products[] = $product;
            }
            $order->products = $products;

            // 查询订单关联的用户信息
//            $order->username = UserModel::findOne($order->userid)->username;
            $order->username = 'admin';

            // 查询订单关联的地址信息
//            $order->address = AddressModel::findOne($order->addressid)->address;
//            $order->address = empty($order->address) ? '' : $order->address->address;
            $order->address = '北京';

            // 查询订单的中文状态
            $order->cn_status = self::$status[$order->status];
        }

        return $orders;
    }
}