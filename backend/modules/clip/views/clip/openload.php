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



 <?= $form->field($model, 'link')->textInput() ?>



    <?php ActiveForm::end(); ?>

</div>
</div>
