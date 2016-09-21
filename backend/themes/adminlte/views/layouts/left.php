<aside class="main-sidebar">

    <section class="sidebar">

<<<<<<< HEAD
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <!-- <p>< echo Yii::$app->user->identity->username; ?></p> -->
=======
>>>>>>> 460c4e0ff0fc759ae75199ff6f49f8e9cddb78a4



        <!-- <form  class="sidebar-menu" >
            <div class="text-center" style="color:white;font-size:150%;" >
              php echo "เมนู" ?>
            </div>
        </form> -->


        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                      ['label' => 'เมนู', 'options' => ['class' => 'text-center','style' => 'color:white; font-size:20px;']],
                      ['label' => 'คลิป', 'options' => ['class' => 'header']],
                      ['label' => 'รายการ', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['/clip/clip']],
                      ['label' => 'เพิ่มคลิป', 'icon' => 'glyphicon glyphicon-film', 'url' => ['/clip/clip/create']],
                      ['label' => 'อัพโหลด',  'icon' => 'glyphicon glyphicon-upload', 'url' => ['/clip/clip/upload']],
                      ['label' => 'สถานะคลิป', 'icon' => 'glyphicon glyphicon-check', 'url' => ['/status/status']],
                      ['label' => 'บทความ', 'options' => ['class' => 'header']],
                      ['label' => 'เพิ่มบทความ', 'icon' => 'glyphicon glyphicon-edit', 'url' => ['/article/article']],
                      ['label' => 'ตั้งค่าทั่วไป', 'options' => ['class' => 'header']],
                      ['label' => 'ประเภท', 'icon' => 'glyphicon glyphicon-globe', 'url' => ['/world/world']],
                      ['label' => 'หมวดหมู่', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['/category/category']],
                      ['label' => 'ระดับความเหมาะสม', 'icon' => 'glyphicon glyphicon-object-align-bottom', 'url' => ['/rate/rate']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
