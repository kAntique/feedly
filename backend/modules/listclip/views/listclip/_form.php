<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listclip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'playlist_id')->textInput() ?>

    <?= $form->field($model, 'clip_id')->textInput() ?>

    <?= $form->field($model, 'datetime')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
