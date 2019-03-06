<?php

namespace common\models;

use yii\db\ActiveRecord;

class CartModel extends ActiveRecord{
    public static function tableName(){
        return "{{%cart}}";
    }

    public function rules() {
        return [
            [['productid', 'productnum', 'price', 'userid'], 'required'],
            ['createtime' , 'safe']
        ];
    }
}