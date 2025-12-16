<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\WarMapLocation */

$this->title = 'Create War Map Location';
$this->params['breadcrumbs'][] = ['label' => 'War Map Locations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="war-map-location-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
