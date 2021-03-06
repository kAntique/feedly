<?php
use yii\helpers\Html;
use backend\modules\member\models\Editor;
/* @var $this \yii\web\View */
/* @var $content string */
?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini">APP</span><span class="logo-lg">' . Yii::$app->name . '</span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">



                <!-- User Account: style can be found in dropdown.less -->
                <?php
                    //use backend\modules\member\models\Editor;
                    $img = 'thumb_'.Yii::$app->user->identity->id.'.jpg';
                    // $id = Yii::$app->user->identity->id;
                    // $model = Editor::find()->where(['id' => $id]);
                    // $name =  $model->name;
                    // echo $name;
                ?>
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->
                        <?= Html::img('uploads/avatar/'.$img,['width' => 20,'height' => 20,'class'=>'img-circle']) ?>
                        <span class="hidden-xs">&nbsp;<?php echo Yii::$app->user->identity->username; ?></span>

                        <!-- <span class="hidden-xs">Admin</span> -->

                        <!-- <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="user-image" alt="User Image"/> -->

                        <!-- <span class="hidden-xs"><?php echo Yii::$app->user->identity->username; ?></span> -->

                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <!-- <img src="< $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle"
                                 alt="User Image"/> -->
                            <?= Html::img('uploads/avatar/'.$img,['width' => 200,'height' => 200,'class'=>'img-circle']) ?>

                            <p>



                                <?php echo Yii::$app->user->identity->username; ?>
                                  <?php $date = Editor::find()->where(['user_id'=>Yii::$app->user->identity->id])->one(); ?>
                                <small>Member since.<br> <?php echo $date->date_register; ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- <li class="user-body">
                            <div class="col-xs-4 text-center">
                                <a href="#">Followers</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Sales</a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#">Friends</a>
                            </div>
                        </li> -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                              <?= Html::a(
                                  'Profile',
                                  ['/member/editor/view'],
                                  ['class' => 'btn btn-default btn-flat']
                              ) ?>
                            </div>
                            <div class="pull-right">
                                <?= Html::a(
                                    'Sign out',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>

                <!-- User Account: style can be found in dropdown.less -->
                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</header>
