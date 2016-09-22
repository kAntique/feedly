<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model backend\modules\playlist\models\Playlist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="text-center" >

      <?= Html::img('uploads/coverimage/'.$cover->filename
      ,['width' => 500,'height' => 315]
      )?>

    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            'name',
            'date',
            'description:ntext',
            //'cover_img_id',
            'category.title',
        ],
    ]) ?>
<p>
  <?= Html::button('เพิ่มคลิป',['value'=> Url::to('index.php?r=listclip/listclip/create'),'class'=> 'btn btn-primary','id'=> 'modalButton'])  ?>
</div>
<?php Modal::begin([

      'id' => 'modal',
        'size' => 'modal-lg',

      ]);
       echo "<div class='text-center'>$model->name</div>";
        echo "<div id='modalContent'></div>";
        Modal::end();?>
</p>
</div>
</div>
