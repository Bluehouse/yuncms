<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

class CategoryModel extends ActiveRecord{
    // 定义表名
    public static function tableName() {
        return "{{%category}}";
    }

    // 定义校验规则
    public function rules() {
        return [
            ['parentid', 'required', 'message' => '父级不能为空'],
            ['title', 'required', 'message' => '分类名称不能为空'],
            ['createtime', 'safe']
        ];
    }

    public function attributeLabels() {
        return [
            'parentid' => '上级分类',
            'title' => '分类名称'
        ];
    }

    // 获取所有已经排序的好的分类
    public function getOptions() {
        // 获取所有分类，将对象转化为数组
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);

        // 按层级排序分类
        $cates = $this->getTree($cates);

        // 添加分类的缩进
        $cates = $this->setPrefix($cates);

        // 重组options
        $cateList = [];

        foreach($cates as $cate){
            $cateList[$cate['cateid']] = $cate['title'];
        }

        return $cateList;
    }

    // 递归排序
    private function getTree($cates, $pid = 0, $level = 0) {
       static $sortCates = [];
       foreach($cates as $key => $value){
           if ($value['parentid'] == $pid) {
               $value['level'] = $level;
               $sortCates[] = $value;
               unset($cates[$key]);
               $this->getTree($cates, $value['cateid'], $level + 1);
           }
       }
       return $sortCates;
    }

    // 添加缩进
    private function setPrefix($sortCates, $prefix = "|----") {
        foreach ($sortCates as &$value){
           $value['title'] = str_repeat($prefix, $value['level']) . $value['title'];
        }
        return $sortCates;
    }

    // 添加分类
    public function add($data) {
       if ($this->load($data) && $this->validate()) {
            if ($this->save(false)) {
                return true;
            }
       }
       return false;
    }

    // 分类列表tree
    public function getCateList() {
        // 获取所有分类，将对象转化为数组
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);

        // 按层级排序分类
        $cates = $this->getTree($cates);

        // 添加分类的缩进
        $cates = $this->setPrefix($cates);

        return $cates;
    }
}