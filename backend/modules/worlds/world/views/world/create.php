<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\world\models\World */

$this->title = 'Create World';
$this->params['breadcrumbs'][] = ['label' => 'Worlds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="world-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
