<?php

namespace backend\controllers;

use yii\web\Controller;
use common\models\CategoryModel;
use Yii;

class CategoryController extends CommonController{
    public $layout = "layout";

    public function actionList() {
        $model = new CategoryModel;
        $cateList = $model->getCateList();
        return $this->render('list', ['cateList' => $cateList]);
    }

    public function actionAdd() {
        $model = new CategoryModel;
        // 查询已有的所有分类
        $cateList = $model->getOptions();
//        array_unshift($cateList,"添加顶级分类"); // 使用sort,array_unshift也会重置id
//        $cateList = array_merge([0 => '添加顶级分类'], $cateList); // 这里有点问题，array_merge()会重置Key,我们需要的key是cateid，还不是自增字段
//        ksort($cateList); // asort按键值排序，ksort按键名排序，两者都保留键值关系；sort会重置键名，统一按数字重置，rsort之类，r表示倒序

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $data['createtime'] = time();
            if ($model->add($data)) {
                Yii::$app->session->setFlash('info', '添加分类成功');
            }
        }
        // 直接添加子类时，配置parentid字段即可选中
        if ($pid = Yii::$app->request->get('pid')) {
            $model->parentid = $pid;
            $model->title = "";
        }
        return $this->render('add', ['model' => $model, 'cateList' => $cateList]);
    }

    public function actionEdit(){
        $cateid = Yii::$app->request->get('id');
        $model = CategoryModel::find()->where('cateid = :cateid', [':cateid' => $cateid])->one();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->edit($data)) { // $model = ？对后续方法调用有么有影响
                Yii::$app->session->setFlash('info', '分类更新成功');
            }
        }
        $cateList = $model->getOptions();
        return $this->render('edit', ['model' => $model, 'cateList' => $cateList]);
    }

    public function actionDel() {
        $model = new CategoryModel;
        $cid = Yii::$app->request->get('id');
        $res = $model->del($cid);
        if ($res) {
            $msg = $res === 2 ?  '该分类有子类，不允许删除' : '分类删除成功';
        } else {
            $msg = '删除失败，请稍后重试';
        }
        Yii::$app->session->setFlash('info', $msg);
        $this->redirect(['category/list']);
    }
}