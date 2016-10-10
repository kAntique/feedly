<aside class="main-sidebar">

    <section class="sidebar">




      <form  class="sidebar-menu" >
            <div class="text-center" style="color:white;font-size:150%;" >
              <?php echo "เมนู" ?>
            </div>
        </form>

          <div>
            <?= dmstr\widgets\Menu::widget(
                [
                    'options' => ['class' => 'sidebar-menu'],
                    'items' => [
                          //['label' => 'เมนู', 'options' => ['class' => 'text-center','style' => 'color:white; font-size:20px;']],
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

                        // ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                        ['label' => 'คลิป', 'options' => ['class' => 'header','id' => 'public']],
                        ['label' => 'คลิปใหม่', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'หนัง', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'การ์ตูน', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'ละคร', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'ซีรีย์', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'ซิทคอม', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'เพลง', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'รายการทีวี', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'Rate X', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                        ['label' => 'Rete R', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/category/category/allcat_clip']],
                    //     [
                    //     'label' => 'คลิปทั้งหมด',
                    //     'icon' => 'fa fa-share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'หนัง', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'การ์ตูน', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'fa fa-circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'fa fa-circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                    ['label' => 'บทความ', 'options' => ['class' => 'header','id' => 'public']],

                    ['label' => 'บทความใหม่',
                     'icon' => 'glyphicon glyphicon-book',
                      'url' => ['/category/category/allcat_article'],
                    ],
                    ['label' => 'บทความทั้งหมด', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'ข่าวเด่นประเด็นร้อน', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'การเมือง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'บ้านและสวน', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'แฟชั่น', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'กีฬา', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'หวย', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'ยานยนต์', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ['label' => 'เทคโนโลยี', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/category/category/allcat_article']],
                    ],

                ]



            ) ?>
          </div>

    </section>

</aside>
