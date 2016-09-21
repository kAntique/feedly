<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */

$this->title = 'บทความ';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($model->headline) ?></h3>
  </div>

  <div class="box-body">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id,'category_id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="text-center" >

      <?= Html::img('uploads/coverimage/'.$cover->filename
      ,['width' => 600,'height' => 315]
      )?>

    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
          //'id',
            'headline',
            'date_time',
          //  'IPaddress',
            'tags',
            'rate.rate_name',
            'category.title',
            //'coverImg.filename',
              'content:html',
        ],
    ]) ?>

</div>
</div>
