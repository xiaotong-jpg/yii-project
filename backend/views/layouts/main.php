<?php
/**
 * Team: NoDDL,NKU
 * Coding by Quwenmeng 2312358
 * This is the main layout of backend web.
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;


// Use dynamic baseUrl so it works both for Apache vhost (e.g. http://backend.localhost/)
// and for subdirectory access (e.g. http://localhost/advanced/backend/web/).
$baseUrl = Yii::$app->request->baseUrl;

$this->registerCssFile($baseUrl . '/adminlte/plugins/fontawesome-free/css/all.min.css');
$this->registerCssFile($baseUrl . '/adminlte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css');
$this->registerCssFile($baseUrl . '/adminlte/dist/css/adminlte.min.css');
// Additional demo CSS used by AdminLTE dashboard (match index.html)
$this->registerCssFile($baseUrl . '/adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');
$this->registerCssFile($baseUrl . '/adminlte/plugins/daterangepicker/daterangepicker.css');
$this->registerCssFile($baseUrl . '/adminlte/plugins/summernote/summernote-bs4.min.css');

$this->registerJsFile($baseUrl . '/adminlte/plugins/jquery/jquery.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/jquery-ui/jquery-ui.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/moment/moment.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/daterangepicker/daterangepicker.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/summernote/summernote-bs4.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile($baseUrl . '/adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile($baseUrl . '/adminlte/dist/js/adminlte.min.js', ['position' => \yii\web\View::POS_END]);
// demo page scripts (removed heavy dashboard demo to keep page focused)
// If you need the full dashboard widgets later, re-enable `dist/js/pages/dashboard.js` and related plugins.

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<?php $this->beginBody() ?>

<div class="wrapper">

    <!-- Navbar 顶部导航栏 -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?= Url::to(['site/index']) ?>" class="nav-link">首页</a>
            </li>
        </ul>

        <!-- 右侧导航栏 -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#" id="system-notifications" data-toggle="popover" data-placement="bottom" data-trigger="click" data-html="true" title="系统消息">
                    <i class="fas fa-bell"></i>
                    <span class="badge badge-danger" id="notification-badge">0</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar 左侧菜单 -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="<?= Url::to(['site/index']) ?>" class="brand-link">
            <span class="brand-text font-weight-light">后台管理系统</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    <li class="nav-item">
                        <a href="<?= Url::to(['site/index']) ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>首页</p>
                        </a>
                    </li>

                    <!-- 示例菜单：文章管理 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['article/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='article'?'active':'' ?>">
                            <i class="nav-icon fas fa-book"></i>
                            <p>文章管理</p>
                        </a>
                    </li>
                    <!-- 示例菜单：志愿者管理 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['volunteers/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='volunteers'?'active':'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>志愿者管理</p>
                        </a>
                    </li>
                    <!-- 用户管理 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['user/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='user'?'active':'' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>用户管理</p>
                        </a>
                    </li>
                    <!-- 示例菜单：纪念馆管理 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['museums/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='museums'?'active':'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>纪念馆管理</p>
                        </a>
                    </li>

                    <!-- 示例菜单：英雄人物 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['hero-person/index']) ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>英雄人物</p>
                        </a>
                    </li>

                    <!-- 抗战大事记 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['history-timeline/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='history-timeline'?'active':'' ?>">
                            <i class="nav-icon fas fa-history"></i>
                            <p>抗战大事记</p>
                        </a>
                    </li>

                    <!-- 祭奠留言：留言管理 / 电子互动 -->
                    <?php $isTribute = Yii::$app->controller->id === 'tribute'; ?>
                    <li class="nav-item has-treeview <?= $isTribute ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= $isTribute ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-comments"></i>
                            <p>
                                祭奠留言
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['tribute/index']) ?>" class="nav-link <?= $isTribute && in_array(Yii::$app->controller->action->id, ['index','stats']) ? 'active' : '' ?>">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>留言管理</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['tribute/interaction']) ?>" class="nav-link <?= $isTribute && Yii::$app->controller->action->id=='interaction' ? 'active' : '' ?>">
                                    <i class="fas fa-bolt nav-icon"></i>
                                    <p>电子互动</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- 新增菜单：电影管理（含 Dashboard / 管理） -->
                    <?php $isMovie = Yii::$app->controller->id === 'movie'; ?>
                    <li class="nav-item has-treeview <?= $isMovie ? 'menu-open' : '' ?>">
                        <a href="#" class="nav-link <?= $isMovie ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-film"></i>
                            <p>
                                电影管理
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['movie/dashboard']) ?>" class="nav-link <?= ($isMovie && Yii::$app->controller->action->id==='dashboard') ? 'active' : '' ?>">
                                    <i class="fas fa-tachometer-alt nav-icon"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['movie/index']) ?>" class="nav-link <?= ($isMovie && in_array(Yii::$app->controller->action->id, ['index','create','update'])) ? 'active' : '' ?>">
                                    <i class="fas fa-list nav-icon"></i>
                                    <p>管理</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                
                    <!-- 相关文件下载 分区 -->
                    <li class="nav-header" style="padding-left:12px;">相关文件下载</li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['download/personal']) ?>" class="nav-link <?= (Yii::$app->controller->id=='download' && Yii::$app->controller->action->id=='personal') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-download"></i>
                            <p>个人作业</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= Url::to(['download/group']) ?>" class="nav-link <?= (Yii::$app->controller->id=='download' && Yii::$app->controller->action->id=='group') ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-archive"></i>
                            <p>小组作业</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper 内容区 -->
    <div class="content-wrapper">

        <section class="content pt-3">
            <div class="container-fluid">
                <?= $content ?>
            </div>
        </section>

    </div>

    <!-- Footer 页脚 -->
    <footer class="main-footer text-center">
        <strong><?= date('Y') ?> &copy; 抗战 80 周年后台管理</strong>
    </footer>

</div>

<?php $this->endBody() ?>
<script>
    $(document).ready(function() {
        // 获取未审核信息数量
        $.ajax({
            url: '<?= \yii\helpers\Url::to(["site/get-pending-reviews"]) ?>',
            method: 'GET',
            success: function(data) {
                var pendingReviews = data.count;
                var content = '';
                        if (pendingReviews > 0) {
                            content = '<strong>未审核信息：</strong><br>' + pendingReviews + ' 条留言待审核';
                        } else {
                            content = '系统运行正常，无待审核信息';
                        }
                // Always set the data-content so hover/tooltip text is available even if popover plugin missing
                $('#system-notifications').attr('data-content', content);

                // Initialize popover only if Bootstrap's plugin is available to avoid "popover is not a function" errors
                if (window.jQuery && typeof jQuery.fn.popover === 'function') {
                    try {
                        try { $('#system-notifications').popover('dispose'); } catch(e) { /* ignore if not initialized */ }
                        $('#system-notifications').attr('title', '系统消息').attr('data-original-title', '系统消息').attr('data-fixed-title','1');
                        $('#system-notifications').popover({
                            html: true,
                            placement: 'bottom',
                            trigger: 'click',
                            title: '系统消息',
                            content: function() { return $(this).attr('data-content'); }
                        });
                    } catch(e) { console.warn('popover init failed', e); }
                } else {
                        // fallback: ensure the element has a plain-text title for basic tooltip-like display
                        var plain = $('<div>').html(content).text();
                        if (!$('#system-notifications').attr('title') || $('#system-notifications').attr('title').trim() === '') {
                            $('#system-notifications').attr('title', plain);
                        }
                        console.warn('Bootstrap popover plugin not available; skipping popover init');
                }

                // 更新badge
                if (pendingReviews > 0) {
                    $('#notification-badge').text(pendingReviews).show();
                } else {
                    $('#notification-badge').hide();
                }
            },
            error: function() {
                var fallback = '系统运行正常，无待审核信息';
                $('#system-notifications').attr('data-content', fallback);
                if (window.jQuery && typeof jQuery.fn.popover === 'function') {
                    try {
                        try { $('#system-notifications').popover('dispose'); } catch(e) { /* ignore if not initialized */ }
                        $('#system-notifications').attr('title', '系统消息').attr('data-original-title', '系统消息').attr('data-fixed-title','1');
                        $('#system-notifications').popover({
                            html: true,
                            placement: 'bottom',
                            trigger: 'click',
                            title: '系统消息',
                            content: function() { return $(this).attr('data-content'); }
                        });
                    } catch(e) { console.warn('popover init failed', e); }
                } else {
                        var plainFallback = $('<div>').html(fallback).text();
                        if (!$('#system-notifications').attr('title') || $('#system-notifications').attr('title').trim() === '') {
                            $('#system-notifications').attr('title', plainFallback);
                        }
                }
                $('#notification-badge').hide();
            }
        });
    });

    // Robust fallback for pushmenu: ensure the hamburger toggles the sidebar even if AdminLTE JS didn't bind.
    (function(){
        document.addEventListener('click', function(e){
            var btn = e.target.closest && e.target.closest('[data-widget="pushmenu"]');
            if (!btn) return;
            // prevent other handlers from interfering
            e.preventDefault();
            if (e.stopImmediatePropagation) e.stopImmediatePropagation();
            var body = document.body;
            // AdminLTE uses 'sidebar-collapse' for desktop collapsed state and 'sidebar-open' for mobile open state.
            var isOpenMobile = body.classList.contains('sidebar-open');
            var isCollapsed = body.classList.contains('sidebar-collapse');
            if (isOpenMobile || !isCollapsed) {
                // close the sidebar (mobile open -> remove; desktop -> add collapse)
                body.classList.add('sidebar-collapse');
                body.classList.remove('sidebar-open');
            } else {
                // open the sidebar
                body.classList.remove('sidebar-collapse');
                body.classList.add('sidebar-open');
            }
            // notify layout to reflow
            try { window.dispatchEvent(new Event('resize')); } catch(e) { /* ignore */ }
            // small deferred log to observe state
            setTimeout(function(){ console.log('pushmenu fallback: sidebar-collapse=' + body.classList.contains('sidebar-collapse') + ' sidebar-open=' + body.classList.contains('sidebar-open')); }, 40);
        }, {capture: true});
    })();
</script>
    <script>
        // Ensure native browser tooltip does not show HTML tags (strip tags for title)
        (function(){
            function stripHtml(input){
                var d = document.createElement('div');
                d.innerHTML = input || '';
                return d.textContent || d.innerText || '';
            }
            function normalizeNotificationTitle(){
                try {
                    var el = document.getElementById('system-notifications');
                    if (!el) return;
                    // If title was explicitly fixed by our init, do not overwrite it.
                    if (el.getAttribute('data-fixed-title') === '1') return;
                    var content = el.getAttribute('data-content') || '';
                    var txt = stripHtml(content);
                    var currentTitle = (el.getAttribute('title') || '').trim();
                    // Only overwrite the native title when it's empty or already matches the content text.
                    if (!currentTitle || currentTitle === txt) {
                        el.setAttribute('title', txt);
                        if (el.getAttribute('data-original-title')) el.setAttribute('data-original-title', txt);
                    }
                } catch(e) { /* ignore */ }
            }
            if (document.readyState === 'complete' || document.readyState === 'interactive') normalizeNotificationTitle();
            else document.addEventListener('DOMContentLoaded', normalizeNotificationTitle);
            document.addEventListener('systemNotificationsUpdated', function(){ setTimeout(normalizeNotificationTitle, 20); });
            // also ensure on hover (in case content changed very late)
            document.addEventListener('mouseover', function(ev){
                var t = ev.target && ev.target.closest && ev.target.closest('#system-notifications');
                if (t) normalizeNotificationTitle();
            }, true);
        })();
    </script>
        <script>
            // Diagnostic helpers: logs to help debug calendar rendering differences.
            (function(){
                try {
                    console.log('DEBUG: jQuery version =', typeof jQuery !== 'undefined' ? jQuery.fn.jquery : 'jQuery-not-loaded');
                    console.log('DEBUG: $.fn.datetimepicker =', (typeof jQuery !== 'undefined' && jQuery.fn && jQuery.fn.datetimepicker) ? 'available' : 'missing');
                    // List included script srcs (useful to verify load order/paths)
                    var srcs = Array.prototype.slice.call(document.scripts).map(function(s){ return s.src || s.getAttribute('src') || ''; }).filter(Boolean);
                    console.log('DEBUG: Loaded script sources:', srcs);
                } catch(e) {
                    console.log('DEBUG: diagnostic error', e);
                }
            })();
        </script>
</body>
</html>
<?php $this->endPage() ?>
