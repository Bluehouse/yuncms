<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\CategoryModel;
use Yii;

class CategoryController extends Controller{
    public $layout = "layout";
    public function actionList() {
        $model = new CategoryModel;
        $cateList = $model->getCateList();
        return $this->render('list', ['cateList' => $cateList]);
    }

    public function actionAdd() {
        $model = new CategoryModel;
        // 查询已有的所有分类
        $cateList[] = "添加顶级分类";
        $cateList = $model->getOptions();
        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            $data['createtime'] = time();
            if ($model->add($data)) {
                Yii::$app->session->setFlash('info', '添加分类成功');
            }
        }
        return $this->render('add', ['model' => $model, 'cateList' => $cateList]);
    }
}