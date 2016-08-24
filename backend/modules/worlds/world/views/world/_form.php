<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\world\models\World */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'world_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'เพิ่ม' : 'ตกลง', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
