<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'หมวดหมู่';
?>
<?php $i = 0;?>
<table style="width:100%">

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td >'.
    Html::img('uploads/coverimage/' . $list->coverImg['filename'],['width' => '300','height' => '200']).'<br><center>'.
    Html::a(" $list->title", ['/clip/playlist/all_playlist', 'category_id' => $list->id], ['class' => ' btn btn-primary'])
    .'</center></td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>


<?php  endforeach ;?>

</table>

<div class="box">
  <h4>code iframe</h4>

  <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_cat_clip'];?>" ></iframe></textarea>
</div>
