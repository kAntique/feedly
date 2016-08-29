<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Clip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title:ntext',
            'subtitle:ntext',
            'year:ntext',
            'ep:ntext',
            // 'description:ntext',
            // 'tags',
            // 'link',
            // 'date_time',
            // 'IPaddress',
            // 'cover_img_id',
            // 'rate_id',
            // 'status_id',
            // 'catagory_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
