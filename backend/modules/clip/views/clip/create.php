<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */

$this->title = 'Create Clip';
$this->params['breadcrumbs'][] = ['label' => 'Clips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
