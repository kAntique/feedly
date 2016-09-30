<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\clip\models\Playlist;
use backend\modules\clip\models\Clip;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listclip-form">
  <?php foreach ($clip_id as $value): ?>
  <?php echo $value->title; ?><button  onclick="window.location.href='index.php?r=clip%2Fplaylist%2Fcreatelist&playlist_id=<?php echo $model->playlist_id; ?>&clip_id=<?php echo $value->id; ?>'" type="button"  class="fa fa-plus" ></button><br>
  <?php endforeach; ?>
    <?php $form = ActiveForm::begin(['id' => 'listform']); ?>


    <?= $form->field($model, 'clip_id')->dropDownList(ArrayHelper::map(Clip::find()->where(['category_id'=>3])->all(),'id','title'),
    ['prompt'=>'เลือก']) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
