<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HeroPersonSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Hero People';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hero-person-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Hero Person', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'life_span',
            'avatar',
            'biography:ntext',
            //'hometown',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
