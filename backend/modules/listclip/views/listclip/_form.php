<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\playlist\models\Playlist;
use backend\modules\clip\models\Clip;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="listclip-form">

<div class="playlist">
  <?php echo $playlist->name;?><br>

</div>
   <div class="text-right">
     <?php foreach( $clip as $list) :?>
      <?php echo $list->title;?><br>

     <?php  endforeach ;?>
   </div>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>



</div>
