<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพลลิสต์ทั้งหมด';
?>
<center>  <h3>เพลลิสต์ทั้งหมด</h3>
<div style="color:red;" >
<?php  if ($model == null) {
  echo "*** ไม่มีรายการเพลลิสต์ ***";
}?>
</div></center>
<?php $i = 0;?>
<table >


<?php foreach( $model as $list) :?>

<?php  $i++;
  echo '<td>'.
  Html::img('uploads/coverimage/' . $list->coverImg['filename'],['width' => '100%']).'<br><center>'.
  Html::a(" $list->name",['/clip/listclip/list_clip', 'playlist_id' => $list->id], ['class' => ' btn btn-primary'])
  .'</center></td>';


  if($i == 4) {
      echo '</tr><tr>';
      $i = 0;
  } ?>

<?php  endforeach ;?>
</table>
<div class="box">
  <h4>code iframe</h4>

  <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_all_playlist'].$category_id ;?>"></iframe></textarea>
</div>
