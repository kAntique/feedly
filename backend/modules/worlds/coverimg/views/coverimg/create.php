<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\coverimg\models\Coverimg */

$this->title = 'Create Coverimg';
$this->params['breadcrumbs'][] = ['label' => 'Coverimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coverimg-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
