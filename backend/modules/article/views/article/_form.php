<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\status\models\Status;
use dosamigos\selectize\SelectizeTextInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'headline')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
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

    <?= $form->field($model, 'rate_id')->dropDownList(
     ArrayHelper::map(Rate::find()->all(),'id','rate_name'),
     ['prompt'=>'เลือก ระดับ']
    ) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
     ArrayHelper::map(Category::find()->where(['world_id'=>2])->all(),'id','title'),
     ['prompt'=>'เลือกหมวดหมู่']
    ) ?>
    <?php if(!$model->isNewRecord){?>
   <?=   Html::img('uploads/coverimage/'.$model->coverImg['filename'], ['width' => '200px']);?>

   <?php }?>
     <?= $form->field($modelimg, 'cover')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
