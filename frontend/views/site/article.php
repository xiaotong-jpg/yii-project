<?php
/* @var $this yii\web\View */
/* @var $model common\models\Article */
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $model->title;
?>

<div class="container">
    <h1><?= Html::encode($model->title) ?></h1>

    <?php if (!empty($model->cover_image)): ?>
        <p>
            <img src="<?= Url::to('@web/images/' . $model->cover_image) ?>"
                 alt="<?= Html::encode($model->title) ?>"
                 style="max-width:100%;">
        </p>
    <?php endif; ?>

    <p><small>作者：<?= Html::encode($model->author) ?> 时间：<?= Html::encode($model->publish_date) ?></small></p>

    <div>
        <?= $model->content ?>
    </div>
</div>