<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\world\models\World */

$this->title = 'เพิ่ม World';
$this->params['breadcrumbs'][] = ['label' => 'Worlds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="world-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
