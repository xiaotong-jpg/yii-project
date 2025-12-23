<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $model common\models\MuseumsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="museums-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'opening_hours') ?>

    <?= $form->field($model, 'introduction') ?>

    <?php // echo $form->field($model, 'photos') ?>

    <?php // echo $form->field($model, 'website_url') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
