<?php

namespace frontend\models;

use common\models\OrderModel;
use common\models\OrderDetailModel;
use common\models\ProductModel;
//use easy\pay\ali\AlipayTradePagePayContentBuilder;
//use easy\pay\ali\AlipayTradeService;

class Pay{
    // 支付宝，yii继承了Alipay的支付组件，拿到支付宝及时到账的合作者身份（pid）和安全校验码（key）
    public static function alipay($orderid){
//        $payRequestBuilder = new AlipayTradePagePayContentBuilder();
//        $payRequestBuilder->setBody('测试订单');
//        $payRequestBuilder->setSubject('测试商品');
//        $payRequestBuilder->setTotalAmount(0.01);
//        $payRequestBuilder->setOutTradeNo('2018090554564651515645645'.time());
//
//        $config = [
//            //应用ID,您的APPID。
//            'app_id' => "2088121774041830",
//            //商户私钥
//            'merchant_private_key' => "",
//            //异步通知地址
//            'notify_url' => "http://www.yuncms.com/pay/ali-notify",
//            //同步跳转
//            'return_url' => "http://www.yuncms.com/pay/ali-return",
//            //编码格式
//            'charset' => "UTF-8",
//            //签名方式
////            'sign_type'=>"RSA2",
//            'sign_type'=>"RSA2",
//            //支付宝网关
//            'gatewayUrl' => "https://openapi.alipay.com/gateway.do",
//            //支付宝公钥,查看地址：https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。
//            'alipay_public_key' => "rbwcctbfa0fy0w09qjtmk33bm0pfxjpx",
//        ];
//        $aop = new AlipayTradeService($config);
//
//        $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);
//        //输出表单
//        var_dump($response);
        // 获取订单总价amount,
        $amount = OrderModel::findOne($orderid)->amount;
        if ($amount > 0) {
            $aplipay = new \AlipayPay();
            $giftname = "YumCMS商城";
            $details = OrderDetailModel::find()->where('orderid = :oid', [':oid' => $orderid])->all();
            $body = "";
            foreach($details as $detail) {
                $body .= ProductModel::findOne($detail->productid)->title . '-';
            }
            $body .= "等商品";
            $showUrl = "http://www.yuncms.com";

            $html = $aplipay->requestPay($orderid, $giftname, $amount, $body, $showUrl);
            echo $html;

            // https://mapi.alipay.com/gateway.do?_input_charset=utf-8&body=%E6%9C%80%E6%96%B0iphone%E6%89%8B%E6%9C%BA-%E7%AD%89%E5%95%86%E5%93%81&notify_url=http%3A%2F%2Fwww.yuncms.com%2Fnotify.php&out_trade_no=12&partner=2088121774041830&payment_type=1&return_url=http%3A%2F%2Fwww.yuncms.com%2Findex.php%3Fr%3Dpay%2Freturn&seller_email=2033217488%40qq.com&service=create_direct_pay_by_user&show_url=http%3A%2F%2Fwww.yuncms.com&subject=YumCMS%E5%95%86%E5%9F%8E&total_fee=0.01&sign=1fb1643a6f62fdd610120b3d74499da1&sign_type=MD5
        }
        return false;
    }

    // 异步修改订单信息
    public static function notify($data) {
        $alipay = new \AlipayPay();
        $verify_result = $alipay->verifyNotify();
        if ($verify_result) {
            $out_trade_no = $data['extra_common_param'];
            $trade_no = $data['trade_no'];
            $trade_status = $data['trade_status'];
            $status = OrderModel::PAYFAILED;
            if ($trade_status == 'TRADE_FINISHED' || $trade_status == "TRADE_SUCCESS") {
                $status = OrderModel::PAYSUCCESS;
                $orderInfo = OrderModel::findOne($out_trade_no);
                if ($orderInfo && $orderInfo->status = OrderModel::CHECKORDER) {
                    orderModel::updateAll(['status' => $status, 'tradeno' => $trade_no, 'tradeext' => json_encode($data)], 'orderid = :oid', [':oid' => $out_trade_no]);
                } else {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}