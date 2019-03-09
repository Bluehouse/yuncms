<?php

namespace common\models;

use yii\db\ActiveRecord;

class AddressModel extends ActiveRecord{
    public static function tableName() {
        return "{{%address}}";
    }

    public function rules(){
        return [
            [['lastname', 'address', 'email', 'telephone', 'userid'], 'required'],
            ['createtime', 'safe']
        ];
    }
}