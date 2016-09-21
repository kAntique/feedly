<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Article */

$this->title = 'แก้ไขบทความ:' . $model->headline;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id, 'category_id' => $model->category_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="article-update">


    <?= $this->render('_form', [
        'model' => $model,
        'modelimg'=>  $modelimg,
    ]) ?>

</div>
