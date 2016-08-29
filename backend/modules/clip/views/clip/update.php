<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */

$this->title = 'แก้ไขวิดีโอ: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Clips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="clip-update">

  

    <?= $this->render('_form', [
        'model' => $model,
          'modelimg' => $modelimg,
    ]) ?>

</div>
