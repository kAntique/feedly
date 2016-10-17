<aside class="main-sidebar">

    <section class="sidebar">


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


                        ['label' => 'คลิป', 'options' => ['class' => 'header','id' => 'public']],
                        ['label' => 'คลิปทั้งหมด', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/allclip']],
                        ['label' => 'คลิปใหม่', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/newclip']],
                        ['label' => 'หนัง', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/movie']],
                        ['label' => 'การ์ตูน', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/cartoon']],
                        ['label' => 'ละคร', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/drama']],
                        ['label' => 'ซีรีย์', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/series']],
                        ['label' => 'ซิทคอม', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/sitcom']],
                        ['label' => 'เพลง', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/music']],
                        ['label' => 'รายการทีวี', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/tv_programe']],
                        ['label' => 'Rate X', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/ratex']],
                        ['label' => 'Rete R', 'icon' => 'glyphicon glyphicon-play-circle', 'url' => ['/clip/playlist/rater']],


                    ['label' => 'บทความ', 'options' => ['class' => 'header','id' => 'public']],
                    ['label' => 'บทความทั้งหมด', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/all_article']],
                    ['label' => 'บทความใหม่','icon' => 'glyphicon glyphicon-book','url' => ['/article/article/new_article']],
                    ['label' => 'ข่าวเด่นประเด็นร้อน', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/hotnews']],
                    ['label' => 'การเมือง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/politics']],
                    ['label' => 'บ้านและสวน', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/home']],
                    ['label' => 'แฟชั่น', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/fashion']],
                    ['label' => 'กีฬา', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/sport']],
                    ['label' => 'เลขเด็ด', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/lucky_number']],
                    ['label' => 'ดูดวง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/dooduang']],
                    ['label' => 'ยานยนต์', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/auto']],
                    ['label' => 'เทคโนโลยี', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/technology']],
                    ['label' => 'โซเชียลฮิต', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/social_news']],
                    ['label' => 'มือถือ', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/mobile']],
                    ['label' => 'Android', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/Android']],
                    ['label' => 'ios', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/ios']],
                    ['label' => 'windows phone', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/windowsphone']],
                    ['label' => 'ท่องเที่ยว', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/travel']],
                    ['label' => 'ทำอาหาร', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/cook']],
                    ['label' => 'สุขภาพ', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/health']],
                    ['label' => 'บันเทิง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/Entertainment']],
                    ['label' => 'เรื่องย่อละคร', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/drama']],
                    ['label' => 'ผู้ชาย', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/men']],
                    ['label' => 'ผู้หญิง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/women']],
                    ['label' => 'เด็ก', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/children']],
                    ['label' => 'วาไรตี้', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/variety']],
                    ['label' => 'แต่งงาน', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/marry']],
                    ['label' => 'เศรษฐกิจ', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/economy']],
                    ['label' => 'เกม', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/game']],
                    ['label' => 'รีวิวหนัง', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/movie_review']],
                    ['label' => 'ฟุตบอล', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/football']],
                    ['label' => 'สัตว์', 'icon' => 'glyphicon glyphicon-book', 'url' => ['/article/article/new_article']],

                    ],

                ]



            ) ?>
          </div>

    </section>

</aside>
