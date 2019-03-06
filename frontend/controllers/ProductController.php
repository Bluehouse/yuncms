<?php
/**
 * Created by PhpStorm.
 * User: 潞城
 * Date: 2019/2/26
 * Time: 23:18
 */

namespace frontend\controllers;

use yii\web\Controller;
use common\models\ProductModel;
use yii\data\Pagination;
use Yii;

class ProductController extends CommonController
{
    public $layout = false;

    // 商品列表是通过某个分类点进来的，所以都有分类id
    public function actionIndex(){
        $cid = Yii::$app->request->get('cid');
        $model = ProductModel::find()->where("cateid = :cid and ison = '1'", [':cid' => $cid]);

        $count = $model->count();
        $pageSize = Yii::$app->params['pageSize']['product'];
        $pager = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);
        $productList = $model->offset($pager->offset)->limit($pager->limit)->all();

        return $this->render("index", ['model' => $model, 'pager' => $pager, 'productList' => $productList]);
    }

    public function actionDetail() {
        $pid = Yii::$app->request->get('pid');
        $product = ProductModel::findOne($pid);
        return $this->render("detail", ['product' => $product]);
    }
}