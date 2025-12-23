<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This view renders the list of group assignment download links and availability.
 */
use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $files array */
?>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">小组作业下载</h3>
    </div>
    <div class="card-body">
        <ul class="list-group">
            <?php foreach ($files as $f): ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-file mr-2"></i>
                        <?= Html::encode($f['label']) ?>
                        <div class="text-muted small">文件名: <?= Html::encode($f['file']) ?></div>
                    </div>
                    <div>
                        <?php if (!empty($f['exists'])): ?>
                            <?php $linkType = !empty($f['type']) ? $f['type'] : 'group'; ?>
                            <a href="<?= Url::to(['download/file','type'=>$linkType,'file'=>$f['file']]) ?>" class="btn btn-primary btn-sm"><i class="fas fa-download"></i> 下载</a>
                        <?php else: ?>
                            <button class="btn btn-secondary btn-sm" disabled><i class="fas fa-times-circle"></i> 文件缺失</button>
                        <?php endif; ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
