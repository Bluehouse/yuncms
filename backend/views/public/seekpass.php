<?php
use yii\bootstrap\ActiveForm; // 该类帮助创建form组件
use yii\helpers\Html; // 引入助手类
use yii\helpers\Url;
?>

<!DOCTYPE html>

<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <!-- Document title -->
    <title>Frontend - Login</title>
    <meta name="description" content="AppUI - Frontend Template & UI Framework"/>
    <meta name="robots" content="noindex, nofollow"/>

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/v1.0/img/favicons/apple-touch-icon.png"/>
    <link rel="icon" href="assets/v1.0/img/favicons/favicon.ico"/>

    <!-- Google fonts -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,400italic,500,900%7CRoboto+Slab:300,400%7CRoboto+Mono:400"/>

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="assets/v1.0/css/font-awesome.css"/>
    <link rel="stylesheet" id="css-ionicons" href="assets/v1.0/css/ionicons.css"/>
    <link rel="stylesheet" id="css-bootstrap" href="assets/v1.0/css/bootstrap.css"/>
    <link rel="stylesheet" id="css-app" href="assets/v1.0/css/app.css"/>
    <link rel="stylesheet" id="css-app-custom" href="assets/v1.0/css/app-custom.css"/>
    <!-- End Stylesheets -->
</head>

<body class="app-ui">
<div class="app-layout-canvas">
    <div class="app-layout-container">
        <main class="app-layout-content">
            <!-- Page header -->
            <div class="page-header bg-green bg-inverse">
                <div class="container">
                    <!-- Section Content -->
                    <div class="p-y-lg text-center">
                        <h1 class="display-2">YunCMS后台管理中心</h1>
                        <p class="text-muted">Unlimited ideas. Unlimited power. Unlimited joy. Unlimited
                            opportunities.</p>
                    </div>
                    <!-- End Section Content -->
                </div>
            </div>
            <!-- End Page header -->

            <!-- Page content -->
            <div class="page-content">
                <div class="container">
                    <div class="row">
                        <!-- Login card -->
                        <div class="col-md-4 col-md-offset-4">
                            <div class="card">
                                <h3 class="card-header h4">找回密码</h3>
                                <?php if (Yii::$app->session->hasFlash("info")) {
                                    echo Yii::$app->session->getFlash("info");
                                }
                                ?>
                                <div class="card-block">
                                    <?php $form = ActiveForm::begin([
                                        'fieldConfig' => [
                                            'template' =>  '{input}{error}'
                                        ]]); ?>
                                    <div class="form-group">
                                        <?php echo $form->field($model, 'adminuser')->textInput(['class' => 'form-control', 'placeholder' => '账号']); ?>
                                    </div>
                                    <div class="form-group">
                                        <?php echo $form->field($model, 'adminemail')->textInput(['class' => 'form-control', 'placeholder' => '邮箱'])?>
                                    </div>
                                    <a href="<?php echo Url::to(['public/login']); ?>">返回登录</a>
                                    <?php echo Html::submitButton("提交", ["class" => "btn btn-app btn-block"]); ?>
                                    <?php ActiveForm::end();?>
                                </div>
                            </div>
                        </div>
                        <!-- End login -->
                    </div>
                </div>
            </div>
            <!-- End page content -->
        </main>

        <footer class="app-layout-footer">
            <div class="container p-y-md">
                <div class="pull-right hidden-sm hidden-xs">
                </div>
                <div class="pull-left text-center text-md-left">
                    AppUI &copy; <span class="js-year-copy"></span>
                </div>
            </div>
        </footer>
    </div>
</div>

<!-- Apps Modal -->
<!-- Opens from the button in the header -->
<div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps card -->
            <div class="card m-b-0">
                <div class="card-header bg-app bg-inverse">
                    <h4>Apps</h4>
                    <ul class="card-actions">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="index.html">
                                <i class="ion-speedometer fa-4x"></i>
                                <p>Admin</p>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="frontend_home.html">
                                <i class="ion-laptop fa-4x"></i>
                                <p>Frontend</p>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- .card-block -->
            </div>
            <!-- End Apps card -->
        </div>
    </div>
</div>

<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="assets/v1.0/js/core/jquery.min.js"></script>
<script src="assets/v1.0/js/core/bootstrap.min.js"></script>
<script src="assets/v1.0/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/v1.0/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/v1.0/js/core/jquery.placeholder.min.js"></script>
<script src="assets/v1.0/js/app.js"></script>
<script src="assets/v1.0/js/app-custom.js"></script>
</body>
</html>