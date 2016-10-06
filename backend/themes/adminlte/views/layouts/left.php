<aside class="main-sidebar">

    <section class="sidebar">



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
                      ['label' => 'รายการคลิป', 'icon' => 'glyphicon glyphicon-list-alt', 'url' => ['/clip/clip']],
                      ['label' => 'รายการเพลลิสต์', 'icon' => 'glyphicon glyphicon-log-in', 'url' => ['/clip/playlist']],
                      ['label' => 'เพิ่มคลิป', 'icon' => 'glyphicon glyphicon-film', 'url' => ['/clip/clip/create']],
                      ['label' => 'เพิ่มเพลลิสต์', 'icon' => 'glyphicon glyphicon-log-in', 'url' => ['/clip/playlist/create']],
                      ['label' => 'อัพโหลด',  'icon' => 'glyphicon glyphicon-upload', 'url' => ['/clip/clip/upload']],
                      ['label' => 'สถานะคลิป', 'icon' => 'glyphicon glyphicon-check', 'url' => ['/status/status']],

                      ['label' => 'บทความ', 'options' => ['class' => 'header']],
                      ['label' => 'เพิ่มบทความ', 'icon' => 'glyphicon glyphicon-edit', 'url' => ['/article/article']],

                      ['label' => 'ตั้งค่าทั่วไป', 'options' => ['class' => 'header']],
                      ['label' => 'ประเภท', 'icon' => 'glyphicon glyphicon-globe', 'url' => ['/world/world']],
                      ['label' => 'หมวดหมู่', 'icon' => 'glyphicon glyphicon-th-list', 'url' => ['/category/category']],
                      ['label' => 'ระดับความเหมาะสม', 'icon' => 'glyphicon glyphicon-object-align-bottom', 'url' => ['/rate/rate']],

                       ['label' => 'เมนู', 'options' => ['class' => 'header']],
                       ['label' => 'คลิป', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                       ['label' => 'บทความ', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                ],
            ]
        ) ?>

    </section>

</aside>
