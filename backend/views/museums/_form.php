<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $model common\models\Museums */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="museums-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'opening_hours')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'introduction')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'photos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
