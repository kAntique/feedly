<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */

$this->title = $model->playlist_id;
$this->params['breadcrumbs'][] = ['label' => 'Listclips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listclip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'playlist_id' => $model->playlist_id, 'clip_id' => $model->clip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'playlist_id' => $model->playlist_id, 'clip_id' => $model->clip_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'playlist_id',
            'clip_id',
            'datetime',
        ],
    ]) ?>

</div>
