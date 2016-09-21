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
var url = '".\Yii::$app->params['url_openload_remote']."'+getlink;
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
               url: '".\Yii::$app->params['res_openload']."',
                type: 'post',

                 success: function (data) {

                        $('#clip-link').val(response.result.id);

                        $('#modalButton').prop('disabled', false);
                        $('#dailymotion').prop('disabled', false);
                        $('#createVDO').prop('disabled', false);
                         $('#clip-link').prop('disabled', false);
                     }
             });
             },
          error:function(){
            window.connectionCls.getConnection();
          }
});
}); ");

?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode("อัพโหลดคลิป") ?></h3>
  </div>

  <div class="box-body">
  <? Pjax::begin();?>


<div class="formlink" id="uplink" >


 <div class="form-group">
   <input type="text" name="link" size="120">
    <?= Html::button( 'อัพโหลด',['class' => 'btn btn-success' ,'id'=> 'btnUpload']) ?>
</div>
</div>


<? Pjex::end();?>



</div>
</div>
