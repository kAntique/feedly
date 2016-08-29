<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\world\models\World;
use backend\modules\worlds\coverimg\models\CoverImg;
use dosamigos\selectize\SelectizeTextInput;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\category\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->widget(SelectizeTextInput::className(), [

                    'clientOptions' => [ 'plugins' => ['remove_button'],
                      'create' => true,
                     ],
                     ])
                     ->hint('กรอกได้มากกว่า 1 คำค้น')
                     ?>

    <?= $form->field($model, 'rate_id')->dropDownList(
     ArrayHelper::map(Rate::find()->all(),'id','rate_name'),
     ['prompt'=>'เลือก ระดับ']
    ) ?>

    <?= $form->field($model, 'world_id')->dropDownList(
     ArrayHelper::map(World::find()->all(),'id','world_name'),
     ['prompt'=>'เลือก หัวข้อ']
    ) ?>
 <!-- $form->field($model, 'cover_img_id')->dropDownList(
     ArrayHelper::map(CoverImg::find()->all(),'id','filename'),
     ['prompt'=>'เลือก ภาพปก']
    ) ?> -->
    <?php if(!$model->isNewRecord){?>
   <?=   Html::img('uploads/coverimage/'.$model->coverImg['filename'], ['width' => '200px']);?>

   <?php }?>

   <?= $form->field($modelimg, 'cover')->fileInput() ?>


    <!-- < echo FileInput::widget([
                    'name' =>'cover',
                      'pluginOptions' => [
                          'showCaption' => false,
                          'showRemove' => false,
                          'showUpload' => false,
                          'browseClass' => 'btn btn-primary ',//btn-block
                          'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                          'browseLabel' =>  'Select Photo',
                          //'maxFileSize'=>409600,
                      ],
                      'options' => ['accept' => 'image/*'],

                  ]); ?><br> -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'ตกลง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
