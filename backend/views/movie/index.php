<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Index view listing movies with filters and pagination.
 */
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = '电影管理';
?>

<div class="card card-primary">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="card-title"><?= Html::encode($this->title) ?></h3>
        <div class="card-tools ml-auto">
            <?= Html::a('+', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
        </div>
    </div>
    <div class="card-body p-3">
        <div class="d-flex mb-3 align-items-center">
            <div class="mr-3">
                <label class="mr-2 font-weight-bold">按年份筛选：</label>
                <select id="year-filter" class="form-control form-control-sm" style="display:inline-block;width:160px">
                    <option value="">全部年份</option>
                    <?php foreach (($yearCounts?:[]) as $yc): ?>
                        <option value="<?= Html::encode($yc['y']) ?>" <?= (isset($selectedYear) && $selectedYear==$yc['y'])?'selected':'' ?>><?= Html::encode($yc['y']) ?> (<?= $yc['cnt'] ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="table-responsive fixed-header-table" style="max-height:520px;overflow:auto;">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => false,
            'columns' => [
                // Do NOT show serial column ('#') and 'id' as requested
                'title',
                [
                    'attribute' => 'cover_image',
                    'label' => '海报',
                    'format' => 'raw',
                    'value' => function($model) {
                        $url = $model['cover_image'];
                        if (!$url) return '';
                        if (strpos($url, 'http') === 0) {
                            return Html::img($url, ['style' => 'height:60px;object-fit:cover;border-radius:4px;']);
                        }
                        return Html::img(Url::to('@web/images/' . $url), ['style' => 'height:60px;object-fit:cover;border-radius:4px;']);
                    }
                ],
                'director',
                'actors',
                'release_date',
                [
                    'class' => 'yii\\grid\\ActionColumn',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function($url, $model) {
                            return Html::a('<i class="fas fa-edit"></i>', ['update', 'id' => $model['id']], ['class' => 'btn btn-sm btn-warning', 'title' => '编辑']);
                        },
                        'delete' => function($url, $model) {
                            return Html::a('<i class="fas fa-trash"></i>', ['delete', 'id' => $model['id']], [
                                'class' => 'btn btn-sm btn-danger',
                                'data' => ['confirm' => '确定要删除该电影吗？', 'method' => 'post']
                            ]);
                        }
                    ]
                ]
            ],
        ]); ?>
        </div>
    </div>
    <style>
        /* Fixed header using position: sticky */
        .fixed-header-table table thead th { position: sticky; top: 0; background: #fff; color: #000; z-index: 3; }
        .fixed-header-table table thead th { border-bottom: 2px solid #e9ecef; }
        .fixed-header-table table tbody td { vertical-align: middle; }
        /* Make GridView table look cleaner */
        .fixed-header-table table.table { margin-bottom: 0; }
    </style>

    <script>
        (function(){
            const select = document.getElementById('year-filter');
            if (select) select.addEventListener('change', function(){
                const v = this.value;
                const url = new URL(window.location.href);
                if (v) url.searchParams.set('year', v); else url.searchParams.delete('year');
                window.location = url.toString();
            });
        })();
    </script>
</div>
