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
             'dataProvider' => $dataProvider,
             'columns' => [

                         [
                         'header'=>'รายการคลิป',
                         'value'=> function ( $list)
                                   {
                                        return  $list->clip['title'];


                                   },
                         'format' => 'raw',
                         ],
                         [
                         'header'=>'วันที่เพิ่ม',
                         'value'=> function ( $list)
                                   {
                                        return  $list->datetime;


                                   },
                         'format' => 'raw',
                         ],
                         [

                           'header'=>'ลบคลิป',
                         'value'=> function ($list)

                                   {
                                     $this->registerJs(" $('#$list->clip_id').on('click', function(){
                                       var playlist_id = $list->playlist_id;
                                       var clip_id = $list->clip_id;
                                       var url ='index.php?r=clip/listclip/delete&playlist_id='+playlist_id+'&clip_id='+clip_id;
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
                                        ['class' => 'btn btn-danger glyphicon glyphicon-trash','id'=> $list->clip_id]);
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
      <h3 class="box-title">เพิ่มคลิป</h3>

      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <?= GridView::widget([
            'dataProvider' => $dataProvider2,
            //'filterModel' => $searchModel,

            'columns' => [
                'title',

                        [

                        'header'=>'เพิ่มคลิป',
                        'value'=> function ($clip_id) use ($playlist_id)

                                  {
                                    $this->registerJs(" $('#$clip_id->id').on('click', function(){
                                      var playlist_id = $playlist_id;
                                      var clip_id = $clip_id->id;
                                      var url ='index.php?r=clip/playlist/createlist&playlist_id='+playlist_id+'&clip_id='+clip_id;
                                      $.ajax({
                                                url : url,
                                               type: 'post',

                                               success:function() {
                                                   console.log();
                                                     $('#$clip_id->id').prop('disabled', true);

                                                     $.pjax.reload('#showlist');
                                                   },
                                                error:function(){

                                                }
                                      });
                                    }); ");
                                       return
                                        Html::button( '',
                                       ['class' => 'btnAddclip glyphicon glyphicon-plus','id'=> $clip_id->id]);

                                    //    Html::a('.', ['createlist',
                                    //  'playlist_id'=> $playlist_id,
                                    //     'clip_id' => $clip_id->id], ['class' => 'btnAddclip glyphicon glyphicon-plus']);
                                  },
                        'format' => 'raw',
                        ],
                        // [
                        // 'header'=>'รายการคลิป',
                        // 'value'=> function ()
                        //           {
                        //                return
                        //                ;
                        //
                        //           },
                        // 'format' => 'raw',
                        // ],

            ],

        ]); ?>
    </div>
    <!-- /.box-body -->
  </div>
