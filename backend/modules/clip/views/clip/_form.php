<?php

use yii\helpers\Html;
use yii\helpers\Url;
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
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput() ?>

    <?= $form->field($model, 'subtitle')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>


    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'ep')->textInput() ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>

    <?= $form->field($model, 'tags')->widget(SelectizeTextInput::className(), [

                    'clientOptions' => [ 'plugins' => ['remove_button'],
                      'create' => true,
                     ],
                     ])
                     ->hint('กรอกได้มากกว่า 1 คำค้น')
                     ?>

     <!-- $form->field($model, 'date_time')->textInput() ?> -->

   <!-- $form->field($model, 'IPaddress')->textInput(['maxlength' => true]) ?> -->

     <!-- $form->field($model, 'cover_img_id')->textInput() ?> -->

    <?= $form->field($model, 'rate_id')->dropDownList(
     ArrayHelper::map(Rate::find()->all(),'id','rate_name'),
     ['prompt'=>'เลือก ระดับ']
    ) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
     ArrayHelper::map(Status::find()->all(),'id','name'),
     ['options'=> ['name' =>['Selected'=>'selected']]],

     ['prompt'=>'เลือก ระดับ']
    ) ?>


    <?= $form->field($model, 'category_id')->dropDownList(
     ArrayHelper::map(Category::find()->where(['world_id'=>1])->all(),'id','title'),
     ['prompt'=>'เลือกหมวดหมู่']
    ) ?>

    <?php if(!$model->isNewRecord){?>
   <?=   Html::img('uploads/coverimage/'.$model->coverImg['filename'], ['width' => '200px']);?>

   <?php }?>

   <?= $form->field($modelimg, 'cover')->fileInput() ?>
<!-- <div class="box box-success box-header box-solid"> -->
  <?= $form->field($model, 'link')->textInput() ?>
  <!-- = $form->field($model, 'status_link')->textInput() ?> -->
 <div class="text-right">

         <?= Html::button('Dailymotion', ['value'=> Url::to('index.php?r=clip/clip/dailymotion'),'class'=> 'btn btn-primary','id'=> 'dailymotion']) ?>

        <?= Html::button('Openload',['value'=> Url::to('index.php?r=clip/clip/openload'),'class'=> 'btn btn-primary','id'=> 'modalButton'])  ?>
      </div>
      <?php Modal::begin([

        //  'header' => '<h4>อัพโหลดคลิป : กรอกลิงค์เพื่อทำการอัพโหลด</h4>',
            'id' => 'modal',
              'size' => 'modal-lg',

            ]);

              echo "<div id='modalContent'></div>";
              Modal::end();?>


 <!-- </div> -->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'บันทึก', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-success','id'=> 'createVDO']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
