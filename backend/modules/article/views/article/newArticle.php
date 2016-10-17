<?php

use yii\helpers\Html;
use yii\helpers\Url;
use backend\modules\worlds\coverimg\models\CoverImg;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'บทความใหม่';
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
<center>  <h3>บทความใหม่</h3></center>
<?php $i = 0; ?>
<table >

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>';
       $img = $list->cover_img_id;
          $poster = CoverImg::find()->where(['id'=>$img])->one();?>

          <center>
            <?php echo Html::img('uploads/coverimage/' . $poster->filename,  ['width' => '100%']); ?><br>
       <?= Html::a($list->headline, ['/article/article/detail','article_id'=>$list->id]);?>
     </center>

  <?php  echo '</td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>

<?php  endforeach ;?>

</table>
