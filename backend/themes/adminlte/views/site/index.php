<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use yii\helpers\Html;
$this->title = 'Feedly.club';
?>
<div class="site-index" >

  <div class="text-center">

       <!-- Html::a('คลิป', ['/category/category/playlist_clip'], ['class'=>'btn btn-gray']) ?>
       Html::a('บทความ', ['/category/category/playlist_article'], ['class'=>'btn btn-gray']) ?> -->
   </div>
<div class="embed-responsive embed-responsive-16by9" >
   <iframe  src="http://localhost/feedly/backend/web/index.php?r=category%2Fcategory%2Fallcat_clip"   scrolling="auto" width="100%" height="100%" frameborder="0" ></iframe>
 </div>
