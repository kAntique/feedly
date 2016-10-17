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
<style >

 li .menu_label + input[type=checkbox] {
    opacity: 0;
                 /* checkboxes invisible and use no space */
   }                        /* display: none; is better but fails in ie8 */

  li .menu_label {
    cursor: pointer;        /* cursor changes when you mouse over this class */
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 10px 24px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    border-radius: 8px;
     box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
  }

    li .menu_label + input[type=checkbox] + ol > li
       {
          display: none;         /* prevents sublists below unchecked labels from displaying */
          background-color: white;
         color: black;
         border: 2px solid #4CAF50; /* Green */
          padding: 12px 30px;
          border-radius: 8px;
           box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
       }

    li .menu_label + input[type=checkbox]:checked + ol > li
       {
         display: block;         /* display submenu on click */

       }

       td {
           border: 0px solid #a1a1a1;
           padding: 20px 40px;
           background: #dddddd;
           width: 300px;
           border-radius: 25px;
       }


</style>
<center>  <h3>คลิป</h3>
  <div style="color:red;" >
  <?php  if ($model == null) {
    echo "*** ไม่มีรายการคลิป ***";
  }?>
  </div>
</center>
<?php $i = 0; ?>
<table >

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>';
       $img = $list->clip['cover_img_id'];
          $poster = CoverImg::find()->where(['id'=>$img])->one();?>

          <center>
          <iframe src=<?php echo $list->clip['link']; ?> scrolling="no" frameborder="5"
           width="100%" height="100%"  allowfullscreen="true" webkitallowfullscreen="true" mozallowfullscreen="true">
         </iframe>
       <?= Html::a($list->clip['title'], ['/clip/clip/play_clip','clip_id'=>$list->clip['id']], ['class' => 'btn btn-primary']);?>
     </center>
  <?php  echo '</td>';


    if($i == 4) {
        echo '</tr><tr>';
        $i = 0;
    } ?>

<?php  endforeach ;?>
<li>

  <label class="menu_label" for="c1">code iframe</label>
  <input type="checkbox" id="c1" />                             <!-- input must follow label for safari -->
  <ol>

    <li>
      <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_list_clip'].$playlist_id.'&category_id='.$category_id;?>"></iframe></textarea>


    </li>
  </ol>
</li>
</table>
