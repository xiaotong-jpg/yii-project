<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HistoryTimeline */

$this->title = '新增事件';
$this->params['breadcrumbs'][] = ['label' => '抗战大事记', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="history-timeline-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>


