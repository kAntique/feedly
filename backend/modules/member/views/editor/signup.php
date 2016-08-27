<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileupload\FileUploadUI;
use kartik\file\FileInput;
use dosamigos\selectize\SelectizeTextInput;

$this->title = 'สมัครสมาชิก';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-lg-7">
<div class="box box-success box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;<?=  Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
    <p>กรุณากรอกข้อมูลต่อไปนี้เพื่อสมัครสมาชิก:</p>

    <div class="row">
        <div class="col-lg-8">
            <?php $form = ActiveForm::begin([
              'options' =>['enctype' => 'multipart/form-data']
            ]); ?>

                <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'name')->textInput() ?>

                <?= $form->field($model, 'lastname')->textInput() ?>

                <?= $form->field($model, 'website')->widget(SelectizeTextInput::className(), [
                    //'loadUrl' => ['tag/list'],
                    //'options' => ['type_member'=> '1'] ,
                    'clientOptions' => [ 'plugins' => ['remove_button'],
                      'create' => true,
                     ],
                     ])->hint('กรอกได้มากกว่า 1 เว็บไซต์')?>

                <br><?php echo FileInput::widget([
                    'model' => $model,
                  'attribute' => 'avatar_img',
                    'pluginOptions' => [
                        'showCaption' => false,
                        'showRemove' => false,
                        'showUpload' => false,
                        'browseClass' => 'btn btn-primary btn-block',
                        'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                        'browseLabel' =>  'Select Photo'
                    ],
                    'options' => ['accept' => 'image/*']
                ]); ?><br>

                <?php if(!$model->isNewRecord){?>
                  <?= Html::img('uploads/avatar/'.$model->avatar,['class' => 'img-responsive thumbnail','width' => 250]);?>
                <?php
                  }
                ?>

                <?= $form->field($user, 'email') ?>

                <?= $form->field($user, 'password_hash')->passwordInput() ?>

                <!-- < $form->field($user, 're_password')->passwordInput() ?> -->

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Signup' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
</div>
</div>
