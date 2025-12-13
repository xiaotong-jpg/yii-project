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
        'assets/css/bootstrap.min.css',
        'venobox/venobox.css',
        'assets/css/plugin_theme_css.css',
        'css/style.css',
        'assets/css/responsive.css',
        'css/site.css',
    ];
    public $js = [
        'assets/js/vendor/jquery-3.5.1.min.js',
        'assets/js/bootstrap.min.js',
        'assets/js/isotope.pkgd.min.js',
        'assets/js/owl.carousel.min.js',
        'assets/js/jquery.nivo.slider.pack.js',
        'assets/js/slick.min.js',
        'assets/js/imagesloaded.pkgd.min.js',
        'venobox/venobox.min.js',
        'assets/js/jquery.appear.js',
        'assets/js/jquery.knob.js',
        'assets/js/theme-pluginjs.js',
        'assets/js/jquery.meanmenu.js',
        'assets/js/ajax-mail.js',
        'assets/js/theme.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
