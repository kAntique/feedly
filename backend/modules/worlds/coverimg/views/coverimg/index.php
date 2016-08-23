<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\worlds\coverimg\models\CoverimgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coverimgs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coverimg-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coverimg', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'filename',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
