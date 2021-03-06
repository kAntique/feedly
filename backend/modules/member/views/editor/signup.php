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
use yii\captcha\Captcha;
use bupy7\cropbox\Cropbox;
//use	yii\widgets\ActiveForm;

//$this->title = 'สมัครสมาชิก';
//$this->params['breadcrumbs'][] = $this->title;
$name = 'thumb_'.$model->id.'.jpg';
?>
<div class="box-body">
<p>กรุณากรอกข้อมูลต่อไปนี้เพื่อสมัครสมาชิก :</p>

<div class="row-lg-12">
    <div class="col-lg-16">
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

            <!-- <br>< echo FileInput::widget([
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
            ]); ?> -->

            <?php if(!$model->isNewRecord){?>
              <p><b>รูปโปรไฟล์</b></p>
              <?= Html::img('uploads/avatar/'.$name,['class' => 'thumbnail']);?>
            <?php
              }
            ?>
            <!-- <div class="text-center"> -->
              <?php echo $form->field($model, 'image')->widget(Cropbox::className(), [
                  'attributeCropInfo' => 'crop_info',
              ]); ?>
            <!-- </div> -->


            <!-- < $form->field($user, 're_password')->passwordInput() ?> -->

            <!-- < $form->field($model, 'reCaptcha')->widget(
                \himiklab\yii2\recaptcha\ReCaptcha::className(),
                ['siteKey' => '6Le55CgTAAAAABXOWu_kRKJW3kXxJjmlpTrfghcT']
            ) ?> -->

            <div class="form-group">
                <?= Html::submitButton($model->isNewRecord ? 'Signup' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
</div>
