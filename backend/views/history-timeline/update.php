<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HistoryTimeline */

$this->title = '编辑事件：' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '抗战大事记', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '编辑';
?>

<div class="history-timeline-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


