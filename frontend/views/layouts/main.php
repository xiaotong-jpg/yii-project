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
    <?php $this->registerCssFile('@web/css/icofont.min.css', ['depends' => [\yii\web\YiiAsset::class]]); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="<?= Url::to('@web/images/favicon.png') ?>">
    <style>
        html {
            scroll-behavior: smooth;
        }
        /* back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #8B1A1A;
            color: #fff;
            border: none;
            border-radius: 50%;
            font-size: 24px;
            cursor: pointer;
            display: none;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease, background-color 0.3s ease;
            z-index: 2147483648 !important; /* Higher than theme's scrollUp */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }
        .back-to-top.show {
            display: flex !important;
            opacity: 1 !important;
        }
        .back-to-top.back-to-top-visible {
            display: flex !important;
            opacity: 1 !important;
        }
        .back-to-top:hover {
            background-color: #a6906c;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        /* 主导航一行显示 */
        .lorw_menu .sub-menu {
            display: flex;
            align-items: center;
            flex-wrap: nowrap;   /* 禁止换行 */
        }
        /* 每个菜单项 */
        .lorw_menu .sub-menu > li {
            white-space: nowrap; /* 文字不换行 */
        }
        /* a 的内边距控制 */
        .lorw_menu .sub-menu > li > a,
        .lorw_menu .sub-menu button {
            padding: 10px 12px;
        }
        /* 压缩间距以适应更多项 */
        .lorw_menu .sub-menu > li {
            margin: 0 6px;
        }
        /* 关于我们文字金色 */
        .lorw-deslorwiption-area.text-center .widget-title,
        .lorw-deslorwiption-area.text-center p {
            color: #a6906c !important;
        }
        .lorw-deslorwiption-area.text-center .widget-title {
            font-weight: bold !important;
        }
        /* 改善footer两列排版 */
        .footer-middle .row > div {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        .footer-middle .widget_nav_menu {
            text-align: left;
            align-items: flex-start;
        }
        .footer-middle .widget-title {
            margin-bottom: 15px;
        }
        .footer-middle .menu {
            list-style: none;
            padding: 0;
        }
        .footer-middle .menu li {
            margin-bottom: 8px;
        }
        .footer-middle .menu a:hover {
            color: #a6906c !important;
        }
        .footer-middle .footer-address {
            text-align: left;
        }
    </style>
    <script>
        // Remove theme's scrollUp button before it loads
        (function(){
            var scrollUp = document.getElementById('scrollUp');
            if(scrollUp) scrollUp.remove();
            var scrollUpActive = document.getElementById('scrollUp-active');
            if(scrollUpActive) scrollUpActive.remove();
        })();
    </script>
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
                        <p>
                           <a href="https://github.com/xiaotong-jpg/yii-project/tree/feature-yii2-advanced" target="_blank" rel="noopener"><i class="bi bi-github" style="font-size:1.5rem;"></i> GitHub Project</a>
                        </p>
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
                            <!-- <a class="main_sticky_main_l" href="<?= Url::to(['/site/index']) ?>" title="lorw">
                            <img src="<?= Url::to('@web/images/logo1.png') ?>" alt="lorw">
                            </a> -->
                            <!-- <a class="main_sticky_l" href="<?= Url::to(['/site/index']) ?>" title="lorw">
                            <img src="<?= Url::to('@web/images/logo2.png') ?>" alt="lorw">
                            </a> -->
                        </div>
                    </div>
                    <!-- MAIN MENU -->
                    <div class="col-md-9 col-sm-9 col-xs-8">
                        <div class="tx_mmenu_together">
                            <nav class="lorw_menu">
                                <ul class="sub-menu">
                                    <li>
                                        <a href="#home">首页</a>
                                    </li>
                                    <li>
                                        <a href="#volunteers">志愿者风采</a>
                                    </li>
                                    <li>
                                        <a href="#museums">纪念馆巡礼</a>
                                    </li>
                                    <li>
                                        <a href="#figures">历史人物</a>
                                    </li>
                                    <li>
                                        <a href="#landmarks">重访抗战地标</a>
                                    </li>
                                    <li>
                                        <a href="#events">抗战大事记</a>
                                    </li>
                                    <li>
                                        <a href="#memories">烽火记忆</a>
                                    </li>
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
                            
                            <!-- menu button -->
                            <!-- <div class="donate-btn-header">
                                <a class="dtbtn" href="#">Set Me</a>	
                            </div> -->
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
                <!-- <div class="mobile_menu_logo text-center">
                    <a href="<?= Url::to(['/site/index']) ?>" title="lorw">
                    <img src="<?= Url::to('@web/images/logo1.png') ?>" alt="lorw">
                    </a>     
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- MOBILE MENU AREA -->
<div class="home-2 mbm hidden-md hidden-lg  header_area main-menu-area">
    <div class="menu_area mobile-menu">
        <nav class="lorw_menu">
            <ul class="sub-menu">
                <li>
                    <a href="#home">首页</a>
                </li>
                <li>
                    <a href="#volunteers">志愿者风采</a>
                </li>
                <li>
                    <a href="#museums">纪念馆巡礼</a>
                </li>
                <li>
                    <a href="#figures">历史人物</a>
                </li>
                <li>
                    <a href="#landmarks">重访抗战地标</a>
                </li>
                <li>
                    <a href="#events">抗战大事记</a>
                </li>
                <li>
                    <a href="#memories">烽火记忆</a>
                </li>
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

<!-- BACK TO TOP BUTTON -->
<button class="back-to-top back-to-top-visible" id="backToTopBtn" title="返回顶部">
    <i class="bi bi-rocket-takeoff"></i>
</button>

<?= Alert::widget() ?>
<?= $content ?>

<!-- footer area -->
<div class="witrfm_area">
    <!-- FOOTER MIDDLE AREA -->
    <div class="footer-middle">
        <div class="container">
            <!-- 关于我们部分 -->
            <div class="lorw-deslorwiption-area text-center" style="margin-bottom: 30px;">
                <h2 class="widget-title">关于我们</h2>
                <p>抗战纪念网站致力于传承抗日战争历史，弘扬民族精神，记录英雄事迹，铭记历史教训。</p>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="widget widget_nav_menu">
                        <h2 class="widget-title">快速链接</h2>
                        <div class="menu-useful-links-container">
                            <ul class="menu">
                                <li><a href="#home">首页</a></li>
                                <li><a href="<?= Url::to(['/site/signup']) ?>">注册</a></li>
                                <li><a href="<?= Url::to(['/site/login']) ?>">登录</a></li>
                                <li><a href="<?= Url::to(['/site/index']) ?>#memorial">祭奠留言</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div class="widget about_us">
                        <h2 class="widget-title">联系我们</h2>
                        <div class="about-footer">
                            <div class="footer-widget address">
                                <div class="footer-logo">
                                    <p>欢迎各界人士参与抗战纪念活动，共同铭记历史。</p>
                                </div>
                                <div class="footer-address">
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"><i class="icofont-google-map"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>南开大学（津南校区）</p>
                                        </div>
                                    </div>
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"><i class="icofont-phone"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>010-12345678</p>
                                        </div>
                                    </div>
                                    <div class="footer_s_inner">
                                        <div class="footer-sociala-icon"> <i class="icofont-ui-clock"></i></div>
                                        <div class="footer-sociala-info">
                                            <p>info@kangzhan.com</p>
                                        </div>
                                    </div>
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
                        <p>© <?= date('Y') ?> 抗战纪念网站 All rights reserved. | 技术支持：<a href="https://github.com/xiaotong-jpg/yii-project" target="_blank" class="text-white">GitHub 项目</a></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6  col-sm-12">
                    <div class="footer-menu text-right">
                        <ul>
                            <li><a href="<?= Url::to(['/site/index']) ?>">Home</a></li>
                            <!-- <li><a href="<?= Url::to(['/site/about']) ?>">About</a></li>
                            <li><a href="<?= Url::to(['/site/contact']) ?>">Contact</a></li>
                            <li><a href="<?= Url::to(['/site/faq-page']) ?>">FAQ</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        // Double-check: Remove theme's scrollUp plugin completely
        if(typeof $ !== 'undefined'){
            // Remove any existing scrollUp elements
            $('#scrollUp').remove();
            $('#scrollUp-active').remove();

            // Prevent theme from initializing scrollUp
            if($.scrollUp){
                $.scrollUp.destroy();
            }
        }

        function getHeaderOffset(){
            var header = document.querySelector('.lorw-main-menu');
            return header ? header.offsetHeight : 50;
        }

        function gotoTop(){
            // 直接滚动 body 元素（已确认这是滚动容器）
            var body = document.body;

            try {
                body.scrollTo({
                    top: 0,
                    left: 0,
                    behavior: 'smooth'
                });
            } catch (e) {
                body.scrollTop = 0;
                body.scrollLeft = 0;
            }

            // 按钮视觉反馈
            var btn = document.getElementById('backToTopBtn');
            if(btn){
                btn.style.transition = 'transform 0.3s ease, background-color 0.3s ease';
                btn.style.transform = 'scale(1.2)';
                btn.style.backgroundColor = '#E6C35C';

                setTimeout(function(){
                    btn.style.transform = '';
                    btn.style.backgroundColor = '';
                }, 300);
            }
        }


        function scrollToHash(hash){
            if(!hash || hash === '#') return;
            var INDEX_URL = '<?= Url::to(['/site/index']) ?>';
            var onIndex = (window.location.pathname.indexOf('/index') !== -1 || window.location.pathname === '/' || window.location.pathname === '');
            var el = null;
            try{ el = document.querySelector(hash); }catch(e){ el = null; }
            if(el){
                var headerOffset = getHeaderOffset();
                // 计算目标元素相对于文档顶部的距离
                var elementTop = el.getBoundingClientRect().top + document.body.scrollTop;
                var scrollTarget = Math.max(0, elementTop - headerOffset);

                // 直接滚动 body 元素
                var body = document.body;
                try{
                    body.scrollTo({ top: scrollTarget, behavior: 'smooth' });
                }catch(e){
                    body.scrollTop = scrollTarget;
                }

                if(history.pushState){ try{ history.pushState(null, null, hash); }catch(e){} }
            } else {
                if(!onIndex){
                    window.location.href = INDEX_URL + hash;
                } else {
                    window.location.href = INDEX_URL;
                }
            }
        }

        // Toggle back-to-top visibility
        var backBtn = document.getElementById('backToTopBtn');
        if(backBtn){
            window.addEventListener('scroll', function(){
                var shouldShow = document.body.scrollTop > 300;
                if(shouldShow){ backBtn.classList.add('show'); } else { backBtn.classList.remove('show'); }
            });
        }

        // Global capture: ensure our handlers run before theme scripts
        document.addEventListener('click', function(ev){
            // Back to top
            var btn = ev.target.closest('#backToTopBtn');
            if(btn){
                ev.preventDefault();
                ev.stopPropagation();
                gotoTop();
                return;
            }
            // Nav anchors
            var link = ev.target.closest('.lorw_menu a[href^="#"]');
            if(link){
                var href = link.getAttribute('href');
                if(!href) return;
                ev.preventDefault();
                ev.stopPropagation();
                scrollToHash(href);
                return;
            }
        }, true);

        // Normalize links to hash-only on index
        var isIndexPage = (window.location.pathname.indexOf('/index') !== -1 || window.location.pathname === '/' || window.location.pathname === '');
        if(isIndexPage){
            document.querySelectorAll('a[href*="#"]').forEach(function(link){
                var href = link.getAttribute('href') || '';
                if(href.indexOf('/site/index#') !== -1){
                    var hash = href.substring(href.indexOf('#'));
                    link.setAttribute('href', hash);
                }
            });
        }

        // 移除自动滚动到hash位置的功能，避免页面刷新时自动滚动
        // if(window.location.hash){ setTimeout(function(){ scrollToHash(window.location.hash); }, 150); }
        window.addEventListener('hashchange', function(){ scrollToHash(window.location.hash); });
    });
</script>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
