<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\Editor */

$this->title = $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Editors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$img = 'thumb_'.$model->id.'.jpg';

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
                'confirm' => 'คุณแน่ใจหรือไม่ว่าต้องการลบข้อมูลนี้ออก ?',
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
          //'avatar',
        ],
    ]) ?>
    <br/>
    <div class="">
        <p>
          <b>&nbsp;&nbsp;&nbsp;รูปโปรไฟล์</b>
        </p>
        <?= Html::img('uploads/avatar/'.$img,['class' => 'thumbnail']); $model->refresh(); ?>
    </div>
</div>
</div>
