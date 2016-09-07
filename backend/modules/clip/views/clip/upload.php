<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Progress ;
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


    <div class="progress progress-xs">
      <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
        <span class="sr-only"><span id="status_progress">20</span>% Complete</span>
      </div>
    </div>



</div>
</div>
