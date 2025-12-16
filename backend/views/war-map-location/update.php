<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarMapLocation */

$this->title = 'Update War Map Location: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'War Map Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="war-map-location-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
