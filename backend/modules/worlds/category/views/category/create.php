<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\worlds\category\models\Category */

$this->title = 'เพิ่มหมวดหมู่';
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
