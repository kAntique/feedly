<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\coverimg\models\Coverimg */

$this->title = 'เพิ่มภาพปก';
$this->params['breadcrumbs'][] = ['label' => 'Coverimgs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coverimg-create">

  

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
