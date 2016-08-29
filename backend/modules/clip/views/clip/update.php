<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */

$this->title = 'Update Clip: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Clips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'catagory_id' => $model->catagory_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
