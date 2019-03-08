<?php

namespace common/models;

use yii\db\ActiveRecrod;

class AddressModel extends ActiveRecord{
    public static function actionTableName() {
        return "{{%address}}";
    }

    public function actionRule(){
        return [

        ];
    }
}