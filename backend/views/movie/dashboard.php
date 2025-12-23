<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Dashboard view showing movie statistics and recent entries.
 */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '电影 Dashboard';
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6 col-12">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3><?= $total ?></h3>
                    <p>影片总数</p>
                </div>
                <div class="icon"><i class="fas fa-film"></i></div>
                <a href="<?= Url::to(['movie/index']) ?>" class="small-box-footer">管理 <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-6 col-12">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3><?= $withCover ?></h3>
                    <p>有海报的影片</p>
                </div>
                <div class="icon"><i class="fas fa-image"></i></div>
                <a href="<?= Url::to(['movie/index']) ?>" class="small-box-footer">查看 <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-light">
                <div class="card-header"><h3 class="card-title">按年份的影片数量</h3></div>
                <div class="card-body">
                    <canvas id="yearBarChart" style="width:100%;height:240px"></canvas>
                </div>
            </div>
        </div>
    </div>

<?php
// Use dynamic baseUrl like the layout file
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/adminlte/plugins/chart.js/Chart.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>
    <script>
        (function(){
            const labels = <?= json_encode(array_column($yearCounts?:[], 'y')) ?> || [];
            const data = <?= json_encode(array_map(function($r){ return (int)$r['cnt']; }, $yearCounts?:[])) ?> || [];
            const ctx = document.getElementById('yearBarChart');
            if (ctx && labels.length) {
                new Chart(ctx.getContext('2d'), {
                    type: 'bar',
                    data: { labels: labels, datasets: [{ label: '电影数量', data: data, backgroundColor: 'rgba(60,141,188,0.9)'}] },
                    options: { responsive: true, maintainAspectRatio: false, scales: { y: { beginAtZero: true } } }
                });
            }
        })();
    </script>

    <div class="row">
        <?php foreach ($recent as $item):
            $cover = $item['cover_image'];
            $img = $cover && strpos($cover, 'http') === 0 ? $cover : ($cover ? '/advanced/frontend/web/images/' . $cover : null);
        ?>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5><?= Html::encode($item['title']) ?></h5>
                        <?php if ($img): ?>
                            <p><img src="<?= $img ?>" alt="" style="width:100%;height:600px;object-fit:cover"></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
