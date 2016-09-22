<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use dosamigos\ckeditor\CKEditor;
use backend\modules\worlds\category\models\Category;
/* @var $this yii\web\View */
/* @var $model backend\modules\playlist\models\Playlist */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
<?= $form->field($model, 'category_id')->dropDownList(
     ArrayHelper::map(Category::find()->all(),'id','title'),
     ['prompt'=>'เลือกหมวดหมู่']
    ) ?>
<?php if(!$model->isNewRecord){?>
   <?=   Html::img('uploads/coverimage/'.$model->coverImg['filename'], ['width' => '200px']);?>

   <?php }?>
<?= $form->field($modelimg, 'cover')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'แก้ไข', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
