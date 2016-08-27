<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'เลือกประเภทสมาชิก';
// $this->params['breadcrumbs'][] = $this->title;

 ?>
 <div class="select">
   <div class="jumbotron">
     <h3>สมัครสมาชิก</h3>
     <?= Html::a('Editor', ['/member/editor/signup','type_member' => 1], ['class'=>'btn btn-primary']) ?> <!-- เปลียน path เป็น ['/member/sinup'] -->
     <?= Html::a('Publisher', ['/member/editor/signup','type_member' => 2], ['class'=>'btn btn-primary']) ?> <!-- เปลียน path เป็น ['/member/sinup'] -->
   </div>

 </div>
