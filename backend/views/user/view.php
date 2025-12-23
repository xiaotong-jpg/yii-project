<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\UserAdmin */

$this->title = '用户 #' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '用户管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$statusMap = [
    User::STATUS_ACTIVE => '启用',
    User::STATUS_INACTIVE => '未激活',
    User::STATUS_DELETED => '已删除',
];
?>

<div class="user-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('编辑', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该用户吗？（软删除：status=0）',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回列表', ['index'], ['class' => 'btn btn-secondary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            [
                'attribute' => 'status',
                'value' => $statusMap[$model->status] ?? $model->status,
            ],
            'created_at:datetime',
            'updated_at:datetime',
            [
                'attribute' => 'password_reset_token',
                'format' => 'ntext',
                'value' => $model->password_reset_token ?: '—',
            ],
            [
                'attribute' => 'verification_token',
                'format' => 'ntext',
                'value' => $model->verification_token ?: '—',
            ],
        ],
    ]) ?>
</div>


