<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view lists message-board entries and summary statistics for tributes.
 */
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = '祭奠留言';
?>
<!-- 统计模块 -->
<div class="row mb-3 justify-content-center">
    <div class="col-lg-3 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-info"><i class="fas fa-comments"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">总留言数量</span>
                <span class="info-box-number"><?php echo isset($totalMessages) ? $totalMessages : 0; ?></span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-6">
        <div class="info-box">
            <span class="info-box-icon bg-warning"><i class="fas fa-clock"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">未审核留言</span>
                <span class="info-box-number"><?php echo isset($unapprovedMessages) ? $unapprovedMessages : 0; ?></span>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3 justify-content-center">
    <div class="col-md-8">
        <div class="card bg-gradient-info tribute-chart-card">
            <div class="card-header border-0">
                <h3 class="card-title">留言趋势</h3>
                <div class="card-tools">
                    <!-- placeholder for tools -->
                </div>
            </div>
            <div class="card-body" style="position:relative;padding:1rem;">
                <canvas id="msgTrend" style="width:100%;height:200px"></canvas>
                <div class="overlay" style="display:flex;align-items:center;justify-content:center;">
                    <div>加载中...</div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- word cloud placeholder: will be loaded from tribute/word-cloud -->
<div id="wordcloud-wrapper" class="mb-3" style="max-width:960px;margin:0 auto;padding:0 12px;"></div>

<script>
    (function(){
        const url = <?= \yii\helpers\Json::htmlEncode(\yii\helpers\Url::to(['tribute/word-cloud'])) ?>;
        const el = document.getElementById('wordcloud-wrapper');
        if (!el) return;
        el.innerHTML = '<div class="card"><div class="card-body">加载词云中…</div></div>';
        fetch(url, { credentials: 'same-origin' })
            .then(r => r.text())
            .then(html => {
                try {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    // prefer the actual wordcloud container if present
                    // prefer full card (contains scripts). fall back to #wordcloud div.
                    const fragment = doc.querySelector('.card.card-primary') || doc.getElementById('wordcloud') || doc.querySelector('.card');
                    if (fragment) {
                        el.innerHTML = '';
                        // import fragment without its scripts, then append
                        const node = document.importNode(fragment, true);
                        const nodeScripts = node.querySelectorAll('script');
                        nodeScripts.forEach(s=>s.remove());
                        el.appendChild(node);

                        // Collect scripts: prefer scripts inside the card, but also include scripts anywhere in the returned document
                        let scripts = Array.from(doc.querySelectorAll('script'));
                        if (scripts.length === 0) scripts = Array.from(fragment.querySelectorAll('script'));
                        const external = scripts.filter(s=>{
                            const v = s.getAttribute('src');
                            return v && v.trim() && v.trim().toLowerCase() !== 'null';
                        });
                        const inline = scripts.filter(s=>{
                            const v = s.getAttribute('src');
                            return !(v && v.trim() && v.trim().toLowerCase() !== 'null');
                        });

                        console.log('wordcloud loader: found external scripts:', external.map(s=>s.getAttribute('src')));
                        console.log('wordcloud loader: found inline scripts count:', inline.length);

                        // Ensure WordCloud library is present -- if not, prepend CDN fallback
                        const hasWordCloud = external.some(s => (s.getAttribute('src')||'').toLowerCase().includes('wordcloud'));
                        if (!hasWordCloud) {
                            const cdn = 'https://cdn.jsdelivr.net/npm/wordcloud@1.1.2/src/wordcloud2.min.js';
                            console.log('wordcloud loader: injecting CDN fallback', cdn);
                            // create a pseudo-script-like object for loading
                            const fake = document.createElement('script');
                            fake.setAttribute('src', cdn);
                            external.unshift(fake);
                        }

                            // load externals sequentially to preserve order
                            function loadExternals(list){
                                return new Promise((resolve)=>{
                                    if (!list.length) return resolve();
                                    let i = 0;
                                    function next(){
                                        const s = list[i];
                                        const ns = document.createElement('script');
                                        const src = s.getAttribute('src');
                                        if (!src || !src.trim() || src.trim().toLowerCase() === 'null') { i++; if (i<list.length) next(); else resolve(); return; }
                                        ns.src = src;
                                        ns.async = false;
                                        ns.onload = () => { i++; if (i<list.length) next(); else resolve(); };
                                        ns.onerror = () => { i++; if (i<list.length) next(); else resolve(); };
                                        document.body.appendChild(ns);
                                    }
                                    next();
                                });
                            }

                            loadExternals(external).then(()=>{
                                // run inline scripts after externals loaded
                                inline.forEach(s => {
                                    const ns = document.createElement('script');
                                    ns.type = s.type || 'text/javascript';
                                    ns.text = s.textContent || s.innerText || '';
                                    document.body.appendChild(ns);
                                });
                            });
                        return;
                    }
                } catch (e) {
                    // fallback
                }
                el.innerHTML = html;
            })
            .catch(err => { el.innerHTML = '<div class="alert alert-danger">加载失败：'+err+'</div>'; });
    })();
</script>

<div class="card card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <!-- 筛选表单 -->
        <form method="get" id="filter-form" class="form-inline">
            <div class="form-group mr-2">
                <label for="status-filter" class="mr-2">状态：</label>
                <select name="status" id="status-filter" class="form-control form-control-sm" onchange="filterMessages();">
                    <option value="">全部</option>
                    <option value="0" <?php echo (Yii::$app->request->get('status') === '0') ? 'selected' : ''; ?>>未审核</option>
                    <option value="1" <?php echo (Yii::$app->request->get('status') === '1') ? 'selected' : ''; ?>>已审核</option>
                </select>
            </div>
        </form>
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        <div class="card-tools">
            <!-- placeholder -->
        </div>
    </div>
    <div class="card-body p-3">

        <div class="table-responsive fixed-header-table" style="max-height:520px;overflow:auto;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'pager' => [
                'options' => ['class' => 'pagination pagination-sm justify-content-center mt-3'],
                'linkOptions' => ['class' => 'page-link'],
                'disabledListItemSubTagOptions' => ['tag'=>'a']
            ],
            'columns' => [
                // hide serial '#' and id
                'username',
                [
                    'attribute' => 'content',
                    'format' => 'ntext',
                    'label' => '留言内容',
                    'contentOptions' => ['style' => 'max-width:560px;white-space:normal;']
                ],
                [
                    'attribute' => 'is_approved',
                    'label' => '审核',
                    'value' => function($model) { return $model['is_approved'] ? '已通过' : '未通过'; }
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['date', 'php:Y-m-d H:i:s'],
                ],
                [
                    'class' => 'yii\\grid\\ActionColumn',
                    'template' => '{toggle} {delete}',
                    'buttons' => [
                        'toggle' => function($url, $model, $key) {
                            $label = $model['is_approved'] ? '撤销' : '通过';
                            $class = $model['is_approved'] ? 'btn btn-sm btn-warning' : 'btn btn-sm btn-success';
                            $url = \yii\helpers\Url::to(['tribute/toggle-approve', 'id' => $model['id']]);
                            return Html::a($label, $url, ['class' => $class]);
                        },
                        'delete' => function($url, $model, $key) {
                            $url = \yii\helpers\Url::to(['tribute/delete', 'id' => $model['id']]);
                            return Html::a('<i class="fas fa-trash"></i>', $url, [
                                'class' => 'btn btn-sm btn-danger',
                                'data' => ['confirm' => '确定删除此留言？', 'method' => 'post']
                            ]);
                        }
                    ],
                ],
            ],
        ]) ?>
        </div>
    </div>
    <style>
        .fixed-header-table table thead th { position: sticky; top: 0; background: #fff; color: #000; z-index: 3; }
        .fixed-header-table table thead th { border-bottom: 2px solid #e9ecef; }
        .fixed-header-table table tbody td { vertical-align: middle; }
        /* tribute chart card overlay and styling */
        .tribute-chart-card { position: relative; color: #fff; }
        .tribute-chart-card .card-body { padding: .75rem; }
        .tribute-chart-card .overlay { position: absolute; top:0; right:0; bottom:0; left:0; background: rgba(255,255,255,0.65); color:#333; z-index: 10; display:none }
        .tribute-chart-card .card-title { color: rgba(255,255,255,0.95); }
        /* make canvas area slightly smaller so table isn't too tall */
        #msgTrend { max-height: 220px !important; }
    </style>

    <script>
        function filterMessages() {
            const status = document.getElementById('status-filter').value;
            const url = new URL(window.location);
            if (status === '') {
                url.searchParams.delete('status');
            } else {
                url.searchParams.set('status', status);
            }
            // 使用pushState更新URL而不刷新页面
            window.history.pushState({}, '', url);
            // 重新加载GridView数据（这里使用简单的页面重载，实际项目可使用AJAX）
            location.reload();
        }
    </script>

<?php
// Use dynamic baseUrl like the layout file
$baseUrl = Yii::$app->request->baseUrl;
$this->registerJsFile($baseUrl . '/adminlte/plugins/chart.js/Chart.min.js', ['position' => \yii\web\View::POS_HEAD]);
?>
    <script>
        (function(){
            const labels = <?= json_encode($labels ?: []) ?>;
            const series = <?= json_encode($series ?: []) ?>; // daily counts
            const ctx = document.getElementById('msgTrend');
            const overlay = document.querySelector('.tribute-chart-card .overlay');
            // show overlay while rendering
            if (overlay) overlay.style.display = 'flex';
            if (ctx && labels.length) {
                // use a bar chart similar to AdminLTE dashboard2
                const data = {
                    labels: labels,
                    datasets: [{
                        label: '每日留言数',
                        data: series,
                        backgroundColor: function(context) {
                            const chart = context.chart;
                            const {ctx, chartArea} = chart;
                            if (!chartArea) return 'rgba(255,255,255,0.3)';
                            const gradient = ctx.createLinearGradient(0, chartArea.top, 0, chartArea.bottom);
                            gradient.addColorStop(0, 'rgba(255,255,255,0.45)');
                            gradient.addColorStop(1, 'rgba(255,255,255,0.15)');
                            return gradient;
                        },
                        borderColor: 'rgba(255,255,255,0.6)',
                        borderWidth: 1
                    }]
                };

                const options = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: { grid: { display: false }, ticks: { color: '#fff' } },
                        y: { beginAtZero: true, ticks: { color: '#fff' } }
                    },
                    plugins: { legend: { labels: { color: '#fff' } } }
                };

                const chart = new Chart(ctx.getContext('2d'), { type: 'bar', data: data, options: options });
                // hide overlay shortly after render
                setTimeout(() => { if (overlay) overlay.style.display = 'none'; }, 250);
            } else {
                if (overlay) overlay.style.display = 'none';
            }
        })();
    </script>
</div>
