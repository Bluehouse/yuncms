<?php

namespace backend\models;

use yii\db\ActiveRecord;
use Yii;

class ProductModel extends ActiveRecord{
    public static function tableName(){
        return "{{%product}}";
    }

    public function attributeLabels() {
        return [
            'cateid' => '所属分类',
            'title' => '商品标题',
            'descr' => '商品详情',
            'price' => '商品价格',
            'saleprice' => '促销价格',
            'num' => '库存',
            'ison' => '是否上架',
            'istui' => '是否推荐',
            'ishot' => '是否热卖',
            'issale' => '是否促销',
            'cover' => '商品封面',
        ];
    }

    public function rules() {
        return [
            ['title', 'required', 'message' => '标题不能为空'],
            ['descr', 'required', 'message' => '描述不能为空'],
            ['cateid', 'required', 'message' => '分类不能为空'],
            ['price', 'required', 'message' => '单价不能为空'],
            [['price','saleprice'], 'number', 'min' => 0.01, 'message' => '价格必须是数字'],
            ['num', 'integer', 'min' => 0, 'message' => '库存必须是数字'],
            [['issale','ishot', 'istui', 'ison'], 'safe'],
//            [['cover'], 'required'],
        ];
    }

    public function add($data) {
        if ($this->load($data) && $this->save()) {
            return true;
        }
        return false;
    }

    // 在这里调用save跟在controller调用，都有哪些区别呢
    public function edit($data) {
        if ($this->load($data) && $this->save()) {
            return true;
        }
        return false;
    }

    public function del() {
        return false;
    }
}
