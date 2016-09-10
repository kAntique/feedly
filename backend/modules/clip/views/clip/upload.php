<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Progress ;
use yii\bootstrap\Modal;
$this->registerJs(
   "$(document).ready(function(){
        $('#statuslink').on('pjax:end', function() {
            $.pjax.reload({container:'#countries'});  //Reload View
            setTimeout(refresh, 5000); // restart the function every 5 seconds
        });
    });"
);
// $this->registerJs(" $(document).ready( function() {
// var getlink = document.getElementById('showLink').text ;
// console.log(getlink);
// var url = 'https://api.openload.co/1/remotedl/status?login=7025d55ff5a790f1&key=yN-q0vUl&limit=5&id='+getlink;
// $.ajax({
//           url : url,
//          type: 'get',
//
//          success:function(response) {
//              console.log(response);
//                   // var refreshIntervalId =  setInterval(function(){
//                   // $.ajax({
//                   //   url: url,
//                   //   type: 'get',
//                   //    success: function(checkstatus){
//                   //       console.log(checkstatus);
//                   //       if(checkstatus.result[response.result.id].status == 'finished')
//                   //       clearInterval(refreshIntervalId);
//                   //
//                   //          $.ajax({
//                   //            url: 'http://localhost/feedly/backend/web/index.php?r=clip/clip/create',
//                   //             type: 'post',
//                   //
//                   //              success: function (data) {
//                   //                     $('#clip-link').val(checkstatus.result[response.result.id].url);
//                   //
//                   //                  }
//                   //          });
//                   //    },
//                   //   });
//                   // }, 5000);
//
//
//              },
//
//
//           error:function(){
//             window.connectionCls.getConnection();
//           }
//
//
//
// });
//
//
// }); ");
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
<div class="box box-success box-solid">
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
<? Pjax::begin(['id'='statuslink']);?>


  <table style="width:100%" class="text-align">
    <tr>
      <th>ชื่อเรื่อง</th>
      <th>ลิงค์วิดีโอ</th>
      <th>สถานะวิดีโอ</th>
    </tr>
      <?php foreach( $model as $list) :?>
    <tr>
      <td><?php echo $list->title; ?></td>
      <td id = "showLink"><?php echo $list->link;?></td>
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
  <? Pjex::end();?>


</div>
</div>
