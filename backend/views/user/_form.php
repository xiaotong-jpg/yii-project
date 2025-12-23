<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */
/* @var $form yii\widgets\ActiveForm */

$statusMap = [
    User::STATUS_ACTIVE => '启用',
    User::STATUS_INACTIVE => '未激活',
    User::STATUS_DELETED => '已删除',
];
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->dropDownList($statusMap) ?>
        </div>
    </div>

    <?= $form->field($model, 'password')->passwordInput([
        'placeholder' => $model->isNewRecord ? '请输入密码' : '留空则不修改密码',
    ])->hint($model->isNewRecord ? null : '留空则不修改密码') ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>


