<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'เพลลิสต์ทั้งหมด';
?>
<style >
/* Minimal css for clickable pure CSS collapsible tree menu */
/* As specific as possible to prevent interference with other code */

#menutree li {
 list-style: none;          /* all list item li dots invisible */
       }

 li .menu_label + input[type=checkbox] {
    opacity: 0;             /* checkboxes invisible and use no space */
   }                        /* display: none; is better but fails in ie8 */

  li .menu_label {
    cursor: pointer;        /* cursor changes when you mouse over this class */
  }                         /* could add the many user-select: none; commands here */

    li .menu_label + input[type=checkbox] + ol > li
       {
          display: none;         /* prevents sublists below unchecked labels from displaying */
       }

    li .menu_label + input[type=checkbox]:checked + ol > li
       {
         display: block;         /* display submenu on click */
       }

</style>
<center>  <h3>เพลลิสต์ทั้งหมด</h3>
<div style="color:red;" >
<?php  if ($model == null) {
  echo "*** ไม่มีรายการเพลลิสต์ ***";
}?>
</div></center>
<?php $i = 0;?>
<table >


<?php foreach( $model as $list) :?>

<?php  $i++;
  echo '<td>'.
  Html::img('uploads/coverimage/' . $list->coverImg['filename'],['width' => '100%']).'<br><center>'.
  Html::a(" $list->name",['/clip/listclip/list_clip', 'playlist_id' => $list->id], ['class' => ' btn btn-primary'])
  .'</center></td>';


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
      <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_all_playlist'].$category_id ;?>"></iframe></textarea>


    </li>
  </ol>
</li>
</table>
<!-- <div class="box">
  <h4>code iframe</h4>

  <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_all_playlist'].$category_id ;?>"></iframe></textarea>
</div> -->
