<?php $this->beginPage(); ?>
<?php
    use frontend\assets\AppAsset;
    AppAsset::register($this);
    use yii\helpers\Url;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>购物车页面</title>
    <link href="assets/v1.0/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/basic/css/demo.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/css/cartstyle.css" rel="stylesheet" type="text/css"/>
    <link href="assets/v1.0/css/optstyle.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="assets/v1.0/js/jquery.js"></script>
<!--    --><?php //$this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>
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
            <div class="menu-hd MyShangcheng">
                <a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a>
            </div>
        </div>
        <div class="topMessage mini-cart">
            <div class="menu-hd">
                <a id="mc-menu-hd" href="#" target="_top">
                    <i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong>
                </a>
            </div>
        </div>
        <div class="topMessage favorite">
            <div class="menu-hd">
                <a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a>
            </div>
        </div>
    </ul>
</div>

<!--悬浮搜索框-->
<div class="nav white">
    <div class="logo"><img src="assets/v1.0/images/logo.png"/></div>
    <div class="logoBig"><li><a href="/"><img src="assets/v1.0/images/logobig.png"/></a></li></div>
    <div class="search-bar pr">
        <a name="index_none_header_sysc" href="#"></a>
        <form>
            <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
        </form>
    </div>
</div>
<div class="clear"></div>

<!--购物车 -->
<div class="concent">
    <div id="cartTable">
        <div class="cart-table-th">
            <div class="wp">
                <div class="th th-chk">
                    <div id="J_SelectAll1" class="select-all J_SelectAll">
                    </div>
                </div>
                <div class="th th-item">
                    <div class="td-inner">商品信息</div>
                </div>
                <div class="th th-price">
                    <div class="td-inner">单价</div>
                </div>
                <div class="th th-amount">
                    <div class="td-inner">数量</div>
                </div>
                <div class="th th-sum">
                    <div class="td-inner">金额</div>
                </div>
                <div class="th th-op">
                    <div class="td-inner">操作</div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <!-- 遍历购物车start -->
        <tr class="item-list">
            <div class="bundle bundle-last ">
                <div class="bundle-hd">
                    <div class="bd-promos">
                        <div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;
                        </div>
                        <div class="act-promo">
                            <a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
                        </div>
                        <span class="list-change theme-login">编辑</span>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="bundle-main">
                    <?php
                        $total = 0;
                        $totalNum = 0;
                        foreach($data as $key => $pro):
                    ?>
                    <ul class="item-content clearfix">
                        <li class="td td-chk">
                            <div class="cart-checkbox ">
                                <input class="check" id="J_CheckBox_170769542747" name="items[]" value="" type="checkbox">
                                <label for="J_CheckBox_170769542747"></label>
                            </div>
                        </li>
                        <li class="td td-item">
                            <div class="item-pic">
                                <a href="#" target="_blank" data-title="<?php echo $pro['title']; ?>" class="J_MakePoint">
                                    <img src="<?php echo 'http://adm.yuncms.com' . $pro['cover']; ?>" class="itempic J_ItemImg">
                                </a>
                            </div>
                            <div class="item-info">
                                <div class="item-basic-info">
                                    <a href="#" title="" class="item-title J_MakePoint" target="_blank"><?php echo $pro['title']; ?></a>
                                </div>
                            </div>
                        </li>
                        <li class="td td-info">
                            <div class="item-props item-props-can">
                                <span class="sku-line">颜色：10#蜜橘色</span>
                                <span class="sku-line">包装：两支手袋装（送彩带）</span>
                                <span tabindex="0" class="btn-edit-sku theme-login">修改</span>
                                <i class="theme-login am-icon-sort-desc"></i>
                            </div>
                        </li>
                        <li class="td td-price">
                            <div class="item-price price-promo-promo">
                                <div class="price-content">
                                    <div class="price-line">
                                        <em class="price-original"><?php echo $pro['price']; ?></em>
                                    </div>
                                    <div class="price-line">
                                        <em class="J_Price price-now" tabindex="0" id="saleprice-<?php echo $pro['productid']; ?>"><?php echo $pro['saleprice']; ?></em>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="td td-amount">
                            <div class="amount-wrapper">
                                <div class="item-amount">
                                    <div class="sl">
                                        <input class="min am-btn" name="" type="button" value="-" onClick="changeNum(<?php echo $pro['productid']; ?>, parseInt(this.parentNode.children[1].value)-1)"/>
                                        <input class="text_box" name="productnum" type="text" value="<?php echo $pro['productnum']; ?>" onChange="changeNum(<?php echo $pro['productid']; ?>, this.value)" style="width:30px;"/>
                                        <input class="add am-btn" name="" type="button" value="+" onClick="changeNum(<?php echo $pro['productid']; ?>, parseInt(this.parentNode.children[1].value)+1)"/>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="td td-sum">
                            <div class="td-inner">
                                <em tabindex="0" class="J_ItemSum number"><span id="total-<?php echo $pro['productid']; ?>"><?php echo $pro['saleprice'] * $pro['productnum']; ?></span></em>
                            </div>
                        </li>
                        <li class="td td-op">
                            <div class="td-inner">
                                <a title="移入收藏夹" class="btn-fav" href="#">移入收藏夹</a>
                                <a href="javascript:void(0);" data-point-url="#" class="delete" onClick="deletePro(<?php echo $pro['productid']; ?>, this.parentNode.parentNode.parentNode)">删除</a>
                            </div>
                        </li>
                    </ul>
                    <?php
                        $total += $pro['saleprice'] * $pro['productnum'];
                        $totalNum += $pro['productnum'];
                        endforeach;
                    ?>
                </div>
            </div>
        </tr>
        <!-- 遍历购物车end -->
    </div>
    <div class="clear"></div>

    <div class="float-bar-wrapper">
        <div id="J_SelectAll2" class="select-all J_SelectAll">
            <div class="cart-checkbox">
                <input class="check-all check" id="J_SelectAllCbx2" name="select-all" value="true" type="checkbox">
                <label for="J_SelectAllCbx2"></label>
            </div>
            <span>全选</span>
        </div>
        <div class="operations">
            <a href="javascript:void(0)" hidefocus="true" class="deleteAll">删除</a>
            <a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
        </div>
        <div class="float-bar-right">
            <div class="amount-sum">
                <span class="txt">已选商品</span>
                <em id="J_SelectedItemsCount"><?php echo $totalNum; ?></em><span class="txt">件</span>
                <div class="arrow-box">
                    <span class="selected-items-arrow"></span>
                    <span class="arrow"></span>
                </div>
            </div>
            <div class="price-sum">
                <span class="txt">合计:</span>
                <strong class="price">¥<em id="J_Total"><?php echo $total; ?></em></strong>
            </div>
            <div class="btn-area">
                <a href="pay.html" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
                    <span>结&nbsp;算</span></a>
            </div>
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
                <em>© 2015-2025 Hengwang.com 版权所有</em>
            </p>
        </div>
    </div>
</div>

<!--操作页面-->
<div class="theme-popover-mask"></div>
<div class="theme-popover">
    <div class="theme-span"></div>
    <div class="theme-poptit h-title">
        <a href="javascript:;" title="关闭" class="close">×</a>
    </div>
    <div class="theme-popbod dform">
        <form class="theme-signin" name="loginform" action="" method="post">
            <div class="theme-signin-left">
                <li class="theme-options">
                    <div class="cart-title">颜色：</div>
                    <ul>
                        <li class="sku-line selected">12#川南玛瑙<i></i></li>
                        <li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>
                    </ul>
                </li>
                <li class="theme-options">
                    <div class="cart-title">包装：</div>
                    <ul>
                        <li class="sku-line selected">包装：裸装<i></i></li>
                        <li class="sku-line">两支手袋装（送彩带）<i></i></li>
                    </ul>
                </li>
                <div class="theme-options">
                    <div class="cart-title number">数量</div>
                    <dd>
                        <input class="min am-btn am-btn-default" name="" type="button" value="-"/>
                        <input class="text_box" name="" type="text" value="1" style="width:30px;"/>
                        <input class="add am-btn am-btn-default" name="" type="button" value="+"/>
                        <span class="tb-hidden">库存<span class="stock">1000</span>件</span>
                    </dd>
                </div>
                <div class="clear"></div>
                <div class="btn-op">
                    <div class="btn am-btn am-btn-warning">确认</div>
                    <div class="btn close am-btn am-btn-warning">取消</div>
                </div>
            </div>
            <div class="theme-signin-right">
                <div class="img-info">
                    <img src="assets/v1.0/images/kouhong.jpg_80x80.jpg"/>
                </div>
                <div class="text-info">
                    <span class="J_Price price-now">¥39.00</span>
                    <span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
                </div>
            </div>
        </form>
    </div>
</div>

<!--引导 -->
<div class="navCir">
    <li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
    <li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
    <li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>
    <li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>
</div>
<?php
//    $url = Url::to(['cart/ajax-mod']);
//    $cartJs = <<<JS
//        function changeNum(productid, productnum) {
//                // 获取参数
//                if(productid < 0){
//                    productid = 0;
//                }
//                if (productnum < 0) {
//                    productnum = 0;
//                }
//
//                // ajax提交, 加参数名就需要$.post({});
//                $.post({
//                    url : "$url",
//                    data : {'productid':productid, 'productnum':productnum},
//                    dataType : 'json',
//                    success : function(response) {
//                        consolelog(response);
//                    }
//                });
//            }
//JS;
//$this->registerJs($cartJs);
?>
<script>
    function deletePro(productid, removeObj) {
        $.get({
            url: "<?php echo Url::to(['cart/ajax-del']); ?>",
            data:{'productid': productid},
            dataType: 'json',
            success: function(response) {
                if (response.error == 0) {
                    // 移除整个商品行
                    removeObj.remove();

                    // 重置订单总价和数量
                    _changeTotal();
                }
            }
        });
    }

    function _changeTotal() {
        // 设置订单总价格,订单总价为每个商品总价列的总和
        var totalPrice = 0;
        $('.J_ItemSum').each(function(i){
            totalPrice += parseFloat($(this).text());
        });
        $('#J_Total').text(totalPrice);

        // 更新订单总数量
        var totalNum = 0;
        $('input[name="productnum"]').each(function(i){
            totalNum += parseInt($(this).val());
        });
        $('#J_SelectedItemsCount').text(totalNum);
    }

    function changeNum(productid, productnum) {
        // 获取参数
        if(productid < 0){
            productid = 0;
       }
       if (productnum < 0) {
            productnum = 0;
        }

        // ajax提交
        var postUrl = "<?php echo Url::to(['cart/ajax-mod']); ?>";
        var csrfToken = "<?php echo Yii::$app->request->csrfToken; ?>";
        $.post({
            url: postUrl,
            // contentType加了之后，post参数会变为一行,导致数据格式不一致，400Bad Request
            // contentType: "application/json; charset=utf-8",
            // yii为了防止csrf攻击，对post的表单数据封装了CSRF令牌验；所以post提交需要_csrf(basic参数名是_csrf / advanced是_csrf-backend/ YII_CSRF_TOKEN?)，否则会出现400，get不需要
            data: {"productid": productid, "productnum": productnum, "_csrf-frontend": csrfToken},
            dataType: 'json',
            success: function(response) {
                if (response.error == 0) {
                    // location.reload(); // 刷新页面，更新总价等数据
                    var saleprice = $("#saleprice-" + productid).html();
                    var total = saleprice * productnum;
                    $('#total-' + productid).html(total);

                    _changeTotal();
                }
           }
       });
    }
</script>
<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>