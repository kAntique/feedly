<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use wbraganca\videojs\VideoJsWidget;
use backend\modules\worlds\coverimg\models\CoverImg;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลิป';
?>
<?php $i = 0; ?>
<table>

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>';
       $img = $list->clip['cover_img_id'];
          $poster = CoverImg::find()->where(['id'=>$img])->one();?>


          <?=    VideoJsWidget::widget([
                  'options' => [
                      'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                      'poster' =>'uploads/coverimage/'.$poster->filename,
                      'width' => '300',
                      'height' => '200',
                      'controls' => true,
                  ],
                  'jsOptions' => [
                      'preload' => 'auto',
                  ],
                  'tags' => [
                      'source' => [
                           ['src' =>$list->clip['link'], 'type' => 'video/mp4'],
                      ],
                      // 'track' => [
                      //     ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
                      // ]
                  ]
              ]);?>
      <center>  <?= Html::a($list->clip['title'], ['/clip/clip/play_clip','clip_id'=>$list->clip['id']], ['class' => 'btn btn-primary']);?></center>
  <?php  echo '</td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>

<?php  endforeach ;?>

</table>
<div class="box">
  <h4>code iframe</h4>

  <textarea  id="text " name="iframe_allcat_clip"  style="width:100%">
    <iframe src="<?php echo Yii::$app->params['url_list_clip'].$playlist_id ;?>" ></iframe>
  </textarea>
</div>
