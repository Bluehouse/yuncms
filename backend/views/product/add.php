<?php

//    use backend\assets\DemoAsset;
//    DemoAsset::register($this);

//    use backend\assets\AppAsset;
//    AppAsset::register($this);
//
//    // 该部分会注册到底部 （一开始资源包下载的不对，一定要从主页进去下载https://github.com/fex-team/umeditor）
//    // 引入样式文件
//    AppAsset::addCss($this, "@web/plugin/umeditor/themes/default/_css/umeditor.css");
//    // 引入模板文件
//    AppAsset::addScript($this, "@web/plugin/umeditor/third-party/template.min.js");
//    // 引入配置文件
//    AppAsset::addScript($this, "@web/plugin/umeditor/umeditor.config.js");
//    // 引入语言包
//    AppAsset::addScript($this, "@web/plugin/umeditor/lang/zh-cn/zh-cn.js");
//    // 引入编码器源文件
//    AppAsset::addScript($this, "@web/plugin/umeditor/_src/editor.js");
?>

<?php echo $this->render('_form', ['model' => $model, 'cateList' => $cateList]); ?>