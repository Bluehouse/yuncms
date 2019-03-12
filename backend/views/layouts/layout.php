<?php
    use yii\helpers\Url;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html class="app-ui" lang="<?= Yii::$app->language ?>">
<head>
    <!-- Meta -->
    <meta charset="<?= Yii::$app->charset ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Document title -->
    <title>YunCMS后台管理系统</title>
    <meta name="description" content="AppUI - Admin Dashboard Template & UI Framework" />
    <meta name="author" content="rustheme" />
    <meta name="robots" content="noindex, nofollow" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="assets/v1.0/img/favicons/apple-touch-icon.png" />
    <link rel="icon" href="assets/v1.0/img/favicons/favicon.ico" />
    <!-- Page JS Plugins CSS -->
    <link rel="stylesheet" href="assets/v1.0/js/plugins/datatables/jquery.dataTables.min.css" />

    <!-- AppUI CSS stylesheets -->
    <link rel="stylesheet" id="css-font-awesome" href="assets/v1.0/css/font-awesome.css" />
    <link rel="stylesheet" id="css-ionicons" href="assets/v1.0/css/ionicons.css" />
    <link rel="stylesheet" id="css-bootstrap" href="assets/v1.0/css/bootstrap.css" />
    <link rel="stylesheet" id="css-app" href="assets/v1.0/css/app.css" />
    <link rel="stylesheet" id="css-app-custom" href="assets/v1.0/css/app-custom.css" />
    <!-- End Stylesheets -->
    <?php $this->head() ?>
</head>

<body class="app-ui layout-has-drawer layout-has-fixed-header">
<?php $this->beginBody() ?>
<div class="app-layout-canvas">
    <div class="app-layout-container">

        <!-- Drawer -->
        <aside class="app-layout-drawer">
            <!-- Drawer scroll area -->
            <div class="app-layout-drawer-scroll">
                <!-- Drawer logo -->
                <div id="logo" class="drawer-header">
                    <a href="<?php echo Url::to(['index/index']); ?>"><img class="img-responsive" src="assets/v1.0/img/logo/logo-backend.png" title="" alt="" /></a>
                </div>

                <!-- Drawer navigation -->
                <nav class="drawer-main">
                    <ul class="nav nav-drawer">
                        <li class="nav-item nav-drawer-header">Apps</li>
                        <li class="nav-item"><a href="<?php echo Url::to(['index/index']); ?>"><i class="fa fa-tachometer"></i> 控制台</a></li>

                        <?php
                            $controller = Yii::$app->controller->id;
                            $action = Yii::$app->controller->action->id;

                            foreach(Yii::$app->params['adminmenu'] as $menu) {
                                $show = "hidden";
//                                var_dump(Yii::$app->user->can($menu['module'] . '/*'));die;
                                if (Yii::$app->user->can($menu['module'] . '/*')) {
                                    $show = "show";
                                } else {
                                    if (empty($menu['submenu']) || !Yii::$app->user->can($menu['url'])) {
                                        continue;
                                    } else {
                                        foreach ($menu['submenu'] as $sub) {
                                            if (Yii::$app->user->can($menu['module'] . '/' . $sub['url'])) {
                                                $show = "show";
                                            }
                                        }
                                    }
                                }
                        ?>
                            <li class="nav-item <?php echo !empty($menu['submenu']) ? 'nav-item-has-subnav' : ''; ?> <?php echo $controller == $menu['module'] ? 'open':  ''; echo $show; ?>">
                                <a href="<?php echo $menu['url'] == '#' ? 'javascript:void(0)' : Url::to([$menu['url']]); ?>"><i class="<?php echo $menu['icon']; ?>"></i><?php echo $menu['label']; ?></a>
                                <ul class="nav nav-subnav">
                                    <?php foreach($menu['submenu'] as $sub): ?>
                                        <li><a href="<?php echo Url::to([$menu['module'] . '/' .$sub['url']]); ?>"><?php echo $sub['label']; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                        <?php } ?>

                        <li class="nav-item nav-drawer-header">后台管理</li>
                        <li class="nav-item nav-item-has-subnav active open">
                            <a href="javascript:void(0)"><i class="fa fa-users"></i>用户管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['member/list']); ?>">用户列表</a></li>
                                <li><a href="<?php echo Url::to(['member/add']); ?>">添加用户</a></li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-user"></i>管理员管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['manage/list']); ?>">管理员列表</a></li>
                                <li><a href="<?php echo Url::to(['manage/add']); ?>">添加管理员</a></li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-lock"></i>权限管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['rbac/roles']); ?>">角色列表</a></li>
                                <li><a href="<?php echo Url::to(['rbac/create-role']); ?>">创建角色</a></li>
                                <li><a href="<?php echo Url::to(['rbac/rules']); ?>">规则列表</a></li>
                                <li><a href="<?php echo Url::to(['rbac/create-rule']); ?>">添加规则</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="ion-ios-pricetags"></i> 分类管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['category/list']); ?>">分类列表</a></li>
                                <li><a href="<?php echo Url::to(['category/add']); ?>">添加分类</a></li>
                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> 商品管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['product/list']); ?>">商品列表</a></li>
                                <li><a href="<?php echo Url::to(['product/add']); ?>">添加商品</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-list-alt"></i>订单管理</a>
                            <ul class="nav nav-subnav">
                                <li><a href="<?php echo Url::to(['order/list']); ?>">订单列表</a></li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <a href="javascript:void(0)"><i class="fa fa-comments"></i>评论管理 <span class="pull-right-container"> <small class="badge pull-right bg-red">new</small></span></a>
                            <ul class="nav nav-subnav">
                                <li><a href="base_ui_buttons.html">评论列表</a></li>
                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-cogs fa-fw"></i>系统配置</a>
                            <ul class="nav nav-subnav">
                                <li><a href="base_ui_buttons.html">Buttons</a></li>
                            </ul>
                        </li>

                        <li class="nav-item nav-drawer-header">相关链接</li>
                        <li class="nav-item">
                            <a href="javascript:void(0)"><i class="fa fa-th-list text-red"></i>官网文档</a>
                            <a href="javascript:void(0)"><i class="fa fa-gratipay text-orange"></i>交流社区</a>
                            <a href="javascript:void(0)"><i class="fa fa-qq text-blue"></i>QQ交流群</a>
                        </li>

                    </ul>
                </nav>
                <!-- End drawer navigation -->
                <div class="drawer-footer">
                    <p class="copyright">Copyright &copy; Philisen Studio. </p>
                </div>
            </div>
            <!-- End drawer scroll area -->
        </aside>
        <!-- End drawer -->

        <!-- Header -->
        <header class="app-layout-header">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#header-navbar-collapse" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <button class="pull-left hidden-lg hidden-md navbar-toggle" type="button" data-toggle="layout" data-action="sidebar_toggle">
                            <span class="sr-only">Toggle drawer</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <span class="navbar-page-title">

					控制台
				</span>
                    </div>

                    <div class="collapse navbar-collapse" id="header-navbar-collapse">
                        <!-- Header search form -->
                        <form class="navbar-form navbar-left app-search-form" role="search">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="search" id="search-input" placeholder="站内搜索..." />
                                    <span class="input-group-btn">
								<button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
							</span>
                                </div>
                            </div>
                        </form>

                        <ul id="main-menu" class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">站点语言：中文 <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">English</a></li>
                                </ul>
                            </li>
                        </ul>
                        <!-- .navbar-left -->

                        <ul class="nav navbar-nav navbar-right navbar-toolbar hidden-sm hidden-xs">
                            <li>
                                <!-- Opens the modal found at the bottom of the page -->
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#apps-modal"><i class="ion-grid"></i></a>
                            </li>

                            <li class="dropdown">
                                <a href="javascript:void(0)" data-toggle="dropdown"><i class="ion-ios-bell"></i> <span class="badge">3</span></a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Profile</li>
                                    <li>
                                        <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">3</span> News </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:void(0)"><span class="badge pull-right">1</span> Messages </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">More</li>
                                    <li>
                                        <a tabindex="-1" href="javascript:void(0)">Edit Profile..</a>
                                    </li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-profile">
                                <a href="javascript:void(0)" data-toggle="dropdown">
                                    <span class="m-r-sm"><?php echo Yii::$app->session['admin']['adminuser']; ?> <span class="caret"></span></span>
                                    <img class="img-avatar img-avatar-48" src="assets/v1.0/img/avatars/avatar3.jpg" alt="User profile pic" />
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">
                                        Pages
                                    </li>
                                    <li>
                                        <a href="base_pages_profile.html">个人设置</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['public/change-pass']); ?>">锁屏</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo Url::to(['public/logout']); ?>">退出</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <!-- .navbar-right -->
                    </div>
                </div>
                <!-- .container-fluid -->
            </nav>
            <!-- .navbar-default -->
        </header>
        <!-- End header -->

        <main class="app-layout-content">
            <!-- Page Content -->
            <?php echo $content; ?>
            <!-- End Page Content -->
        </main>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->

<!-- Apps Modal -->
<div id="apps-modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-sm modal-dialog modal-dialog-top">
        <div class="modal-content">
            <!-- Apps card -->
            <div class="card m-b-0">
                <div class="card-header bg-app bg-inverse">
                    <h4>站点首页</h4>
                    <ul class="card-actions">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="ion-close"></i></button>
                        </li>
                    </ul>
                </div>
                <div class="card-block">
                    <div class="row text-center">
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-tertiary bg-inverse" href="/">
                                <i class="ion-laptop fa-4x"></i>
                                <p>后台</p>
                            </a>
                        </div>
                        <div class="col-xs-6">
                            <a class="card card-block m-b-0 bg-app-secondary bg-inverse" href="http://www.yuncms.com" target="_blank">
                                <i class="ion-speedometer fa-4x"></i>
                                <p>前台</p>
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
<!-- End Apps Modal -->

<div class="app-ui-mask-modal"></div>

<!-- AppUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock and App.js -->
<script src="assets/v1.0/js/core/jquery.min.js"></script>
<script src="assets/v1.0/js/core/bootstrap.min.js"></script>
<script src="assets/v1.0/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/v1.0/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/v1.0/js/core/jquery.placeholder.min.js"></script>
<script src="assets/v1.0/js/app.js"></script>
<script src="assets/v1.0/js/app-custom.js"></script>

<?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>