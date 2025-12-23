<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\HistoryTimelineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '抗战大事记';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="history-timeline-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('新增事件', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'event_year',
                'label' => '年份',
                'contentOptions' => ['style' => 'width:90px;'],
            ],
            [
                'attribute' => 'event_month_day',
                'label' => '月-日',
                'contentOptions' => ['style' => 'width:90px;'],
            ],
            [
                'attribute' => 'title',
                'label' => '标题',
                'format' => 'text',
            ],
            [
                'attribute' => 'summary',
                'label' => '简介',
                'format' => 'ntext',
                'contentOptions' => ['style' => 'max-width:420px; white-space:normal;'],
            ],
            [
                'attribute' => 'image',
                'label' => '图片',
                'format' => 'raw',
                'value' => function($model){
                    $val = (string)($model->image ?? '');
                    if ($val === '') return Html::tag('span', '—', ['class' => 'text-muted']);
                    if (preg_match('/^https?:\/\//i', $val)) {
                        return Html::a('外链', $val, ['target' => '_blank', 'rel' => 'noreferrer']);
                    }
                    return Html::tag('code', $val);
                },
                'contentOptions' => ['style' => 'width:120px;'],
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>


