<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;
use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $model backend\modules\playlist\models\Playlist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box box-success box-solid">
  <div class="box-header">
      <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
  </div>

  <div class="box-body">

    <p>
        <?= Html::a('แก้ไข', ['update', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('ลบ', ['delete', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="text-center" >

      <?= Html::img('uploads/coverimage/'.$cover->filename
      ,['width' => 500,'height' => 315]
      )?>

    </div>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            'name',
            'date',
            'category.title',
        ],
    ]) ?>
</div>
</div>

  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">คลิปในเพลลิสต์</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->

    <div class="box-body" >
      <?php Pjax::begin(['id'=>'showlist']);?>
        <?= GridView::widget([
             'dataProvider' => $dataProvider4,
             'columns' => [

                         [
                         'header'=>'รายการคลิป',
                         'value'=> function ( $listArticle)
                                   {
                                        return  $listArticle->article['headline'];


                                   },
                         'format' => 'raw',
                         ],
                         [
                         'header'=>'วันที่เพิ่ม',
                         'value'=> function ( $listArticle)
                                   {
                                        return  $listArticle->datetime;


                                   },
                         'format' => 'raw',
                         ],
                         [

                           'header'=>'ลบคลิป',
                         'value'=> function ($listArticle)

                                   {
                                     $this->registerJs(" $('#$listArticle->article_id').on('click', function(){
                                       var playlist_id = $listArticle->playlist_id;
                                       var article_id = $listArticle->article_id;
                                       var url ='index.php?r=article/listarticle/delete&playlist_id='+playlist_id+'&article_id='+article_id;
                                       $.ajax({
                                                 url : url,
                                                type: 'post',

                                                success:function() {
                                                    console.log();
                                                      $.pjax.reload('#showlist');
                                                    },
                                                 error:function(){

                                                 }
                                       });
                                     }); ");
                                        return
                                         Html::button( '',
                                        ['class' => 'btn btn-danger glyphicon glyphicon-trash','id'=> $listArticle->article_id]);
                                   },
                         'format' => 'raw',
                         ],

             ],
         ]); ?>
             <?php Pjax::end();?>
    </div>
    <!-- /.box-body -->

  </div>
  <div class="box box-success box-solid">
    <div class="box-header with-border">
      <h3 class="box-title">เพิ่มบทความ</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?= GridView::widget([
            'dataProvider' => $dataProvider3,
            //'filterModel' => $searchModel,

            'columns' => [
                'headline',

                        [

                        'header'=>'เพิ่มบทความ',
                        'value'=> function ($article_id) use ($playlist_id)

                                  {
                                    $this->registerJs(" $('#$article_id->id').on('click', function(){
                                      var playlist_id = $playlist_id;
                                      var article_id = $article_id->id;
                                      var url ='index.php?r=clip/playlist/createlist_article&playlist_id='+playlist_id+'&article_id='+article_id;
                                      $.ajax({
                                                url : url,
                                               type: 'post',

                                               success:function() {
                                                   console.log();
                                                     $('#$article_id->id').prop('disabled', true);

                                                     $.pjax.reload('#showlist');
                                                   },
                                                error:function(){

                                                }
                                      });
                                    }); ");
                                       return
                                        Html::button( '',
                                       ['class' => 'btnAddclip glyphicon glyphicon-plus','id'=> $article_id->id]);

                                  },
                        'format' => 'raw',
                        ],


            ],

        ]); ?>
    </div>
    <!-- /.box-body -->
  </div>
