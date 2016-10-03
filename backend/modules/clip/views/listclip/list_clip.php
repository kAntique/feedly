<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'คลิป';
?>

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
