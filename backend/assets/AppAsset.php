<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    /*
     * 一般来说，网页内部的js文件或代码，都是放置在网页底部</body>的前面，这是因为网页自上而下加载，用户在访问我们页面的时候尽量不要因为加载js展现过长时间的空白页面
     *
     * yii2中是集成了jQuery的，而且jQuery文件是加载在页面底部的，因此，如果我们的js代码段不在页面底部加载，就很大可能会发生$未定义的提示
     *
     *
     *
     * */

    // 定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), "depends" => "backend\assets\AppAsset"]);
    }
    // 定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), "depends" => "backend\assets\AppAsset"]);
    }
}
