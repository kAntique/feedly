<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\playlist\models\PlaylistSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพลลิสต์';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <p>
        <?= Html::a('เพิ่มเพลลิสต์', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
          [
        'attribute' => 'cover_img_id',
        'format' => 'html',
        'label' => 'ภาพปก',
        'value' => function ($model) {
            return Html::img('uploads/coverimage/' . $model->coverImg['filename'],
                ['width' => '100px']);
        },
    ],
            'name',
            'description:ntext',
            'date',
            //'cover_img_id',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
