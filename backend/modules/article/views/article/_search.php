<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\ArticleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'headline') ?>

    <?= $form->field($model, 'content') ?>

    <?= $form->field($model, 'date_time') ?>

    <?= $form->field($model, 'IPaddress') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'rate_id') ?>

    <?php // echo $form->field($model, 'cover_img_id') ?>

    <?php // echo $form->field($model, 'world_id') ?>

    <?php // echo $form->field($model, 'category_id') ?>

    <?php // echo $form->field($model, 'status_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
