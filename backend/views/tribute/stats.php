<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view renders time-series statistics for messages and tributes.
 */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '留言/互动 时间序列统计';
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        </div>
        <div class="card-body">
            <canvas id="timeChart" style="height:360px"></canvas>
        </div>
    </div>
</div>

<?php
$labels = json_encode($labels);
// series: message, type1, type2, type3
$series = $series; // passed from controller
$msg = json_encode($series['message']);
$t1 = json_encode($series['type1']);
$t2 = json_encode($series['type2']);
$t3 = json_encode($series['type3']);

// Use dynamic baseUrl like the layout file
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/adminlte/plugins/chart.js/Chart.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>

<script>
(function(){
    var ctx = document.getElementById('timeChart').getContext('2d');
    var labels = <?= $labels ?>;
    var datasets = [
        {
            label: '留言量',
            data: <?= $msg ?>,
            borderColor: '#007bff',
            backgroundColor: 'rgba(0,123,255,0.05)',
            fill: true,
        },
        {
            label: '献花',
            data: <?= $t1 ?>,
            borderColor: '#28a745',
            backgroundColor: 'rgba(40,167,69,0.05)',
            fill: true,
        },
        {
            label: '点烛',
            data: <?= $t2 ?>,
            borderColor: '#ffc107',
            backgroundColor: 'rgba(255,193,7,0.05)',
            fill: true,
        },
        {
            label: '敬酒',
            data: <?= $t3 ?>,
            borderColor: '#17a2b8',
            backgroundColor: 'rgba(23,162,184,0.05)',
            fill: true,
        }
    ];

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: { display: true },
                y: { display: true, beginAtZero: true }
            }
        }
    });
})();
</script>
