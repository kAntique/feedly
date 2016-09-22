<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\listclip\models\Listclip */

$this->title = 'Update Listclip: ' . $model->playlist_id;
$this->params['breadcrumbs'][] = ['label' => 'Listclips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->playlist_id, 'url' => ['view', 'playlist_id' => $model->playlist_id, 'clip_id' => $model->clip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="listclip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
