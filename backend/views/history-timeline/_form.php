<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\HistoryTimeline */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="history-timeline-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-3">
            <?= $form->field($model, 'event_year')->textInput(['type' => 'number', 'min' => 1900, 'max' => 2100]) ?>
        </div>
        <div class="col-md-3">
            <?= $form->field($model, 'event_month_day')->textInput(['maxlength' => true, 'placeholder' => 'MM-DD，例如 09-18']) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <?= $form->field($model, 'summary')->textInput(['maxlength' => true, 'placeholder' => '用于时间轴悬浮小卡片（建议≤80字）']) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6, 'placeholder' => '用于下方大详情框（可写更详细）']) ?>

    <?= $form->field($model, 'image')->textInput([
        'maxlength' => true,
        'placeholder' => '可填外链 http(s) 或本地文件名（相对于 frontend/web/images），如 918.jpg',
    ])->hint('前台页面支持外链；加载失败会自动用 918.jpg 兜底。') ?>

    <?= $form->field($model, 'image_source_url')->textInput([
        'maxlength' => true,
        'placeholder' => '可选：图片来源链接（用于溯源）',
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


