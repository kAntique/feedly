<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\worlds\rate\models\RateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'ระดับความเหมาะสม';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มระดับ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'id',
            'rate_name',
            'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
  </div>
</div>
