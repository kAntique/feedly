<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use wbraganca\videojs\VideoJsWidget;
use backend\modules\worlds\coverimg\models\CoverImg;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลิปใหม่';
?>
<style>
td {
    border: 0px solid #a1a1a1;
    padding: 20px 40px;
    background: #dddddd;
    width: 300px;
    border-radius: 25px;
}
</style>
<center>  <h3>คลิปใหม่</h3></center>
<?php $i = 0; ?>
<table >

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>';
       $img = $list->cover_img_id;
          $poster = CoverImg::find()->where(['id'=>$img])->one();?>

            <center >
                <iframe src=<?php echo $list->link; ?> scrolling="no" frameborder="5"
                 width="100%" height="100%"  allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
               </iframe>
                <?= Html::a($list->title, ['/clip/clip/play_clip','clip_id'=>$list->id]);?>
            </center>

  <?php  echo '</td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>

<?php  endforeach ;?>

</table>
