<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\playlist\models\Playlist */

$this->title = 'เพิ่มเพลลิสต์';
$this->params['breadcrumbs'][] = ['label' => 'Playlists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="playlist-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelimg' => $modelimg,
    ]) ?>

</div>
