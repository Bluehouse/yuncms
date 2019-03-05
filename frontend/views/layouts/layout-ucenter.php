<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>登录</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="assets/v1.0/AmazeUI-2.4.2/assets/css/amazeui.css"/>
    <link href="assets/v1.0/css/dlstyle.css" rel="stylesheet" type="text/css">
    <?php $this->head(); ?>
</head>

<body>
<?php $this->beginBody(); ?>

<div class="login-boxtitle">
    <a href="home.html"><img alt="logo" src="assets/v1.0/images/logobig.png"/></a>
</div>

<?php echo $content; ?>

<div class="footer ">
    <div class="footer-hd ">
        <p>
            <a href="# ">恒望科技</a><b>|</b>
            <a href="# ">商城首页</a><b>|</b>
            <a href="# ">支付宝</a><b>|</b>
            <a href="# ">物流</a>
        </p>
    </div>
    <div class="footer-bd ">
        <p>
            <a href="# ">关于恒望</a>
            <a href="# ">合作伙伴</a>
            <a href="# ">联系我们</a>
            <a href="# ">网站地图</a>
            <em>© 2015-2019 Philisen Studio. 版权所有</em>
        </p>
    </div>
</div>
<?php $this->endBody(); ?>
</body>

</html>
<?php $this->endPage(); ?>