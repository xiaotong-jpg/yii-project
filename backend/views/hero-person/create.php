<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\HeroPerson */

$this->title = 'Create Hero Person';
$this->params['breadcrumbs'][] = ['label' => 'Hero People', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hero-person-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
