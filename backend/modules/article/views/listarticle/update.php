<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Listarticle */

$this->title = 'Update Listarticle: ' . $model->playlist_id;
$this->params['breadcrumbs'][] = ['label' => 'Listarticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->playlist_id, 'url' => ['view', 'playlist_id' => $model->playlist_id, 'article_id' => $model->article_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="listarticle-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
