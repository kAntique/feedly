<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\status\models\Status;
use dosamigos\selectize\SelectizeTextInput;
use kartik\file\FileInput;
use dosamigos\ckeditor\CKEditor;
use yii\bootstrap\Modal;
//use yii\bootstrap\ActiveForm;
/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */
/* @var $form yii\widgets\ActiveForm */

$this->registerJs(" $('#btnUpload').on('click', function() {
var getlink = document.getElementsByName('link')[0].value ;
var url = 'https://api.openload.co/1/remotedl/add?login=7025d55ff5a790f1&key=yN-q0vUl&url='+getlink;
$('#modal').modal('hide');
 $('#modalButton').prop('disabled', true);
 $('#dailymotion').prop('disabled', true);
 $('#createVDO').prop('disabled', true);
  $('#clip-link').prop('disabled', true);
$.ajax({
          url : url,
         type: 'post',

         success:function(response) {
             console.log(response);
             $.ajax({
               url: 'http://localhost/feedly/backend/web/index.php?r=clip/clip/create',
                type: 'post',

                 success: function (data) {

                        $('#clip-link').val(response.result.id);

                        $('#modalButton').prop('disabled', false);
                        $('#dailymotion').prop('disabled', false);
                        $('#createVDO').prop('disabled', false);
                         $('#clip-link').prop('disabled', false);
                     }
             });
              // $('#uplink').hide();
              //   $('#progressbar').show();

              //   if(response.status){
               //
              //    var getstatus = 'https://api.openload.co/1/remotedl/status?login=7025d55ff5a790f1&key=yN-q0vUl&limit=5&id='+response.result.id;
              //   $.ajax({
              //             url : getstatus,
              //            type: 'get',
               //
              //            success:function(checkstatus) {
              //              console.log(checkstatus);
              //                   $.ajax({
              //                         url: getstatus,
              //                         type: 'get',
              //                         success: function(res) {
               //
              //                           var refreshIntervalId =  setInterval(function(){
               //
              //                           $.ajax({
              //                             url:getstatus ,
              //                              success: function(checkstatus){
              //                                 console.log(checkstatus);
              //                                 if(checkstatus.result[response.result.id].status == 'finished')
              //                                 clearInterval(refreshIntervalId);
              //                                    //alert(checkstatus.result[response.result.id].url);
              //                                   //  $('#modal').modal('hide');
              //                                    $.ajax({
              //                                      url: 'http://localhost/feedly/backend/web/index.php?r=clip/clip/create',
              //                                       type: 'post',
               //
              //                                        success: function (data) {
              //                                               $('#clip-link').val(checkstatus.result[response.result.id].url);
              //                                               $('#modalButton').prop('disabled', false);
              //                                               $('#dailymotion').prop('disabled', false);
              //                                               $('#createVDO').prop('disabled', false);
              //                                               // $('#clip-link').prop('disabled', false);
              //                                            }
              //                                    });
              //                              },
              //                             });
              //                           }, 5000);
              //                         }
              //                     });
               //
              //                }
               //
              //    });
               //
              //  }
             },


          error:function(){
            window.connectionCls.getConnection();
          }



});


}); ");

?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">


  <? Pjax::begin();?>


<div class="formlink" id="uplink" >


 <div class="form-group">
   <input type="text" name="link" size="120">
    <?= Html::button( 'Upload',['class' => 'btn btn-success' ,'id'=> 'btnUpload']) ?>
</div>
</div>

<div class="progress progress-xs" id="progressbar" style=" display: none;" >
  <div class="progress-bar progress-bar-success progress-bar-striped active" style="width: 100%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" >
    <span class="sr-only"><span id="status_progress">20</span>% Complete</span>
  </div>

</div>


<? Pjex::end();?>



</div>
</div>
