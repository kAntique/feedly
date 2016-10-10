<?php

use yii\helpers\Html;
use yii\grid\GridView;
use wbraganca\videojs\VideoJsWidget;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $model->title;
?>

<html>
<body  bgcolor="black" >
  <div style="width:100%">


  <center>
    <font color="white"><h3 class="box-title"><?= Html::encode($this->title) ?></h3></font>
      <?= VideoJsWidget::widget([
             'options' => [
                 'class' => 'video-js vjs-default-skin vjs-big-play-centered',
                 'poster' =>'uploads/coverimage/'.$model->coverImg['filename'],
                 'width' => '100%',
                 //'height' => '480',
                 'controls' => true,

             ],
             'jsOptions' => [
                 'preload' => 'auto',
             ],
             'tags' => [
                 'source' => [
                      ['src' =>$model->link, 'type' => 'video/mp4'],
                 ],
                //  'track' => [
                //      ['kind' => 'captions', 'src' => 'http://vjs.zencdn.net/vtt/captions.vtt', 'srclang' => 'en', 'label' => 'English']
                //  ]
             ]
         ]); ?>


      </center>
  </div>
  <div class="box">
    <h4>code iframe</h4>

    <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_play_clip'].$model->id ;?>"></iframe></textarea>
  </div>
</body>
</html>
