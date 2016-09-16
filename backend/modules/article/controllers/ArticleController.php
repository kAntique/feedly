<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\worlds\coverimg\models\CoverImg;
use yii\web\UploadedFile;
use Imagine\Image\Box;
use yii\imagine\Image;
/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Article models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $cover_img_id
     * @param integer $world_id
     * @param integer $category_id
     * @param integer $status_id
     * @return mixed
     */
    public function actionView($id, $rate_id, $cover_img_id, $category_id)
    {
      $cover = CoverImg::find()->where(['id'=>$cover_img_id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id, $rate_id, $cover_img_id,  $category_id),
            'cover'=>$cover,
        ]);
    }

    /**
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Article();
        $modelimg = new CoverImg();
        $userIP = Yii::$app->request->UserIP;
        Yii::$app->params['uploadPath'] = 'uploads/coverimage/';
      if ($model->load(Yii::$app->request->post()) ) {
        $image = UploadedFile::getInstance($modelimg,'cover');

         // store the source file name
         $modelimg->filename = $image->name;
         $ext = end((explode(".", $image->name)));

         // generate a unique file name
         $modelimg->filename = Yii::$app->security->generateRandomString().".{$ext}";

         // the path to save file, you can set an uploadPath
         // in Yii::$app->params (as used in example below)
         $path = Yii::$app->params['uploadPath'] . $modelimg->filename;

         if($modelimg->save()){
             $image->saveAs($path);
             Image::frame($path)
             ->resize(new Box(1280, 720))
           ->save($path, ['quality' => 100]);
             $modelimg->id;
             $model->cover_img_id = $modelimg->id;
             $model->IPaddress = $userIP;
             $model->save();


         } else {
             // error in saving model
         }
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id,  'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelimg'=>  $modelimg,
            ]);
        }
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $cover_img_id
     * @param integer $world_id
     * @param integer $category_id
     * @param integer $status_id
     * @return mixed
     */
    public function actionUpdate($id, $rate_id, $cover_img_id, $category_id)
    {
        $model = $this->findModel($id, $rate_id, $cover_img_id,  $category_id);

        $modelimg = CoverImg::find()->where(['id'=>$cover_img_id])->one();

        Yii::$app->params['uploadPath'] = 'uploads/coverimage/';

        if ($model->load(Yii::$app->request->post())) {


          $image = UploadedFile::getInstance($modelimg,'cover');
          if (empty($image)) {
              $model->save();
         }else {
           unlink(getcwd().'/uploads/coverimage/'.$model->coverImg['filename']);

          // store the source file name
          $modelimg->filename = $image->name;
          $ext = end((explode(".", $image->name)));

          // generate a unique file name
          $modelimg->filename = Yii::$app->security->generateRandomString().".{$ext}";

          // the path to save file, you can set an uploadPath
          // in Yii::$app->params (as used in example below)
          $path = Yii::$app->params['uploadPath'] . $modelimg->filename;

          if($modelimg->save()){

              $image->saveAs($path);
              Image::frame($path)
            ->resize(new Box(1280, 720))
            ->save($path, ['quality' => 100]);
              $modelimg->id;
              $model->cover_img_id = $modelimg->id;
              $model->save();

          } else {
              // error in saving model
          }
         }
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id,  'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelimg'=>$modelimg,
            ]);
        }
    }

    /**
     * Deletes an existing Article model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $cover_img_id
     * @param integer $world_id
     * @param integer $category_id
     * @param integer $status_id
     * @return mixed
     */
    public function actionDelete($id, $rate_id, $cover_img_id, $category_id)
    {
            $model = $this->findModel($id, $rate_id, $cover_img_id,  $category_id);
        $coverimage = CoverImg::find()->where(['id'=>$cover_img_id])->one();
           unlink(getcwd().'/uploads/coverimage/'.$model->coverImg['filename']);
        $model->delete();
          $coverimage->delete();

          Yii::$app->session->setFlash('success', 'ลบข้อมูลสำเร็จ.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $cover_img_id
     * @param integer $world_id
     * @param integer $category_id
     * @param integer $status_id
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $rate_id, $cover_img_id,  $category_id)
    {
        if (($model = Article::findOne(['id' => $id, 'rate_id' => $rate_id, 'cover_img_id' => $cover_img_id,  'category_id' => $category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
