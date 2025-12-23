<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

$this->title = '注册';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- breadcumb area -->
<div class="breadcumb-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12 txtc  text-center ccase">
                <div class="brpt">
                    <h2>注册</h2>
                </div>
                <div class="breadcumb-inner">
                    <ul>
                        <li>当前位置 <i class="icofont-thin-right"></i> </li>
                        <li><a href="<?= Url::to(['/site/index']) ?>" rel="v:url" property="v:title">首页</a></li>
                        <li><i class="icofont-thin-right"></i></li>
                        <li><span class="current">注册</span></li>
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
                            <h1>注册</h1>
                            <h2>请输入信息完成注册（验证码10分钟有效）</h2>
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
                                            ])->textInput(['autofocus' => true, 'placeholder' => '用户名', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'email', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->textInput(['type' => 'email', 'placeholder' => '邮箱', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <div class="row" style="margin-left:-5px;margin-right:-5px;">
                                                <div class="col-xs-7" style="padding-left:5px;padding-right:5px;">
                                                    <?= $form->field($model, 'email_code', [
                                                        'template' => '{input}{error}',
                                                        'options' => ['class' => 'form-group']
                                                    ])->textInput(['placeholder' => '邮箱验证码（6位）', 'class' => 'form-control', 'maxlength' => 6]) ?>
                                                </div>
                                                <div class="col-xs-5" style="padding-left:5px;padding-right:5px;">
                                                    <button type="button" id="send-signup-code-btn" class="btn btn-default" style="width:100%;height:44px;">
                                                        获取验证码
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="send-signup-code-msg" style="margin-top:8px;color:#777;font-size:12px;"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="twr_form_box">
                                            <?= $form->field($model, 'password', [
                                                'template' => '{input}{error}',
                                                'options' => ['class' => 'form-group']
                                            ])->passwordInput(['placeholder' => '密码（至少6位）', 'class' => 'form-control']) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <?= Html::submitButton('注册', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                                        <div style="margin-top:10px;color:#999;">
                                            已有账号？<?= Html::a('去登录', ['/site/login']) ?>
                                        </div>
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

<?php
$sendUrl = Url::to(['/site/send-signup-code']);
$csrf = Yii::$app->request->getCsrfToken();
$csrfParam = Yii::$app->request->csrfParam;
$this->registerJs(<<<JS
(function(){
  var btn = document.getElementById('send-signup-code-btn');
  var msg = document.getElementById('send-signup-code-msg');
  var emailEl = document.getElementById('signupform-email');
  if (!btn || !emailEl) return;

  var cooldown = 0;
  var timer = null;

  function setMsg(text, isError){
    if (!msg) return;
    msg.style.color = isError ? '#d93025' : '#2e7d32';
    msg.textContent = text || '';
  }

  function tick(){
    if (cooldown <= 0) {
      clearInterval(timer);
      timer = null;
      btn.disabled = false;
      btn.textContent = '获取验证码';
      return;
    }
    btn.textContent = cooldown + 's';
    cooldown -= 1;
  }

  btn.addEventListener('click', function(){
    var email = (emailEl.value || '').trim();
    if (!email) {
      setMsg('请先输入邮箱。', true);
      return;
    }
    btn.disabled = true;
    setMsg('正在发送验证码...', false);

    fetch('{$sendUrl}', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
        'X-CSRF-Token': '{$csrf}'
      },
      body: '{$csrfParam}=' + encodeURIComponent('{$csrf}') + '&email=' + encodeURIComponent(email)
    }).then(function(r){ return r.json(); }).then(function(json){
      if (json && json.status === 'success') {
        setMsg(json.message || '验证码已发送，请查收。', false);
        cooldown = 60;
        tick();
        timer = setInterval(tick, 1000);
      } else {
        btn.disabled = false;
        setMsg((json && json.message) ? json.message : '发送失败，请稍后重试。', true);
      }
    }).catch(function(){
      btn.disabled = false;
      setMsg('网络错误，请稍后重试。', true);
    });
  });
})();
JS);
?>
