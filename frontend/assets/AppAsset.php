<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/template/bootstrap.min.css',
        'venobox/venobox.css',
        'css/template/plugin_theme_css.css',
        'css/style.css',
        'css/template/responsive.css',
        'css/site.css',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/isotope.pkgd.min.js',
        'js/owl.carousel.min.js',
        'js/jquery.nivo.slider.pack.js',
        'js/slick.min.js',
        'js/imagesloaded.pkgd.min.js',
        'venobox/venobox.min.js',
        'js/jquery.appear.js',
        'js/jquery.knob.js',
        'js/theme-pluginjs.js',
        'js/jquery.meanmenu.js',
        'js/ajax-mail.js',
        'js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
    
    ];
}
