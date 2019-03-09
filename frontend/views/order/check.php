<?php
    use yii\bootstrap\ActiveForm;
    use yii\Helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>结算页面</title>
    <link href="assets/v1.0/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/basic/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/css/cartstyle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/css/jsstyle.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="assets/v1.0/js/address.js"></script>
</head>

<body>

<!--顶部导航条 -->
<div class="am-container header">
    <ul class="message-l">
        <div class="topMessage">
            <div class="menu-hd">
                <a href="#" target="_top" class="h">亲，请登录</a>
                <a href="#" target="_top">免费注册</a>
            </div>
        </div>
    </ul>
    <ul class="message-r">
        <div class="topMessage home">
            <div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
        </div>
        <div class="topMessage my-shangcheng">
            <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
            </div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd">
                <a id="mc-menu-hd" href="#" target="_top">
                    <i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum"
                                                                                             class="h">0</strong>
                </a>
            </div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
            </div>
    </ul>
</div>

<!--悬浮搜索框-->
<div class="nav white">
    <div class="logo"><img src="assets/v1.0/images/logo.png"/></div>
    <div class="logoBig">
        <li><img src="assets/v1.0/images/logobig.png"/></li>
    </div>
    <div class="search-bar pr">
        <a name="index_none_header_sysc" href="#"></a>
        <form>
            <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
        </form>
    </div>
</div>

<div class="clear"></div>
<div class="concent">
    <div class="paycont">
        <?php ActiveForm::begin([
            'options' => ['id' => 'myform'],
             'action' => Url::to(['order/confirm']),
        ]); ?>
        <!-- 地址 -->
        <div class="address">
            <h3>确认收货地址 </h3>
            <div class="control tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
            <div class="clear"></div>
            <ul>
                <?php foreach($addressList as $key => $address): ?>
                    <div class="per-border"></div>
<!--                    <li class="user-addresslist defaultAddr">-->
                    <li class="user-addresslist <?php if ($key == 0) echo 'defaultAddr'; ?>" onClick="selectAddr(<?php echo $address['addressid']?>)">
                        <div class="address-left">
                            <div class="user DefaultAddr">
                                <span class="buy-address-detail">
                                    <span class="buy-user"><?= $address['lastname']; ?></span>
                                    <span class="buy-phone"><?= $address['telephone']; ?></span>
                                </span>
                            </div>
                            <div class="default-address DefaultAddr">
                                <span class="buy-line-title buy-line-title-type">收货地址：</span>
                                <span class="buy--address-detail">
                                       <span class="province">湖北</span>省
                                        <span class="city">武汉</span>市
                                        <span class="dist">洪山</span>区
                                        <span class="street"><?= $address['address']; ?></span>
                                    </span>
                                </span>
                            </div>
                            <?php if ($key == 0) { ?>
                                <ins class="deftip">默认地址</ins>
                            <?php } ?>
                        </div>
                        <div class="clear"></div>
                        <div class="new-addr-btn">
                            <a href="<?php echo Url::to(['address/setDefault', 'aid' => $address['addressid']]); ?>" class="hidden">设为默认</a>
                            <span class="new-addr-bar hidden">|</span>
                            <a href="<?php echo Url::to(['address/edit', 'aid' => $address['addressid']]); ?>">编辑</a>
                            <span class="new-addr-bar">|</span>
                            <a href="<?php echo Url::to(['address/del', 'aid' => $address['addressid']]); ?>">删除</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
            <input type="hidden" name="addressid" value="1"/>
            <div class="clear"></div>
        </div>

        <!-- 物流 -->
        <div class="logistics">
            <h3>选择物流方式</h3>
            <ul class="op_express_delivery_hot">
                <li data-value="yuantong" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -468px"></i>圆通<span></span></li>
                <li data-value="shentong" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -1008px"></i>申通<span></span></li>
                <li data-value="yunda" class="OP_LOG_BTN"><i class="c-gap-right" style="background-position:0px -576px"></i>韵达<span></span></li>
                <li data-value="zhongtong" class="OP_LOG_BTN op_express_delivery_hot_last "><i class="c-gap-right" style="background-position:0px -324px"></i>中通<span></span></li>
                <li data-value="shunfeng" class="OP_LOG_BTN  op_express_delivery_hot_bottom"><i class="c-gap-right" style="background-position:0px -180px"></i>顺丰<span></span></li>
            </ul>
        </div>
        <input type="hidden" name="expressid" value="1"/>
        <div class="clear"></div>

        <!-- 支付方式 -->
        <div class="logistics">
            <h3>选择支付方式</h3>
            <ul class="pay-list">
                <li class="pay card"><img src="assets/v1.0/images/wangyin.jpg"/>银联<span></span></li>
                <li class="pay qq"><img src="assets/v1.0/images/weizhifu.jpg"/>微信<span></span></li>
                <li class="pay taobao selected"><img src="assets/v1.0/images/zhifubao.jpg"/>支付宝<span></span></li>
            </ul>
        </div>
        <input type="hidden" name="payid" value="1"/>
        <div class="clear"></div>

        <!--订单 -->
        <div class="concent">
            <div id="payTable">
                <h3>确认订单信息</h3>
                <div class="cart-table-th">
                    <div class="wp">
                        <div class="th td-inner th-item">商品信息</div>
                        <div class="th td-inner th-price">单价</div>
                        <div class="th td-inner th-amount">数量</div>
                        <div class="th td-inner th-sum">金额</div>
                        <div class="th td-inner th-oplist">配送方式</div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
            <?php
            $total = 0;
            foreach ($productDetail as $pro) : ?>
                <tr class="item-list">
                    <div class="bundle  bundle-last">
                        <div class="bundle-main">
                            <ul class="item-content clearfix">
                                <div class="pay-phone">
                                    <li class="td td-item">
                                        <div class="item-pic">
                                            <a href="#"><img src="<?php echo $pro['cover']; ?>" class="itempic J_ItemImg"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-basic-info">
                                                <a href="#" title="<?php echo $pro['title']; ?>" class="item-title J_MakePoint" target="_blank">
                                                    <?php echo $pro['title']; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="td td-info">
                                        <div class="item-props">
                                            <span class="sku-line">颜色：10#蜜橘色+17#樱花粉</span>
                                            <span class="sku-line">包装：两支手袋装（送彩带）</span>
                                        </div>
                                    </li>
                                    <li class="td td-price">
                                        <div class="item-price price-promo-promo">
                                            <div class="price-content"><em class="J_Price"><?php echo $pro['price']; ?></em></div>
                                        </div>
                                    </li>
                                </div>

                                <li class="td td-amount">
                                    <div class="amount-wrapper ">
                                        <div class="item-amount ">
                                            <span class="phone-title">购买数量</span>
                                            <div class="sl">
<!--                                                <input class="min am-btn" name="" type="button" value="-"/>-->
                                                <input class="text_box" name="" type="hidden" value="<?php echo $pro['productnum']; ?>"/><?php echo $pro['productnum']; ?>
<!--                                                <input class="add am-btn" name="" type="button" value="+"/>-->
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="td td-inner td-sum">
                                    <em tabindex="0" class="J_ItemSum number"><?php echo $pro['price'] * $pro['productnum']; ?></em>
                                </li>
                                <li class="td td-inner td-oplist">
                                    <span class="phone-title">配送方式</span>
                                    <div class="pay-logis">包邮</div>
                                </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                </tr>
            <?php
            $total += $pro['price'] * $pro['productnum'];
            endforeach; ?>
        </div>
        <div class="clear"></div>
        <div class="pay-total">
            <!--留言-->
            <div class="order-extra">
                <div class="order-user-info">
                    <div class="memo">
                        <label>买家留言：</label>
                        <input type="text" class="memo-input J_MakePoint c2c-text-default memo-close" placeholder="选填,建议填写和卖家达成一致的说明">
                    </div>
                </div>
            </div>
            <!--优惠券 -->
<!--            <div class="buy-agio">-->
<!--                <li class="td td-coupon">-->
<!--                    <span class="coupon-title">优惠券</span>-->
<!--                    <select data-am-selected>-->
<!--                        <option value="a">-->
<!--                            <div class="c-price">-->
<!--                                <strong>￥8</strong>-->
<!--                            </div>-->
<!--                            <div class="c-limit">-->
<!--                                【消费满95元可用】-->
<!--                            </div>-->
<!--                        </option>-->
<!--                        <option value="b" selected>-->
<!--                            <div class="c-price">-->
<!--                                <strong>￥3</strong>-->
<!--                            </div>-->
<!--                            <div class="c-limit">-->
<!--                                【无使用门槛】-->
<!--                            </div>-->
<!--                        </option>-->
<!--                    </select>-->
<!--                </li>-->
<!---->
<!--                <li class="td td-bonus">-->
<!--                    <span class="bonus-title">红包</span>-->
<!--                    <select data-am-selected>-->
<!--                        <option value="a">-->
<!--                            <div class="item-info">-->
<!--                                ¥50.00<span>元</span>-->
<!--                            </div>-->
<!--                            <div class="item-remainderprice">-->
<!--                                <span>还剩</span>10.40<span>元</span>-->
<!--                            </div>-->
<!--                        </option>-->
<!--                        <option value="b" selected>-->
<!--                            <div class="item-info">-->
<!--                                ¥50.00<span>元</span>-->
<!--                            </div>-->
<!--                            <div class="item-remainderprice">-->
<!--                                <span>还剩</span>50.00<span>元</span>-->
<!--                            </div>-->
<!--                        </option>-->
<!--                    </select>-->
<!--                </li>-->
<!--            </div>-->
            <div class="clear"></div>
        </div>
        <!--含运费小计 -->
        <div class="buy-point-discharge ">
            <p class="price g_price ">
                合计（含运费） <span>¥</span><em class="pay-sum"><?php echo $total; ?></em>
            </p>
        </div>

        <!--信息 -->
        <div class="order-go clearfix">
            <div class="pay-confirm clearfix">
                <div class="box">
                    <div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
                        <span class="price g_price ">
                            <span>¥</span> <em class="style-large-bold-red"><?php echo $total; ?></em>
                        </span>
                    </div>

                    <div class="pay-address">
                        <p class="buy-footer-address">
                            <span class="buy-line-title buy-line-title-type">寄送至：</span>
                            <span class="buy--address-detail">
                                <span class="province">湖北</span>省
                                <span class="city">武汉</span>市
                                <span class="dist">洪山</span>区
                                <span class="street">雄楚大道666号(中南财经政法大学)</span>
                            </span>
                        </p>
                        <p class="buy-footer-address">
                            <span class="buy-line-title">收货人：</span>
                            <span class="buy-address-detail">
                                <span class="buy-user">艾迪 </span>
                                <span class="buy-phone">15871145629</span>
                            </span>
                        </p>
                    </div>
                </div>

                <div class="submitOrder">
                    <div class="go-btn-wrap">
                        <a href="javascript:void(0)" class="btn-go" tabindex="0" onClick="document.getElementById('myform').submit();return false;">提交订单</a>
                    </div>
                </div>
                <input type="hidden" name="orderid" value="<?php echo Yii::$app->request->get('orderid'); ?>"/>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
    <div class="clear"></div>
</div>
</div>
<div class="footer">
    <div class="footer-hd">
        <p>
            <a href="#">恒望科技</a>
            <b>|</b>
            <a href="#">商城首页</a>
            <b>|</b>
            <a href="#">支付宝</a>
            <b>|</b>
            <a href="#">物流</a>
        </p>
    </div>
    <div class="footer-bd">
        <p>
            <a href="#">关于恒望</a>
            <a href="#">合作伙伴</a>
            <a href="#">联系我们</a>
            <a href="#">网站地图</a>
            <em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank"
                                                       title="模板之家">模板之家</a> - Collect from <a
                        href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
        </p>
    </div>
</div>
</div>

<!--新增收货地址-->
<div class="theme-popover-mask"></div>
<div class="theme-popover">
    <div class="am-cf am-padding">
        <div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong>
            <small></small>
        </div>
    </div>
    <hr/>
    <div class="am-u-md-12">
        <?php $form = ActiveForm::begin([
                'id' => 'addressForm',
                'options' => [ 'class' => 'am-form am-form-horizontal'],
                'action' => Url::to(['address/add']),
                'fieldConfig' => [
                    'template' => '<div class="am-form-group">
                                    <label for="user-name" class="am-form-label">{label}</label> 
                                    <div class="am-form-content">{input}</div>
                                </div>',
                ]
        ]); ?>
            <?= $form->field($addressModel, 'lastname')->textInput(['id' => 'user-name', 'placeholder' => '收货人'])->label('收货人'); ?>
            <?= $form->field($addressModel, 'telephone')->textInput(['id' => 'user-phone', 'placeholder' => '请输入联系手机号'])->label('手机号码'); ?>
            <?= $form->field($addressModel, 'email')->textInput(['id' => 'user-email', 'placeholder' => '请输入常用邮箱'])->label('邮箱'); ?>
            <div class="am-form-group">
                <label for="user-phone" class="am-form-label">所在地</label>
                <div class="am-form-content address">
                    <select data-am-selected>
                        <option value="b">河北省</option>
                        <option value="a">北京市</option>
                    </select>
                    <select data-am-selected>
                        <option value="b">石家庄市</option>
                        <option value="a">保定市</option>
                    </select>
                    <select data-am-selected>
                        <option value="a">桥东区</option>
                        <option value="b">桥西区</option>
                    </select>
                </div>
            </div>
            <?= $form->field($addressModel, 'address')->textArea(['id' => 'user-intro', 'placeholder' => '输入详细地址', 'rows' => 3])->label('详细地址'); ?>
            <div class="am-form-group theme-poptit">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <div class="am-btn am-btn-danger" onclick="document.getElementById('addressForm').submit();">保存</div>
                    <div class="am-btn am-btn-danger close">取消</div>
                </div>
            </div>
       <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="clear"></div>
<script>
    function selectAddr(addressid) {
        $('input[name=addressid]').val(addressid);
    }
</script>
</body>
</html>