<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\clip\models\Clip */

$this->title = 'เพิ่มคลิป';
$this->params['breadcrumbs'][] = ['label' => 'Clips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clip-create">


    <?= $this->render('_form', [
        'model' => $model,
        'modelimg'=>  $modelimg,
    ]) ?>

</div>
