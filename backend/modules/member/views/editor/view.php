<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\Editor */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Editors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;ข้อมูลของ&nbsp;<?=  Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
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
          'user.username',
          'name',
          'lastname',
          'user.email',
          'website',
          'avatar',
        ],
    ]) ?>
    <div class="text-center">
        <?= Html::img('uploads/avatar/'.$model->avatar,['width' => 300,'height' => 300]) ?>
    </div>
</div>
</div>
