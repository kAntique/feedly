<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\status\models\Status */

$this->title = 'เพิ่มสถานะ';
$this->params['breadcrumbs'][] = ['label' => 'Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="status-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
