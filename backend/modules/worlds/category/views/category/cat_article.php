<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'หมวดหมู่';
?>

<?php foreach( $model as $list) :?>
<?php
$this->registerJs(" $('#$list->id').on('click', function(){

  $.ajax({
            url : url,
           type: 'post',

           success:function() {
               console.log();

               },
            error:function(){

            }
  });
}); ");
?>
<?=  Html::button( " $list->title",['class' => ' btn btn-primary','id'=> $list->id])?><t>
<?php  endforeach ;?>
