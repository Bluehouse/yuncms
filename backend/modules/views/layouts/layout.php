<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
    <meta charset="utf-8" />
    <title>Be Angular | Bootstrap Admin Web App with AngularJS</title>
    <meta name="description" content="app, web app, responsive, responsive layout, admin, admin panel, admin dashboard, flat, flat ui, ui kit, AngularJS, ui route, charts, widgets, components" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="assets/v1.0/css/bootstrap.css" type="text/css" />
    <link rel="stylesheet" href="assets/v1.0/css/animate.css" type="text/css" />
    <link rel="stylesheet" href="assets/v1.0/css/font-awesome.min.css" type="text/css" />
    <link rel="stylesheet" href="assets/v1.0/css/simple-line-icons.css" type="text/css" />
    <link rel="stylesheet" href="assets/v1.0/css/font.css" type="text/css" />
    <link rel="stylesheet" href="assets/v1.0/css/app.css" type="text/css" />
</head>
<body ng-controller="AppCtrl">
<div class="app" id="app" ng-class="{'app-header-fixed':app.settings.headerFixed, 'app-aside-fixed':app.settings.asideFixed, 'app-aside-folded':app.settings.asideFolded, 'app-aside-dock':app.settings.asideDock, 'container':app.settings.container}" ui-view></div>


<!-- jQuery -->
<script src="assets/v1.0/vendor/jquery/jquery.min.js"></script>

<!-- Angular -->
<script src="assets/v1.0/vendor/angular/angular.js"></script>

<script src="assets/v1.0/vendor/angular/angular-animate/angular-animate.js"></script>
<script src="assets/v1.0/vendor/angular/angular-cookies/angular-cookies.js"></script>
<script src="assets/v1.0/vendor/angular/angular-resource/angular-resource.js"></script>
<script src="assets/v1.0/vendor/angular/angular-sanitize/angular-sanitize.js"></script>
<script src="assets/v1.0/vendor/angular/angular-touch/angular-touch.js"></script>
<!-- Vendor -->
<script src="assets/v1.0/vendor/angular/angular-ui-router/angular-ui-router.js"></script>
<script src="assets/v1.0/vendor/angular/ngstorage/ngStorage.js"></script>

<!-- bootstrap -->
<script src="assets/v1.0/vendor/angular/angular-bootstrap/ui-bootstrap-tpls.js"></script>
<!-- lazyload -->
<script src="assets/v1.0/vendor/angular/oclazyload/ocLazyLoad.js"></script>
<!-- translate -->
<script src="assets/v1.0/vendor/angular/angular-translate/angular-translate.js"></script>
<script src="assets/v1.0/vendor/angular/angular-translate/loader-static-files.js"></script>
<script src="assets/v1.0/vendor/angular/angular-translate/storage-cookie.js"></script>
<script src="assets/v1.0/vendor/angular/angular-translate/storage-local.js"></script>

<!-- App -->
<script src="assets/v1.0/js/app.js"></script>
<script src="assets/v1.0/js/config.js"></script>
<script src="assets/v1.0/js/config.lazyload.js"></script>
<script src="assets/v1.0/js/config.router.js"></script>
<script src="assets/v1.0/js/main.js"></script>
<script src="assets/v1.0/js/services/ui-load.js"></script>
<script src="assets/v1.0/js/filters/fromNow.js"></script>
<script src="assets/v1.0/js/directives/setnganimate.js"></script>
<script src="assets/v1.0/js/directives/ui-butterbar.js"></script>
<script src="assets/v1.0/js/directives/ui-focus.js"></script>
<script src="assets/v1.0/js/directives/ui-fullscreen.js"></script>
<script src="assets/v1.0/js/directives/ui-jq.js"></script>
<script src="assets/v1.0/js/directives/ui-module.js"></script>
<script src="assets/v1.0/js/directives/ui-nav.js"></script>
<script src="assets/v1.0/js/directives/ui-scroll.js"></script>
<script src="assets/v1.0/js/directives/ui-shift.js"></script>
<script src="assets/v1.0/js/directives/ui-toggleclass.js"></script>
<script src="assets/v1.0/js/directives/ui-validate.js"></script>
<script src="assets/v1.0/js/controllers/bootstrap.js"></script>

<!-- Lazy loading -->
</body>
</html>