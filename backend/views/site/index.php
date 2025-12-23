<?php

/* @var $this yii\web\View */

$this->title = '后台管理中心';
?>
<div class="site-index">
    <!-- 欢迎区域 -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">欢迎使用后台管理系统</h3>
                </div>
                <div class="box-body">
                    <p>这里是您的抗日战争胜利80周年纪念网站后台管理中心。您可以在这里管理文章、英雄人物、抗战电影、纪念馆信息等内容。</p>
                </div>
            </div>
        </div>
    </div>

    <!-- 统计信息卡片 -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php // echo $userCount; ?>150</h3>
                    <p>注册用户</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="<?php echo \yii\helpers\Url::to(['user/index']); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3><?php // echo $articleCount; ?>25</h3>
                    <p>文章数量</p>
                </div>
                <div class="icon">
                    <i class="ion ion-document-text"></i>
                </div>
                <a href="<?php echo \yii\helpers\Url::to(['article/index']); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php // echo $movieCount; ?>12</h3>
                    <p>抗战电影</p>
                </div>
                <div class="icon">
                    <i class="ion ion-film-marker"></i>
                </div>
                <a href="<?php echo \yii\helpers\Url::to(['movie/index']); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php // echo $heroCount; ?>8</h3>
                    <p>英雄人物</p>
                </div>
                <div class="icon">
                    <i class="ion ion-star"></i>
                </div>
                <a href="<?php echo \yii\helpers\Url::to(['hero-person/index']); ?>" class="small-box-footer">更多信息 <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <!-- 功能模块导航 -->
    <div class="row">
        <div class="col-md-12">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">快速导航</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-blue"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">用户管理</span>
                                    <span class="info-box-number">管理注册用户</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 70%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['user/index']); ?>" class="btn btn-primary btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fas fa-file-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">文章管理</span>
                                    <span class="info-box-number">发布和管理文章</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 50%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['article/index']); ?>" class="btn btn-success btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-yellow"><i class="fas fa-film"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">电影管理</span>
                                    <span class="info-box-number">抗战电影资料</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 60%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['movie/index']); ?>" class="btn btn-warning btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-red"><i class="fas fa-star"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">英雄人物</span>
                                    <span class="info-box-number">英雄事迹管理</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 40%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['hero-person/index']); ?>" class="btn btn-danger btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-purple"><i class="fas fa-map-marked-alt"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">战争地图</span>
                                    <span class="info-box-number">地点标记管理</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 30%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['war-map-location/index']); ?>" class="btn btn-primary btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-teal"><i class="fas fa-history"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">历史时间线</span>
                                    <span class="info-box-number">时间线管理</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 45%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['history-timeline/index']); ?>" class="btn btn-info btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-orange"><i class="fas fa-university"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">纪念馆</span>
                                    <span class="info-box-number">纪念馆信息</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 55%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['museums/index']); ?>" class="btn btn-warning btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-maroon"><i class="fas fa-heart"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">致敬记录</span>
                                    <span class="info-box-number">纪念与致敬</span>
                                    <div class="progress">
                                        <div class="progress-bar" style="width: 35%"></div>
                                    </div>
                                    <span class="progress-description">
                                        <a href="<?php echo \yii\helpers\Url::to(['tribute/index']); ?>" class="btn btn-danger btn-xs">进入管理</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 最近活动或通知 -->
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">最近文章</h3>
                    <div class="card-tools">
                        <a href="<?= \yii\helpers\Url::to(['article/index']) ?>" class="btn btn-tool btn-sm">查看所有</a>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body p-0">
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        <?php if (!empty(
                            $recentArticles
                        )): ?>
                            <?php foreach ($recentArticles as $a): ?>
                                <li class="item">
                                    <div class="product-info" style="margin-left:0;padding-left:0;">
                                        <a href="<?= \yii\helpers\Url::to(['article/view','id'=>$a['id']]) ?>" class="product-title"><?= \yii\helpers\Html::encode($a['title']) ?>
                                            <span class="badge badge-secondary float-right"><?= \yii\helpers\Html::encode($a['author']) ?></span></a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <li class="item text-muted p-3">暂无文章</li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
                <div class="col-md-6">
                    <div class="card bg-gradient-success">
                        <div class="card-header border-0">

                            <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                            </h3>
                            <!-- tools card -->
                            <div class="card-tools">
                                <!-- dropdown removed to disable adding events -->
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /. tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body pt-0">
                            <!--The calendar -->
                            <div id="calendar" style="width: 100%"></div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
    </div>
</div>
<!-- Calendar initialization is handled by AdminLTE's dashboard.js (Tempusdominus) -->

<script>
    // Initialize Tempusdominus calendar after all scripts/styles have loaded
    (function(){
        function initCalendar() {
            if (typeof jQuery !== 'undefined' && jQuery.fn && jQuery.fn.datetimepicker) {
                try {
                    jQuery('#calendar').datetimepicker({ format: 'L', inline: true });
                    console.log('Calendar initialized (Tempusdominus)');
                } catch (e) {
                    console.error('Calendar init error', e);
                }
            } else {
                console.log('Tempusdominus not yet available; retrying...');
                // retry a few times
                var attempts = 0;
                var iv = setInterval(function(){
                    attempts++;
                    if (typeof jQuery !== 'undefined' && jQuery.fn && jQuery.fn.datetimepicker) {
                        clearInterval(iv);
                        try { jQuery('#calendar').datetimepicker({ format: 'L', inline: true }); console.log('Calendar initialized after retry'); } catch(e){ console.error(e); }
                    } else if (attempts > 10) {
                        clearInterval(iv);
                        console.warn('Failed to initialize calendar after retries');
                    }
                }, 200);
            }
        }

        if (document.readyState === 'complete') {
            initCalendar();
        } else {
            window.addEventListener('load', initCalendar);
        }
    })();
</script>
