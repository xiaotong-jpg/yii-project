<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $code string */
/* @var $expireMinutes int */
?>

<div class="signup-otp">
    <p>您好！</p>
    <p>您正在注册账号，本次邮箱验证码为：</p>
    <p style="font-size:22px;font-weight:800;letter-spacing:2px;">
        <?= Html::encode($code) ?>
    </p>
    <p>验证码在 <strong><?= (int)$expireMinutes ?></strong> 分钟内有效，请勿泄露给他人。</p>
    <p style="color:#888;font-size:12px;margin-top:18px;">
        如非本人操作，请忽略此邮件。
    </p>
</div>


