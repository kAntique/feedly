<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\article\models\Listarticle */

$this->title = 'Create Listarticle';
$this->params['breadcrumbs'][] = ['label' => 'Listarticles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="listarticle-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
