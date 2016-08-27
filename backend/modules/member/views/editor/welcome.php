<?php
use yii\helpers\Url;
use yii\helpers\Html;

 ?>
 <div class="jumbotron">
   <h1>Congratulations!</h1>
   <p>คุณได้สมัครสมาชิกเรียบร้อยแล้ว</p>
   <?= Html::a('เข้าสู่ระบบ', ['/site/login'], ['class'=>'btn btn-primary grid-button']) ?>

 </div>
