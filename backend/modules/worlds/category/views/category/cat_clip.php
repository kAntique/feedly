<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'หมวดหมู่';
?>

<?php $i = 0;?>
<center>  <h3>หมวดหมู่คลิป</h3></center>
<table style="width:100%">

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>'.
    Html::img('uploads/coverimage/' . $list->coverImg['filename'],['width' => '100%']).'<br><center>'.
    Html::a(" $list->title", ['/clip/playlist/all_playlist', 'category_id' => $list->id], ['class' => ' btn btn-primary'])
    .'</center></td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>


<?php  endforeach ;?>

</table>

<div >
  <h4>code iframe</h4>
  <textarea  style="width:100% "><iframe src="<?php echo Yii::$app->params['url_cat_clip'];?>" scrolling="auto" width="100%" height="100%" frameborder="0" ></iframe></textarea>
</div>
