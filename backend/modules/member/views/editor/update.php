<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\modules\member\models\Editor */

$this->title = 'แก้ไขข้อมูล: ' . $model->name;
//$this->params['breadcrumbs'][] = ['label' => 'Editors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'แก้ไขข้อมูล';
?>
<div class="box box-success box-solid">
    <div class="box-header">
      <h3 class="box-title"><i class="glyphicon glyphicon-pencil">&nbsp;</i><?=  Html::encode($this->title)?></h3>
    </div>
    <div class="box-body">
    <?= $this->render('signup', [
        'model' => $model,
        'user' => $user,
    ]) ?>

</div>
</div>
