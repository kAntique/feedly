<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\worlds\world\models\WorldSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Worlds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="world-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create World', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'world_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
