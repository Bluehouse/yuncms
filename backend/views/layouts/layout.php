<!DOCTYPE html>

<html class="app-ui">

<head>
    <!-- Meta -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

    <!-- Document title -->
    <title>Tables &ndash; Data tables</title>

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
</head>

<body class="app-ui layout-has-drawer layout-has-fixed-header">
<div class="app-layout-canvas">
    <div class="app-layout-container">

        <!-- Drawer -->
        <aside class="app-layout-drawer">

            <!-- Drawer scroll area -->
            <div class="app-layout-drawer-scroll">
                <!-- Drawer logo -->
                <div id="logo" class="drawer-header">
                    <a href="index.html"><img class="img-responsive" src="assets/v1.0/img/logo/logo-backend.png" title="" alt="" /></a>
                </div>

                <!-- Drawer navigation -->
                <nav class="drawer-main">
                    <ul class="nav nav-drawer">

                        <li class="nav-item nav-drawer-header">Apps</li>

                        <li class="nav-item">
                            <a href="index.html"><i class="fa fa-tachometer"></i> 控制台</a>
                        </li>

                        <li class="nav-item nav-drawer-header">用户管理</li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-male"></i>用户管理</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_ui_buttons.html">Buttons</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards.html">Cards</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards_api.html">Cards API</a>
                                </li>

                                <li>
                                    <a href="base_ui_layout.html">Layout</a>
                                </li>

                                <li>
                                    <a href="base_ui_grid.html">Grid</a>
                                </li>

                                <li>
                                    <a href="base_ui_icons.html">Icons</a>
                                </li>

                                <li>
                                    <a href="base_ui_modals_tooltips.html">Modals / Tooltips</a>
                                </li>

                                <li>
                                    <a href="base_ui_alerts_notify.html">Alerts / Notify</a>
                                </li>

                                <li>
                                    <a href="base_ui_pagination.html">Pagination</a>
                                </li>

                                <li>
                                    <a href="base_ui_progress.html">Progress</a>
                                </li>

                                <li>
                                    <a href="base_ui_tabs.html">Tabs</a>
                                </li>

                                <li>
                                    <a href="base_ui_typography.html">Typography</a>
                                </li>

                                <li>
                                    <a href="base_ui_widgets.html">Widgets</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-user"></i>管理员管理</a>
                            <ul class="nav nav-subnav">
                                <li>
                                    <a href="<?php echo yii\helpers\Url::to(['manage/list']); ?>">管理员列表</a>
                                </li>

                                <li>
                                    <a href="<?php echo yii\helpers\Url::to(['manage/add']); ?>">添加管理员</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-lock"></i>权限管理</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_forms_elements.html">Elements</a>
                                </li>

                                <li>
                                    <a href="base_forms_samples.html">Samples</a>
                                </li>

                            </ul>
                        </li>



                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="ion-ios-pricetags"></i> 分类管理</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_pages_blank.html">Blank</a>
                                </li>

                                <li>
                                    <a href="base_pages_inbox.html">Inbox</a>
                                </li>

                                <li>
                                    <a href="base_pages_invoice.html">Invoice</a>
                                </li>

                                <li>
                                    <a href="base_pages_profile.html">Profile</a>
                                </li>

                                <li>
                                    <a href="base_pages_search.html">Search</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-shopping-cart"></i> 商品管理</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_js_maps.html">Maps</a>
                                </li>

                                <li>
                                    <a href="base_js_sliders.html">Sliders</a>
                                </li>

                                <li>
                                    <a href="base_js_charts_flot.html">Charts - Flot</a>
                                </li>

                                <li>
                                    <a href="base_js_charts_chartjs.html">Charts - Chart.js</a>
                                </li>

                                <li>
                                    <a href="base_js_charts_sparkline.html">Charts - Sparkline</a>
                                </li>

                                <li>
                                    <a href="base_js_draggable.html">Draggable</a>
                                </li>

                                <li>
                                    <a href="base_js_syntax_highlight.html">Syntax highlight</a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav active open">
                            <a href="javascript:void(0)"><i class="fa fa-list-alt"></i> 订单管理</a>
                            <ul class="nav nav-subnav">

                            </ul>
                        </li>

                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-comments"></i>评论管理</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_ui_buttons.html">Buttons</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards.html">Cards</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards_api.html">Cards API</a>
                                </li>

                                <li>
                                    <a href="base_ui_layout.html">Layout</a>
                                </li>

                                <li>
                                    <a href="base_ui_grid.html">Grid</a>
                                </li>

                                <li>
                                    <a href="base_ui_icons.html">Icons</a>
                                </li>

                                <li>
                                    <a href="base_ui_modals_tooltips.html">Modals / Tooltips</a>
                                </li>

                                <li>
                                    <a href="base_ui_alerts_notify.html">Alerts / Notify</a>
                                </li>

                                <li>
                                    <a href="base_ui_pagination.html">Pagination</a>
                                </li>

                                <li>
                                    <a href="base_ui_progress.html">Progress</a>
                                </li>

                                <li>
                                    <a href="base_ui_tabs.html">Tabs</a>
                                </li>

                                <li>
                                    <a href="base_ui_typography.html">Typography</a>
                                </li>

                                <li>
                                    <a href="base_ui_widgets.html">Widgets</a>
                                </li>

                            </ul>
                        </li>
                        <li class="nav-item nav-item-has-subnav">
                            <a href="javascript:void(0)"><i class="fa fa-cog"></i>系统配置</a>
                            <ul class="nav nav-subnav">

                                <li>
                                    <a href="base_ui_buttons.html">Buttons</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards.html">Cards</a>
                                </li>

                                <li>
                                    <a href="base_ui_cards_api.html">Cards API</a>
                                </li>

                                <li>
                                    <a href="base_ui_layout.html">Layout</a>
                                </li>

                                <li>
                                    <a href="base_ui_grid.html">Grid</a>
                                </li>

                                <li>
                                    <a href="base_ui_icons.html">Icons</a>
                                </li>

                                <li>
                                    <a href="base_ui_modals_tooltips.html">Modals / Tooltips</a>
                                </li>

                                <li>
                                    <a href="base_ui_alerts_notify.html">Alerts / Notify</a>
                                </li>

                                <li>
                                    <a href="base_ui_pagination.html">Pagination</a>
                                </li>

                                <li>
                                    <a href="base_ui_progress.html">Progress</a>
                                </li>

                                <li>
                                    <a href="base_ui_tabs.html">Tabs</a>
                                </li>

                                <li>
                                    <a href="base_ui_typography.html">Typography</a>
                                </li>

                                <li>
                                    <a href="base_ui_widgets.html">Widgets</a>
                                </li>

                            </ul>
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

					Tables &ndash; Data tables
				</span>
                    </div>

                    <div class="collapse navbar-collapse" id="header-navbar-collapse">
                        <!-- Header search form -->
                        <form class="navbar-form navbar-left app-search-form" role="search">
                            <div class="form-group">
                                <div class="input-group">
                                    <input class="form-control" type="search" id="search-input" placeholder="Search..." />
                                    <span class="input-group-btn">
								<button class="btn" type="button"><i class="ion-ios-search-strong"></i></button>
							</span>
                                </div>
                            </div>
                        </form>

                        <ul id="main-menu" class="nav navbar-nav navbar-left">
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">English <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">French</a></li>
                                    <li><a href="javascript:void(0)">German</a></li>
                                    <li><a href="javascript:void(0)">Italian</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" data-toggle="dropdown">Pages <span class="caret"></span></a>

                                <ul class="dropdown-menu">
                                    <li><a href="javascript:void(0)">Analytics</a></li>
                                    <li><a href="javascript:void(0)">Visits</a></li>
                                    <li><a href="javascript:void(0)">Changelog</a></li>
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
                                        <a href="frontend_login_signup.html">退出</a>
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
            <!-- .container-fluid -->
            <!-- End Page Content -->

        </main>

    </div>
    <!-- .app-layout-container -->
</div>
<!-- .app-layout-canvas -->

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

<!-- Page JS Plugins -->
<script src="assets/v1.0/js/plugins/datatables/jquery.dataTables.min.js"></script>

<!-- Page JS Code -->
<script src="assets/v1.0/js/pages/base_tables_datatables.js"></script>

</body>

</html>