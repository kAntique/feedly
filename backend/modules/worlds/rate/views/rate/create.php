<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\rate\models\Rate */

$this->title = 'เพิ่ม ระดับความเหมาะสม';
$this->params['breadcrumbs'][] = ['label' => 'Rates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rate-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
