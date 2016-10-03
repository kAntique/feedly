<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use wbraganca\videojs\VideoJsWidget;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลิป';
?>
<?= VideoJsWidget::widget([
    'options' => [
        'class' => 'video-js vjs-default-skin vjs-big-play-centered',
        //'poster' => "http://video-js.zencoder.com/oceans-clip.png",
        'width' => '640',
        'height' => '264',
        'controls' => true,
    ],
    'jsOptions' => [
        'preload' => 'auto',
    ],
    'tags' => [
        'source' => [
            ['src' => 'https://openload.co/embed/KvT3rfpdVcE/??????????? - LULA [Official MV].mp4', 'type' => 'video/mp4'],
          //  ['src' => 'https://openload.co/embed/scTs4tv_YKE', 'type' => 'video/webm']
        ],
        // 'track' => [
        //     ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
        // ]
    ]
]); ?>
<?php foreach( $model as $list) :?>
 <?php echo $list->clip['title'];?><br>
 <li>
   <i class="fa fa-video-camera bg-maroon"></i>

   <div class="timeline-item">

     <div class="timeline-body ">
       <div class="entry" >
         <p>
         <iframe src="<?php echo $list->clip['link'];?>" scrolling="no" frameborder="0" width="100%" height="350" allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>
       </p>
     </div>

   </div>
 </li><br>
<?php  endforeach ;?>
