<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use backend\modules\worlds\rate\models\Rate;
use backend\modules\worlds\world\models\World;
use backend\modules\worlds\coverimg\models\CoverImg;

/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\category\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rate_id')->dropDownList(
     ArrayHelper::map(Rate::find()->all(),'id','rate_name'),
     ['prompt'=>'Select rate']
    ) ?>

    <?= $form->field($model, 'world_id')->dropDownList(
     ArrayHelper::map(World::find()->all(),'id','world_name'),
     ['prompt'=>'Select world']
    ) ?>

    <?= $form->field($model, 'cover_img_id')->dropDownList(
     ArrayHelper::map(CoverImg::find()->all(),'id','filename'),
     ['prompt'=>'Select cover image']
    ) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
