<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\HistoryTimeline */

$this->title = $model->title ?: ('事件 #' . $model->id);
$this->params['breadcrumbs'][] = ['label' => '抗战大事记', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$image = (string)($model->image ?? '');
$isExternal = $image !== '' && preg_match('/^https?:\/\//i', $image);
?>

<div class="history-timeline-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除这条历史事件吗？',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            ['attribute' => 'event_year', 'label' => '年份'],
            ['attribute' => 'event_month_day', 'label' => '月-日'],
            ['attribute' => 'title', 'label' => '标题'],
            ['attribute' => 'summary', 'label' => '简介'],
            ['attribute' => 'content', 'label' => '详细介绍', 'format' => 'ntext'],
            [
                'attribute' => 'image',
                'label' => '图片',
                'format' => 'raw',
                'value' => function($model) {
                    $val = (string)($model->image ?? '');
                    if ($val === '') return Html::tag('span', '—', ['class' => 'text-muted']);
                    if (preg_match('/^https?:\/\//i', $val)) {
                        return Html::a(Html::encode($val), $val, ['target' => '_blank', 'rel' => 'noreferrer']);
                    }
                    return Html::tag('code', Html::encode($val));
                }
            ],
            [
                'attribute' => 'image_source_url',
                'label' => '图片来源',
                'format' => 'raw',
                'value' => function($model) {
                    $val = (string)($model->image_source_url ?? '');
                    if ($val === '') return Html::tag('span', '—', ['class' => 'text-muted']);
                    return Html::a(Html::encode($val), $val, ['target' => '_blank', 'rel' => 'noreferrer']);
                }
            ],
        ],
    ]) ?>

    <?php if ($isExternal): ?>
        <hr>
        <h4>图片预览</h4>
        <div style="max-width: 520px;">
            <?= Html::img($image, [
                'alt' => 'preview',
                'style' => 'max-width:100%;height:auto;border-radius:8px;border:1px solid #eee;',
                'referrerpolicy' => 'no-referrer',
                'loading' => 'lazy',
            ]) ?>
        </div>
    <?php else: ?>
        <hr>
        <div class="text-muted">
            说明：若你填的是本地文件名/相对路径（例如 <code>918.jpg</code>），这是前台目录 <code>frontend/web/images</code> 下的图片，
            后台域名未必能直接预览，但前台页面可以正常引用。
        </div>
    <?php endif; ?>

</div>


