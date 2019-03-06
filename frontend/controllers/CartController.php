<?php
namespace frontend\controllers;

use yii\web\Controller;
use common\models\UserModel;
use common\models\CartModel;
use common\models\ProductModel;
use Yii;

class CartController extends Controller {
    public $layout = false;

    public function actionIndex() {
        // 查询出所有当前用户的购物车数据
        $userid = 1;

        $cart = CartModel::find()->where('userid = :uid', [':uid' => $userid])->asArray()->all();
        $data = [];
        foreach ($cart as $k => $pro) {
            $product = ProductModel::findOne($pro['productid']);
            $data[$k]['cover'] = $product->cover;
            $data[$k]['title'] = $product->title;
            $data[$k]['productnum'] = $pro['productnum'];
            $data[$k]['price'] = $pro['price'];
            $data[$k]['saleprice'] = $product['saleprice'];
            $data[$k]['productid'] = $pro['productid'];
            $data[$k]['cartid'] = $pro['cartid'];
        }

        return $this->render('index', ['data' => $data]);
    }

    // 加入购物车
    public function actionAdd() {
        // 未登录跳转到登录
        $session = Yii::$app->session;
//        if ($session['member']['isLogin'] != 1) {
//            $this->redirect(['member/login']);
//            return false;
//        }

        // 准备购物车数据productid,price,productnum,userid,createtime,(1，列表页的get提交， 2详情页的post提交)
        if (Yii::$app->request->isPost) {
            // 隐藏域price,productid,session中有userid
            $post = Yii::$app->request->post();
            $data['CartModel'] = $post;
            $num = (int)$post['productnum'];
        } else {
            $productid = Yii::$app->request->get('pid');
            $product = ProductModel::findOne($productid); // 得到的是一个对象
            $data['CartModel']['productid'] = (int)$productid;
            $data['CartModel']['price'] = $product->issale ? $product->saleprice : $product->price;
            $num = 1;
            $data['CartModel']['productnum'] = $num;
         }
//        $data['userid'] = $session['member']['userid'];
        $data['CartModel']['userid'] = 1;
        $data['CartModel']['createtime'] = time();

        // 将数据插入购物车,插入购物车前，判断是否已经有内容
        $model = CartModel::find()->where('productid = :pid and userid = :uid', [':pid' => $data['CartModel']['productid'], ':uid' => $data['CartModel']['userid']])->one();

        if (empty($model)) {
            $model = new CartModel;
        } else {
            $data['CartModel']['productnum'] = $model->productnum + $num;
        }
        $model->load($data);
        $model->save();

        // 跳转到购物车首页
        return $this->redirect(['cart/index']);
    }
}