<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Feedly.club';
?>
<div class="site-index">

  <div class="text-center">
      <?= Html::a('คลิป', ['/category/category/playlist_clip'], ['class'=>'btn btn-gray']) ?>
      <?= Html::a('บทความ', ['/category/category/playlist_article'], ['class'=>'btn btn-gray']) ?>
   </div>
<div class="box box-success text-center">
     <iframe src="http://localhost/feedly/backend/web/index.php?r=clip%2Flistclip%2Flist_clip&playlist_id=2" width="1024" height="720" scrolling="yes" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
<iframe src="http://localhost/feedly/backend/web/index.php?r=category%2Fcategory%2Fallcat_clip" width="1024" height="720" scrolling="yes" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
</div>

</div>
