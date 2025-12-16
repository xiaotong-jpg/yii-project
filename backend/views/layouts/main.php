<?php
/**
 * Team: NoDDL,NKU
 * Coding by quwenmeng 2312358
 * This is the main layout of backend web.
 */

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;


$this->registerCssFile('/advanced/backend/web/adminlte/plugins/fontawesome-free/css/all.min.css');
$this->registerCssFile('/advanced/backend/web/adminlte/dist/css/adminlte.min.css');

$this->registerJsFile('/advanced/backend/web/adminlte/plugins/jquery/jquery.min.js', ['position' => \yii\web\View::POS_HEAD]);
$this->registerJsFile('/advanced/backend/web/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js', ['position' => \yii\web\View::POS_END]);
$this->registerJsFile('/advanced/backend/web/adminlte/dist/js/adminlte.min.js', ['position' => \yii\web\View::POS_END]);

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

<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>

<div class="wrapper">

    <!-- Navbar 顶部导航栏 -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/" class="nav-link">首页</a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar 左侧菜单 -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/" class="brand-link">
            <span class="brand-text font-weight-light">后台管理系统</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview">

                    <li class="nav-item">
                        <a href="/site/index" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>控制面板</p>
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
                    <!-- 示例菜单：纪念馆管理 -->
                    <li class="nav-item">
                        <a href="<?= Url::to(['museums/index']) ?>" class="nav-link <?= Yii::$app->controller->id=='museums'?'active':'' ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>纪念馆管理</p>
                        </a>
                    </li>

                    <!-- 示例菜单：英雄人物 -->
                    <li class="nav-item">
                        <a href="/hero-person/index" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>英雄人物</p>
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
</body>
</html>
<?php $this->endPage() ?>
