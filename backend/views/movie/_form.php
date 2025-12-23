<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * Form partial used by create and update movie views.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\MovieForm */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card card-secondary">
    <div class="card-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'cover_image')->textInput(['maxlength' => true])->hint('可填写完整 URL 或图片文件名（放在 frontend/web/images/ 下）') ?>

        <?= $form->field($model, 'director')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'actors')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'release_date')->textInput(['maxlength' => true])->hint('例如：2025-08-01 或 2025') ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-primary']) ?>
            <?= Html::a('返回', ['index'], ['class' => 'btn btn-default ml-2']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
