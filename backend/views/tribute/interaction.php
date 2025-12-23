<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view shows tribute interaction records and charts.
 */
use yii\helpers\Html;

$this->title = '电子互动';

$typeMap = [1 => '献花', 2 => '敬酒', 3 => '点烛'];
?>
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title"><?= Html::encode($this->title) ?></h3></div>
    <div class="card-body">
        <div class="row">
                <!-- 饼图在上面 -->
                <div class="col-12 mb-4">
                    <h5>互动类型占比</h5>
                    <div class="chart-container pie-container">
                        <div class="pie-box">
                            <canvas id="interactionPie"></canvas>
                        </div>
                    </div>
                </div>
                <!-- 折线图在下面 -->
                <div class="col-12">
                    <h5>近一年互动趋势（按月）</h5>
                    <div class="chart-container line-container">
                        <canvas id="interactionLine"></canvas>
                    </div>
                </div>
            </div>
    </div>
</div>

<?php
// Prepare data
$pieCounts = [
    isset($typeCounts[1]) ? $typeCounts[1] : 0,
    isset($typeCounts[2]) ? $typeCounts[2] : 0,
    isset($typeCounts[3]) ? $typeCounts[3] : 0,
];
$labelsJson = json_encode($labels ?: []);
// $series is associative: type1,type2,type3 arrays
$seriesJson = json_encode($series ?: new stdClass());
$pieJson = json_encode($pieCounts);

// Use dynamic baseUrl like the layout file
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/adminlte/plugins/chart.js/Chart.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>

<script>
(function(){
    const typeLabels = <?= json_encode(array_values($typeMap)) ?>;
    const pieData = <?= $pieJson ?>;
    const labels = <?= $labelsJson ?>; // months like YYYY-MM
    const series = <?= $seriesJson ?>; // { type1: [...], type2: [...], type3: [...] }

    const pieCtx = document.getElementById('interactionPie');
    if (pieCtx) {
        new Chart(pieCtx.getContext('2d'), {
            type: 'pie',
            data: { labels: typeLabels, datasets: [{ data: pieData, backgroundColor: ['#f39c12','#00a65a','#00c0ef'] }] },
            options: { responsive: true, maintainAspectRatio: false }
        });
    }

    const lineCtx = document.getElementById('interactionLine');
    if (lineCtx && labels.length) {
        const colors = ['rgba(60,141,188,1)', 'rgba(0,166,90,1)', 'rgba(243,156,18,1)'];
        const datasets = [];
        const typeKeys = ['type1','type2','type3'];
        for (let i=0;i<typeKeys.length;i++) {
            const key = typeKeys[i];
            const data = (series && series[key]) ? series[key] : [];
            datasets.push({
                label: typeLabels[i],
                data: data,
                borderColor: colors[i],
                borderWidth: 2,
                pointRadius: 3,
                pointBackgroundColor: '#ffffff',
                tension: 0.3,
                fill: true,
                backgroundColor: function(context) {
                    const chart = context.chart;
                    const {ctx, chartArea} = chart;
                    if (!chartArea) return 'rgba(0,0,0,0)';
                    const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                    gradient.addColorStop(0, colors[i].replace(/1\)$/, '0.25)'));
                    gradient.addColorStop(1, colors[i].replace(/1\)$/, '0.05)'));
                    return gradient;
                }
            });
        }

        new Chart(lineCtx.getContext('2d'), {
            type: 'line',
            data: { labels: labels, datasets: datasets },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: true, labels: { color: '#333' } } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#666' } },
                    y: { beginAtZero: true, ticks: { color: '#666' } }
                }
            }
        });
    }
})();
</script>

<style>
/* chart containers control actual heights so Chart.js respects them */
.chart-container { width:100%; }
.pie-container { display:flex; justify-content:center; align-items:center; }
.pie-box { width: 280px; height: 280px; }
.line-container { height: 240px; }
.chart-container canvas { width:100% !important; height:100% !important; }

/* reduce any table height on this page */
.card-body .table { max-height: 240px; overflow-y: auto; }
</style>
