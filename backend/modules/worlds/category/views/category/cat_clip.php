<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\clip\models\ClipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'หมวดหมู่';
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

</style>
<?php $i = 0;?>
<center>  <h3>หมวดหมู่คลิป</h3></center>
<table style="width:100%">

<?php foreach( $model as $list) :?>

  <?php  $i++;
    echo '<td>'.
    Html::img('uploads/coverimage/' . $list->coverImg['filename'],['width' => '100%']).'<br><center>'.
    Html::a(" $list->title", ['/clip/playlist/all_playlist', 'category_id' => $list->id], ['class' => ' btn btn-primary'])
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
      <textarea  id="text " name="iframe_allcat_clip"  style="width:100%"><iframe src="<?php echo Yii::$app->params['url_cat_clip'];?>"></iframe></textarea>


    </li>
  </ol>
</li>
</table>

<div >
  <h4>code iframe</h4>
  <textarea  style="width:100% "><iframe src="<?php echo Yii::$app->params['url_cat_clip'];?>" scrolling="auto" width="100%" height="100%" frameborder="0" ></iframe></textarea>
</div>
