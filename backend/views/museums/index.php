<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
/* @var $this yii\web\View */
/* @var $searchModel common\models\MuseumsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Museums';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="museums-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Museums', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'opening_hours',
            'introduction:ntext',
            //'photos',
            //'website_url:url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
