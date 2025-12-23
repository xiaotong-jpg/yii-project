<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HeroPerson */

$this->title = 'Update Hero Person: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Hero People', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hero-person-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
