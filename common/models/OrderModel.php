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
}