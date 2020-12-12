<?php

namespace app\assets;

use yii\web\AssetBundle;

class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        'css/themify-icons.css',
        'css/superfish.css',
        'css/easy-responsive-tabs.css',
//        'css/fontawesome-all.min.css',
        'css/fontawesome-all.min.css',
        'css/style.css'
    ];
    public $js = [
        'js/scrollReveal.js',
        'js/superfish.js',
        'js/easyResponsiveTabs.js',
//        'js/jquery.bgswitcher.js',
//        'js/wow.min.js',
        'js/velocity.min.js',
        'js/velocity.ui.min.js',
        'js/main.js'
    ];
    public $depends = [
//        'yii\web\JQueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];
}
