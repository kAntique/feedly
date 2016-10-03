<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพลลิสต์ทั้งหมด';
?>

<?php foreach( $model as $list) :?>

<?=  Html::a(" $list->name", ['/clip/listclip/list_clip', 'playlist_id' => $list->id], ['class' => ' btn btn-primary'])?>
<?php  endforeach ;?>
