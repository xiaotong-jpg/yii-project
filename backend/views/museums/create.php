<?php

use yii\helpers\Html;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $model common\models\Museums */

$this->title = 'Create Museums';
$this->params['breadcrumbs'][] = ['label' => 'Museums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="museums-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
