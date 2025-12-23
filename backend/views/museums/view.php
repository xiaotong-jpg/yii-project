<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $model common\models\Museums */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Museums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="museums-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'address',
            'opening_hours',
            'introduction:ntext',
            'photos',
            'website_url:url',
        ],
    ]) ?>

</div>
