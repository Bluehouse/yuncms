<?php

namespace common\models;

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
        $cates = $this->_getTree($cates);

        // 添加分类的缩进
        $cates = $this->setPrefix($cates);

        // 重组options
//        $cateList = [];
        $cateList[0] =  "添加顶级分类";

        foreach($cates as $cate){
            $cateList[$cate['cateid']] = htmlspecialchars_decode($cate['title']); // 为什么处理不了&nbsp;
        }

        return $cateList;
    }

    /**
     * 递归排序
     *
     * @param $cates 待排序的分类
     * @param int $pid 父id
     * @param int $level 层级
     *
     * @return array 返回排序好的分类
     */
    private function _getTree($cates, $pid = 0, $level = 0) {
       static $sortCates = [];
       foreach($cates as $key => $value){
           if ($value['parentid'] == $pid) {
               $value['level'] = $level; // 给分类添加级别属性
               $sortCates[] = $value;
               unset($cates[$key]); // 删除已排序好的分类，减少资源消耗
               $this->_getTree($cates, $value['cateid'], $level + 1); // 递归继续查询后续的分类（2级、3级....）
           }
       }
       return $sortCates;
    }

    // 添加缩进
    private function setPrefix($sortCates, $prefix = "──", $hasTab = false) {
        foreach ($sortCates as &$value){
            // 添加前缀
            $value['title'] = str_repeat($prefix, $value['level']) . $value['title'];
            if ($value['level'] != 0) {
                $value['title'] = "└" . $value['title'];
            }

           // 有几级就缩进N个tab，使用列表
            if ($hasTab) {
                $value['title'] = str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $value['level']) . $value['title'];
            }

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
        $cates = $this->_getTree($cates);

        // 添加分类的缩进
        $cates = $this->setPrefix($cates);

        return $cates;
    }

    public static function getParents($categorys, $pid = 0, $level = 0) {
        $list = [];
        foreach ($categorys as $k => $v) {
            if ($v['parentid'] == $pid) {
                unset($categorys[$k]);
                if ($level < 2) {
                    //小于三级
                    $v['children'] = self::getParents($categorys, $v['cateid'], $level + 1);
                }
                $list[] = $v;
            }
        }
        return $list;
    }

    // 供前台调用，重组成三级分类
    public static function getMenu() {
        // 获取所有分类，将对象转化为数组
        $cates = self::find()->all();
        $cates = ArrayHelper::toArray($cates);

        $cates = self::getParents($cates);

        // 按层级排序分类
//        $cates = self->_getTree($cates);
//        $top = self::find()->where('parentid = :pid', [":pid" => 0])->limit(11)->orderby('createtime asc')->asArray()->all();
//        $data = [];
//        foreach((array)$top as $k => $cate) {
//            $cate['children'] = self::find()->where("parentid = :pid", [":pid" => $cate['cateid']])->limit(10)->asArray()->all();
//            $data[$k] = $cate;
//        }
        return $cates;
    }

    public function edit($data) {
        if ($this->load($data) && $this->validate()) {
            if ($this->save(false)) {
                return true;
            } else {
                return false;
            }
        }
        return false;
    }

    public function del($cid) {
        // 判断是否有子分类
        if (self::find()->where('parentid = :pid', [':pid' => $cid])->one()) {
            return (int)2;
//            throw new \Exception("该分类有子类，不允许删除"); // 这部分可以统一做下异常处理类，定义一些状态码
        }

        // 没有子分类的话，直接删除
        return (bool)$this->deleteAll('cateid = :cid', [':cid' => $cid]);
    }
}