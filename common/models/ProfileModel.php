<?php

namespace common\models;

use yii\db\ActiveRecord;

class ProfileModel extends ActiveRecord{
    public static function tableName(){
        return "{{%profile}}";
    }
}