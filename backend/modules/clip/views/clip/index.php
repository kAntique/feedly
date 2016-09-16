<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลิป';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มคลิป', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
          'attribute' => 'cover_img_id',
          'format' => 'html',
          'label' => 'ภาพปก',
          'value' => function ($model) {
              return Html::img('uploads/coverimage/' . $model->coverImg['filename'],
                  ['width' => '100px']);
          },
      ],
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
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
