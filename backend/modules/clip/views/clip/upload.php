<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Progress ;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

 $this->registerJs(
    "$(document).ready(function() {
          setInterval(function(){ $.pjax.reload('#showdata'); }, 50000);
});"
 );

?>
<head>
<style>
table, th, td {
    border: 1px ;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<div class="box box-success box-solid"  id="content" >
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode('อัพโหลดวิดีโอ') ?></h3>
  </div>

  <div class="box-body">
    <div class="text-center">
   <div>
            <?= Html::button('Dailymotion', ['value'=> Url::to('index.php?r=clip/clip/dailymotion'),'class'=> 'btn btn-primary','id'=> 'dailymotion']) ?>

           <?= Html::button('Openload',['value'=> Url::to('index.php?r=clip/clip/openload'),'class'=> 'btn btn-primary','id'=> 'modalButton'])  ?>
         <?php Modal::begin([

             'header' => '<h4>Upload</h4>',
               'id' => 'modal',
                 'size' => 'modal-lg',

               ]);

                 echo "<div id='modalContent'></div>";
                 Modal::end();?>
   </div>

    </div>
<?php Pjax::begin(['id'=>'showdata']);?>

  <table style="width:100%" class="text-align"  >
    <tr>
      <th>ชื่อเรื่อง</th>
      <th>ลิงค์วิดีโอ</th>
      <th>สถานะวิดีโอ</th>
    </tr>
      <?php foreach( $model as $list) :?>
    <tr>
      <td><?php echo $list->title; ?></td>
      <td ><?php echo $list->link;?></td>
      <td><?php
        if( $list->status_link == 0){
          echo "Uploading";
        }else {
            echo "finished";
        }
       ?></td>
    </tr>
    <?php  endforeach ;?>
  </table>

</div>
  <?php Pjax::end();?>


</div>
