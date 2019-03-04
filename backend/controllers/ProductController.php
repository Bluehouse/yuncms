<?php

namespace backend\controllers;

use yii\web\Controller;
use backend\models\ProductModel;
use backend\models\CategoryModel;
use yii\data\Pagination;
use Yii;

class ProductController extends Controller{
    public $layout = "layout";

    public function actions()
    {
        return [
            'upload' => [
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ],
            'ueditor' => [
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config' => [
                    //上传图片配置
                    'imageUrlPrefix' => "", /* 图片访问路径前缀 */
                    'imagePathFormat' => "/image/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ]
        ];
    }

    public function actionAdd(){
        $model = new ProductModel;
        $cateModel = new CategoryModel;
        $cateList = $cateModel->getOptions();
        unset($cateList[0]); // 删除添加顶级分类的option

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
//            $pics = $this->_upload();
//            $data['Product']['pic'] = $pic;
//            if (!$pics) {
//                $model->addError('cover', '封面不能为空');
//            } else {
//                $data['ProductModel']['cover'] = $pics['cover'];
//                $data['ProductModel']['pics'] = $pics['pics'];
//            }
            if ($model->add($data)) {
                Yii::$app->session->setFlash('info', '商品添加成功！');
            } else {
                Yii:$app->session->setFlash('info', '商品添加失败！');
            }
        }

        return $this->render('add', ['model' => $model, 'cateList' => $cateList]);
    }

    private function _upload() {
        if ($_FILES['ProductModel']['error']['cover'] > 0){
            return false;
        }

        $qiniu = new Qiniu(ProductModel::AK, ProductModel::SK, ProductModel::DOMAIN, ProductModel::BUKKET);
        $key = uniqid();
        $qiniu->uploadFile($_FILES['ProductModel']['tmp_name']['cover'], $key);
        $cover = $qiniu->getLink($key);

        $pics = [];
        foreach($pics as $key => $file) {
            if ($_FILEs['ProductModel']['error']['pics'][$key] > 0) {
                continue;
            }
            $key = uniqid();
            $qiniu->uploadFile($file, $key);
            $pics[$key] = $qiniu->getLink($key);
        }

        return ['cover' => $cover, 'pics' => json_encode($pics)];
    }

    public function actionEdit() {
        $pid = Yii::$app->request->get('pid');
        $model = ProductModel::find()->where('productid = :pid', [':pid' => $pid])->one();

        $cateModel = new CategoryModel;
        $cateList = $cateModel->getOptions();
        unset($cateList[0]); // 删除添加顶级分类的option

        if (Yii::$app->request->isPost) {
            $data = Yii::$app->request->post();
            if ($model->edit($data)) {
                Yii::$app->session->setFlash('info', '商品修改成功！');
            }
        }
        return $this->render('edit', ['model' => $model, 'cateList' => $cateList]);
    }

    public function actionList() {
        $model = ProductModel::find();
        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['product'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $products = $model->offset($pager->offset)->limit($pager->limit)->all();

        return $this->render('list', ['model' => $model, 'products' => $products, 'pager' => $pager]);
    }

    public function actionDel() {
        $pid = Yii::$app->request->get('pid');
        $model = new ProductModel;
        if ($model->deleteAll('productid = :pid', [':pid' => $pid])) {
            Yii::$app->session->setFlash('info', '商品删除成功');
        }

        $this->redirect(['product/list']);
    }
}