<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\article\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทความ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">


    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มบทความ', ['create'], ['class' => 'btn btn-success']) ?>
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

            'headline',
            'date_time',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
