<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\coverimg\models\Coverimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <!-- $form->field($model, 'cover')->fileInput() ?> -->
     <?php echo FileInput::widget([
                       'model' => $model,
                     'attribute' => 'cover',
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

                   ]); ?><br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'ตกลง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
  </div>
</div>
