<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\worlds\coverimg\models\CoverimgSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ภาพปก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มภาพปก', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([

        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            //'filename',
            [
          'attribute' => 'filename',
          'format' => 'html',
          'label' => 'ภาพปก',
          'value' => function ($model) {
              return Html::img('uploads/coverimage/' . $model['filename'],
                  ['width' => '60px']);
          },
      ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
</div>
