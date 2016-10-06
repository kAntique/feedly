<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\clip\models\Playlist;
use backend\modules\clip\models\Clip;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */
/* @var $form yii\widgets\ActiveForm */
$this->registerJs(" $(document).ready(function(){
     var playlist_id = '2';
     //document.getElementById('id_playlist').value
     //var num = idplay.value;
     $('#playlist_id').val(playlist_id);
   }); ");
?>

<div class="listclip-form">
      <input type="text" id="playlist_id" size="120">
    <?php $form = ActiveForm::begin(['id' => 'listform']); ?>

   <!-- $form->field($model, 'playlist_id')->dropDownList(
     ArrayHelper::map(Playlist::find()->where(['id'=>1])->all(),'id','name'),
     ['prompt'=>'เลือก']
    ) ?> -->
    <?= $form->field($model, 'playlist_id')->textInput() ?>
    <?= $form->field($model, 'clip_id')->dropDownList(ArrayHelper::map(Clip::find()->where(['category_id'=>3])->all(),'id','title'),
    ['prompt'=>'เลือก']) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
