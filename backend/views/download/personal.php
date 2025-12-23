<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view renders the list of personal assignment download links.
 */
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $files array */
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">个人作业下载</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <?php foreach ($files as $f): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-file-alt mr-2"></i>
                        <?= Html::encode($f['label']) ?>
                    </div>
                    <div>
                        <a href="<?= Url::to(['download/file','type'=>'personal','file'=>$f['file']]) ?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> 下载</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
