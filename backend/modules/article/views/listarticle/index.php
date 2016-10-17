<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\article\models\ListarticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Listarticles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listarticle-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Listarticle', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'playlist_id',
            'article_id',
            'datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
