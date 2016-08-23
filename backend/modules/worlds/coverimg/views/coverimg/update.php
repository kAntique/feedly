<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\coverimg\models\Coverimg */

$this->title = 'Update Coverimg: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Coverimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coverimg-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
