<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\coverimg\models\Coverimg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coverimg-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

  <!-- $form->field($model, 'cover')->fileInput() ?> -->
     <?php echo FileInput::widget([
                       'model' => $model,
                     'attribute' => 'cover',
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
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
