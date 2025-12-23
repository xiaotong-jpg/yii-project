<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view shows the form to create a new movie record.
 */
use yii\helpers\Html;

$this->title = '新增电影';
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-8">
            <div class="card card-success">
                <div class="card-header"><h3 class="card-title"><?= Html::encode($this->title) ?></h3></div>
                <div class="card-body">
                    <?= $this->render('_form', ['model' => $model]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
