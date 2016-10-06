<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'รายการคลิป';
?>

<?php foreach( $model as $list) :?>
  <?php echo $list->category_id;  ?><br>
<?php  endforeach ;?>
