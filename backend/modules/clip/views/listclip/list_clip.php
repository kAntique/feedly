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

<?php foreach( $model as $list) :
  $img = $list->clip['cover_img_id'];
    $poster = CoverImg::find()->where(['id'=>$img])->one();?>
    <div class="box box-success box-solid">
      <table >
        <tr>

          <p>
              <?=  Html::a($list->clip['title'], ['/clip/clip/play_clip','clip_id'=>$list->clip['id']], ['class' => 'btn btn-primary'])?>
          </p>

            <?= VideoJsWidget::widget([
                'options' => [
                    'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                    'poster' =>'uploads/coverimage/'.$poster->filename,
                    'width' => '400',
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
            ]); ?>

        </tr>
      </table>



</div><br>
<?php  endforeach ;?>
