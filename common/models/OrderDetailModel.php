<?php

namespace common\models;

use yii\db\ActiveRecord;

class OrderDetailModel extends ActiveRecord{

    public static function tableName() {
        return "{{%order_detail}}";
    }

    public function rules(){
        return [
            [['productid', 'price', 'productnum', 'orderid', 'createtime'], 'required'],
        ];
    }

    public function add($data) {
        if ($this->load($data) && $this->save()) {
            return true;
        }
        return false;
    }
}