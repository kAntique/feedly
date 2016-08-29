<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\category\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'id',
            'title',
            'description:ntext',
            'tags',
            'rate.rate_name',
            'world.world_name',
            //'cover_img_id',
            'coverImg.filename',


        ],
    ]) ?>
    <div class="text-center" >

      <?= Html::img('uploads/coverimage/'.$cover->filename
      ,['width' => 350,'height' => 300]
      )?>

    </div>

</div>
</div>
