<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\playlist\models\Playlist */

$this->title = 'แก้ไขเพลลิสต์: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="playlist-update">



    <?= $this->render('_form', [
        'model' => $model,
        'modelimg' => $modelimg,
    ]) ?>

</div>
