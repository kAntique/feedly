<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\worlds\category\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หมวดหมู่';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มหมวดหมู่', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description:ntext',
            'tags',
            'rate.rate_name',
            // 'world_id',
            // 'cover_img_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
