<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Clips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id], [
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
            'title:ntext',
            'subtitle:ntext',
            'year:ntext',
            'ep:ntext',
            'description:ntext',
            'tags',
            'link',
            'date_time',
            'IPaddress',
            'rate.rate_name',
            'status.name',
            'category.title',
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
