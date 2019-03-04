<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Class DemoAsset
 *
 * Yii 中的资源是和 Web 页面相关的文件，可为 CSS 文件，JavaScript 文件，图片或视频等， 资源放在 Web 可访问的目录下，直接被 Web 服务器调用
 *
 * 通过程序自动管理资源更好一点，例如，当你在页面中使用 yii\jui\DatePicker 小部件时， 它会自动包含需要的 CSS 和 JavaScript 文件， 而不是要求你手工去找到这些文件并包含， 当你升级小部件时，它会自动使用新版本的资源文件???
 *
 * 资源包简单的说就是放在一个目录下的资源集合， 当在视图中注册一个资源包， 在渲染 Web 页面时会包含包中的 CSS 和 js 文件
 *
 * 资源包指定为继承 yii\web\AssetBundle 的 PHP 类， 包名为可自动加载的 PHP 类名， 在资源包类中，要指定资源所在位置， 包含哪些 CSS 和 JavaScript 文件以及和其他包的依赖关系
 *
 * 资源文件和 PHP 源代码放在一起，不能被 Web 直接访问，为了使用这些源资源（源资源）， 它们要拷贝到一个可 Web 访问的 Web 目录中 成为发布的资源，这个过程称为发布资源
 *
 * 推荐将资源文件放到 Web 目录以避免不必要的发布资源过程
 *
 * 测试资源包，用来发布资源：也就是将资源文件拷贝到@web/assets目录;
 * demo.css就在web目录，直接定义basePath（物理路径）,baseURl（web可访问路径），如果不在，需要定义sourcePath，sourceUrl
 *
 * 发布资源的方式是注册资源到指定位置，在视图资源调用backend\assets\DemoAsset::register($this);
 *
 *
 * <?php $this->beginBody() ?>
<?php echo $content;?>
<?php $this->endBody() ?>
<?php $this->head() ?>
<?php $this->beginPage() ?>
<?php $this->endPage();?>
 *
 * @package backend\assets
 */
class DemoAsset extends AssetBundle{
    // 定义资源包路径
    public $basePath = "@webroot";
    public $baseUrl = "@web";

    // 定义该资源包包含的资源：有哪些js和css等，只应使用正斜杠“/”作为目录分隔符，相对路径表示为本地文件
    public $css = [
        'css/demo.css',
    ];
    public $js = [
    ];

    // 定义资源包的依赖
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}