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
<center>  <h3>คลิปใหม่</h3></center>
<?php $i = 0; ?>
<table style="width:100%">

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>';
       $img = $list->cover_img_id;
          $poster = CoverImg::find()->where(['id'=>$img])->one();?>


        <center >  <?=    VideoJsWidget::widget([
                  'options' => [
                      'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                      'poster' =>'uploads/coverimage/'.$poster->filename,
                       //'width' => '100%',
                       'height' => '150%',
                      'controls' => true,
                  ],
                  'jsOptions' => [
                      'preload' => 'auto',
                  ],
                  'tags' => [
                      'source' => [
                           ['src' =>$list->link, 'type' => 'video/mp4'],
                      ],
                      // 'track' => [
                      //     ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
                      // ]
                  ]
              ]);?>
              <?= Html::a($list->title, ['/clip/clip/play_clip','clip_id'=>$list->id]);?></center>
  <?php  echo '</td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>

<?php  endforeach ;?>

</table>
