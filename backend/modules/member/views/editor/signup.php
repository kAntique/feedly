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
//use	yii\widgets\ActiveForm;

//$this->title = 'สมัครสมาชิก';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box-body">
<p>กรุณากรอกข้อมูลต่อไปนี้เพื่อสมัครสมาชิก :</p>

<div class="row-lg-12">
    <div class="col-lg-12">
        <?php $form = ActiveForm::begin([
          'enableAjaxValidation' =>true,
          'options' =>['enctype' => 'multipart/form-data'],
        ]); ?>

            <?= $form->field($user, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($user, 'password_hash')->passwordInput() ?>

            <hr/>

            <?= $form->field($model, 'name')->textInput() ?>

            <?= $form->field($model, 'lastname')->textInput() ?>

            <?= $form->field($user, 'email') ?>

            <?php if (Yii::$app->request->get('type_member') == '2'): ?>
              <?= $form->field($model, 'website')->widget(SelectizeTextInput::className(), [
                  //'loadUrl' => ['tag/list'],
                  //'options' => ['type_member'=> '1'] ,
                  'clientOptions' => [ 'plugins' => ['remove_button'],
                    'create' => true,
                   ],
                   ])->hint('กรอกได้มากกว่า 1 เว็บไซต์')?>
            <?php endif; ?>

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

            <!-- < $form->field($user, 're_password')->passwordInput() ?> -->

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Signup' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
