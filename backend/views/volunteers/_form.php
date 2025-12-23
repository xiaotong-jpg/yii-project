<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $model common\models\Volunteers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="volunteers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'photo_url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'summary')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'publish_date')->textInput() ?>

    <?= $form->field($model, 'detail_url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
