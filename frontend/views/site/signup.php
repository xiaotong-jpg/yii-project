<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- breadcumb area -->
<div class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 txtc  text-center ccase">
                <div class="brpt">
                    <h2>Signup</h2>
                </div>
                <div class="breadcumb-inner">
                    <ul>
                        <li>You here! <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">Home</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">Signup</span></li>
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
                            <h1>Signup</h1>
                            <h2>Please fill out the following fields to signup</h2>
                        </div>
                        <div class="witr_apartment_form">
                            <?php $form = ActiveForm::begin([
                                'id' => 'form-signup',
                                'options' => ['class' => 'contact-form'],
                            ]); ?>

                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'username', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->textInput(['autofocus' => true, 'placeholder' => 'Username', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'email', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->textInput(['type' => 'email', 'placeholder' => 'Email', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'password', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->passwordInput(['placeholder' => 'Password', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
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
