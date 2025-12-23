<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '登录';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- breadcumb area -->
<div class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 txtc  text-center ccase">
                <div class="brpt">
                    <h2>登录</h2>
                </div>
                <div class="breadcumb-inner">
                    <ul>
                        <li>当前位置 <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">首页</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">登录</span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End breadcumb area -->  
<div class="lorw_contact_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-8 col-lg-offset-3 col-md-offset-2">
                <div class="contact_inner">
                    <div class="apartment_area">
                        <div class="apartment_text">
                            <h1>登录</h1>
                            <h2>请输入账号信息登录</h2>
                        </div>
                        <div class="witr_apartment_form">
                            <?php $form = ActiveForm::begin([
                                'id' => 'login-form',
                                'options' => ['class' => 'contact-form'],
                            ]); ?>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'username', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->textInput(['autofocus' => true, 'placeholder' => '邮箱或用户名', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'password', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->passwordInput(['placeholder' => '密码', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'rememberMe', [
                                                'template' => '{input} {label}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->checkbox() ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div style="color:#999;margin:1em 0">
                                            忘记密码？<?= Html::a('点这里重置', ['/site/request-password-reset']) ?>。
                                            <br>
                                            还没有账号？<?= Html::a('去注册', ['/site/signup']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <?= Html::submitButton('登录', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                                    </div>
                                </div>

                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
