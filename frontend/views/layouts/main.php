<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title ? $this->title : 'Lorw - Defense Lawyers and law Website Template') ?></title>
    <link rel="icon" type="image/png" href="<?= Url::to('@web/assets/images/favicon.png') ?>">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="em40_header_area_main">
    <div class="lorw-header-top">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-lg-8 col-xl-8 col-md-12 col-sm-12">
                    <div class="top-address text-left">
                        <p><span><i class="icofont-home"></i>2nd Floor New World.</span> 
                           <a href="tel:+998556778345"><i class="icofont-ui-call"></i>+998556778345</a> 
                           <a href="mailto:demo@example.com"><i class="icofont-envelope"></i>demo@example.com </a>
                        </p>
                    </div>
                </div>
                <div class="col-xs-12 col-lg-4 col-xl-4 col-md-12 col-sm-12 ">
                    <div class="top-right-menu">
                        <ul class="social-icons text-right text_m_center">
                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END HEADER TOP AREA -->
    <div class="lorw-main-menu one_page hidden-xs hidden-sm  witr_h_h10">
        <div class="lorw_nav_area scroll_fixed postfix">
            <div class="container">
                <div class="row logo-left">
                    <div class="col-md-3 col-sm-3 col-xs-4">
                        <div class="logo">
                            <a class="main_sticky_main_l" href="<?= Url::to(['/site/index']) ?>" title="lorw">
                            <img src="<?= Url::to('@web/assets/images/logo1.png') ?>" alt="lorw">
                            </a>
                            <a class="main_sticky_l" href="<?= Url::to(['/site/index']) ?>" title="lorw">
                            <img src="<?= Url::to('@web/assets/images/logo2.png') ?>" alt="lorw">
                            </a>
                        </div>
                    </div>
                    <!-- MAIN MENU -->
                    <div class="col-md-9 col-sm-9 col-xs-8">
                        <div class="tx_mmenu_together">
                            <nav class="lorw_menu">
                                <ul class="sub-menu">
                                    <li class="menu-item-has-children">
                                        <a href="#">Home</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::to(['/site/index']) ?>">Home Page</a></li>
                                            <li><a href="<?= Url::to(['/site/home02']) ?>">Home 02</a></li>
                                            <li><a href="<?= Url::to(['/site/landing-page']) ?>">Landing Page</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">About</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::to(['/site/about']) ?>">About</a></li>
                                            <li><a href="<?= Url::to(['/site/team']) ?>">Team</a></li>
                                            <li><a href="<?= Url::to(['/site/single-team']) ?>">Single Team</a></li>
                                            <li><a href="<?= Url::to(['/site/pricing']) ?>">Pricing</a></li>
                                            <li><a href="<?= Url::to(['/site/faq-page']) ?>">FAQ Page</a></li>
                                            <li><a href="<?= Url::to(['/site/google-map']) ?>">Google Map</a></li>
                                            <li><a href="<?= Url::to(['/site/testimonial']) ?>">Testimonial</a></li>
                                            <li><a href="<?= Url::to(['/site/why-choose-us']) ?>">Why Choose Us</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Practice</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::to(['/site/family-law']) ?>">Family Law</a></li>
                                            <li><a href="<?= Url::to(['/site/real-estate-law']) ?>">Real Estate Law</a></li>
                                            <li><a href="<?= Url::to(['/site/health-law']) ?>">Health Law</a></li>
                                            <li><a href="<?= Url::to(['/site/criminal-law']) ?>">Criminal Law</a></li>
                                            <li><a href="<?= Url::to(['/site/banking-law']) ?>">Banking Law</a></li>
                                            <li><a href="<?= Url::to(['/site/tax-law']) ?>">Tax Law</a></li>
                                            <li><a href="<?= Url::to(['/site/single-service']) ?>">Single Service</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Attorney</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::to(['/site/project']) ?>">Project</a></li>
                                            <li><a href="<?= Url::to(['/site/two-column']) ?>">Two-Column</a></li>
                                            <li><a href="<?= Url::to(['/site/three-column']) ?>">Three-Column</a></li>
                                            <li><a href="<?= Url::to(['/site/four-column']) ?>">Four-Column</a></li>
                                            <li><a href="<?= Url::to(['/site/two-column-gutter']) ?>">Two-Column Gutter</a></li>
                                            <li><a href="<?= Url::to(['/site/three-column-gutter']) ?>">Three-Column Gutter</a></li>
                                            <li><a href="<?= Url::to(['/site/four-column-gutter']) ?>">Four-Column Gutter</a></li>
                                            <li><a href="<?= Url::to(['/site/single-project']) ?>">Single Project</a></li>
                                        </ul>
                                    </li>
                                    <li class="menu-item-has-children">
                                        <a href="#">Blog</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= Url::to(['/site/blog']) ?>">Blog</a></li>
                                            <li><a href="<?= Url::to(['/site/blog-left-sidebar']) ?>">Blog Left Sidebar</a></li>
                                            <li><a href="<?= Url::to(['/site/blog-right-sidebar']) ?>">Blog Right Sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
                                    <?php if (Yii::$app->user->isGuest): ?>
                                        <li><a href="<?= Url::to(['/site/login']) ?>">Login</a></li>
                                        <li><a href="<?= Url::to(['/site/signup']) ?>">Signup</a></li>
                                    <?php else: ?>
                                        <li>
                                            <?= Html::beginForm(['/site/logout'], 'post') ?>
                                            <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout', 'style' => 'background: none; border: none; color: inherit; padding: 10px 15px;']) ?>
                                            <?= Html::endForm() ?>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </nav>
                            <div class="main-search-menu">
                                <div class="em-quearys-top msin-menu-search">
                                    <div class="em-top-quearys-area">
                                        <div class="em-header-quearys">
                                            <div class="em-quearys-menu">
                                                <i class="icofont-search-2 t-quearys"></i>
                                            </div>
                                        </div>
                                        <!--SEARCH FORM-->
                                        <div class="em-quearys-inner">
                                            <div class="em-quearys-form">
                                                <form class="top-form-control" action="#" method="get">
                                                    <input type="text" placeholder="Type Your Keyword" name="s" value="">
                                                    <button class="top-quearys-style" type="submit">
                                                    <i class="icofont-long-arrow-right"></i>
                                                    </button>
                                                </form>
                                                <div class="em-header-quearys-close text-center mrt10">
                                                    <div class="em-quearys-menu">
                                                        <i class="icofont-close-line t-close"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- menu button -->
                            <div class="donate-btn-header">
                                <a class="dtbtn" href="#">Set Me</a>	
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU Logo AREA -->
<div class="mobile_logo_area hidden-md hidden-lg">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="mobile_menu_logo text-center">
                    <a href="<?= Url::to(['/site/index']) ?>" title="lorw">
                    <img src="<?= Url::to('@web/assets/images/logo1.png') ?>" alt="lorw">
                    </a>		
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU AREA -->
<div class="home-2 mbm hidden-md hidden-lg  header_area main-menu-area">
    <div class="menu_area mobile-menu">
        <nav class="lorw_menu">
            <ul class="sub-menu">
                <li class="menu-item-has-children">
                    <a href="#">Home</a>
                    <ul class="sub-menu">
                        <li><a href="<?= Url::to(['/site/index']) ?>">Home Page</a></li>
                        <li><a href="<?= Url::to(['/site/home02']) ?>">Home 02</a></li>
                        <li><a href="<?= Url::to(['/site/landing-page']) ?>">Landing Page</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">About</a>
                    <ul class="sub-menu">
                        <li><a href="<?= Url::to(['/site/about']) ?>">About</a></li>
                        <li><a href="<?= Url::to(['/site/team']) ?>">Team</a></li>
                        <li><a href="<?= Url::to(['/site/single-team']) ?>">Single Team</a></li>
                        <li><a href="<?= Url::to(['/site/pricing']) ?>">Pricing</a></li>
                        <li><a href="<?= Url::to(['/site/faq-page']) ?>">FAQ Page</a></li>
                        <li><a href="<?= Url::to(['/site/google-map']) ?>">Google Map</a></li>
                        <li><a href="<?= Url::to(['/site/testimonial']) ?>">Testimonial</a></li>
                        <li><a href="<?= Url::to(['/site/why-choose-us']) ?>">Why Choose Us</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Practice</a>
                    <ul class="sub-menu">
                        <li><a href="<?= Url::to(['/site/family-law']) ?>">Family Law</a></li>
                        <li><a href="<?= Url::to(['/site/real-estate-law']) ?>">Real Estate Law</a></li>
                        <li><a href="<?= Url::to(['/site/health-law']) ?>">Health Law</a></li>
                        <li><a href="<?= Url::to(['/site/criminal-law']) ?>">Criminal Law</a></li>
                        <li><a href="<?= Url::to(['/site/banking-law']) ?>">Banking Law</a></li>
                        <li><a href="<?= Url::to(['/site/tax-law']) ?>">Tax Law</a></li>
                        <li><a href="<?= Url::to(['/site/single-service']) ?>">Single Service</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Attorney</a>
                    <ul class="sub-menu">
                        <li><a href="<?= Url::to(['/site/project']) ?>">Project</a></li>
                        <li><a href="<?= Url::to(['/site/two-column']) ?>">Two-Column</a></li>
                        <li><a href="<?= Url::to(['/site/three-column']) ?>">Three-Column</a></li>
                        <li><a href="<?= Url::to(['/site/four-column']) ?>">Four-Column</a></li>
                        <li><a href="<?= Url::to(['/site/two-column-gutter']) ?>">Two-Column Gutter</a></li>
                        <li><a href="<?= Url::to(['/site/three-column-gutter']) ?>">Three-Column Gutter</a></li>
                        <li><a href="<?= Url::to(['/site/four-column-gutter']) ?>">Four-Column Gutter</a></li>
                        <li><a href="<?= Url::to(['/site/single-project']) ?>">Single Project</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="#">Blog</a>
                    <ul class="sub-menu">
                        <li><a href="<?= Url::to(['/site/blog']) ?>">Blog</a></li>
                        <li><a href="<?= Url::to(['/site/blog-left-sidebar']) ?>">Blog Left Sidebar</a></li>
                        <li><a href="<?= Url::to(['/site/blog-right-sidebar']) ?>">Blog Right Sidebar</a></li>
                    </ul>
                </li>
                <li><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                    <li><a href="<?= Url::to(['/site/login']) ?>">Login</a></li>
                    <li><a href="<?= Url::to(['/site/signup']) ?>">Signup</a></li>
                <?php else: ?>
                    <li>
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <?= Html::submitButton('Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link logout', 'style' => 'background: none; border: none; color: inherit; padding: 10px 15px;']) ?>
                        <?= Html::endForm() ?>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
<!-- END MOBILE MENU AREA  -->

<?= Alert::widget() ?>
<?= $content ?>

<!-- footer area -->
<div class="witrfm_area">
    <!-- FOOTER MIDDLE AREA -->
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-6  col-lg-3">
                    <div id="twr_deslorwiption_widget-2">
                        <div class="lorw-deslorwiption-area">
                            <a href="<?= Url::to(['/site/index']) ?>"><img src="<?= Url::to('@web/assets/images/logo2.png') ?>" alt="image" /></a>
                            <p>Round whitefish flat loach potted killifish ronquil. Long-finned pike escolar northern pike escolar nor thern squawfish eel.</p>
                            <p class="phone"><a href="tel: "> </a></p>
                            <div class="social-icons">
                                <a class="facebook" href="#"><i class="icofont-facebook"></i></a>
                                <a class="twitter" href="#"><i class="icofont-twitter"></i></a>
                                <a class="Pinterest" href="#"><i class="icofont-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6  col-lg-3">
                    <div class="widget widget_nav_menu">
                        <h2 class="widget-title">QUICK LINKS</h2>
                        <div class="menu-useful-links-container">
                            <ul class="menu">
                                <li><a href="#">Who We Are</a></li>
                                <li><a href="#">How We Help</a></li>
                                <li><a href="#">Core Values</a></li>
                                <li><a href="#">Differently Abled</a></li>
                                <li><a href="#">Careers</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6  col-lg-3">
                    <div class="widget about_us">
                        <h2 class="widget-title">OUR ADDRESS</h2>
                        <div class="about-footer">
                            <div class="footer-widget address">
                                <div class="footer-logo">
                                    <p>Lorem ipsum dolor sit amet, consetur acing elit, sed do eiusmod</p>
                                </div>
                                <div class="footer-address">
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"><i class="icofont-google-map"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>1st Floor New World</p>
                                        </div>
                                    </div>
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"><i class="icofont-phone"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>938556778358</p>
                                        </div>
                                    </div>
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"> <i class="icofont-ui-clock"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>info@example.com</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6  col-lg-3">
                    <div class="widget widget_recent_data">
                        <div class="single-widget-item">
                            <h2 class="widget-title">Resemt Posts</h2>
                            <div class="recent-post-item">
                                <div class="recent-post-image"> 
                                    <a href="#"> 
                                    <img src="<?= Url::to('@web/assets/images/blogs2.jpg') ?>" alt="image" />
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h4><a href="#"> The will you know success when it shows </a></h4>
                                    <span class="rcomment">March 16, 2022</span>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <div class="recent-post-image"> 
                                    <a href="#"> 
                                    <img src="<?= Url::to('@web/assets/images/blogs1.jpg') ?>" alt="image" />
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h4><a href="#">  How will you know success when it shows </a></h4>
                                    <span class="rcomment">March 16, 2022</span>
                                </div>
                            </div>
                            <div class="recent-post-item">
                                <div class="recent-post-image"> 
                                    <a href="#"> 
                                    <img src="<?= Url::to('@web/assets/images/blogs3.jpg') ?>" alt="image" />
                                    </a>
                                </div>
                                <div class="recent-post-text">
                                    <h4><a href="#"> It is a long established fact a reader will be </a></h4>
                                    <span class="rcomment">March 16, 2022</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END FOOTER MIDDLE AREA -->
    <!-- FOOTER BOTTOM AREA -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <div class="copy-right-text">
                        <p>Copyright &copy; <?= date('Y') ?> all rights reserved. <a target="_blank" href="https://www.mobanwang.com/" title="网站模板" class="text-white">网站模板</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <div class="footer-menu text-right">
                        <ul>
                            <li><a href="<?= Url::to(['/site/index']) ?>">Home</a></li>
                            <li><a href="<?= Url::to(['/site/about']) ?>">About</a></li>
                            <li><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
                            <li><a href="<?= Url::to(['/site/faq-page']) ?>">FAQ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
