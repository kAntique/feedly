<?php

namespace backend\modules\clip\controllers;

use Yii;
use backend\modules\clip\models\Clip;
use backend\modules\clip\models\ClipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\worlds\coverimg\models\CoverImg;
use yii\web\UploadedFile;
use Imagine\Image\Box;
use yii\imagine\Image;

/**
 * ClipController implements the CRUD actions for Clip model.
 */
class ClipController extends Controller
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
     * Lists all Clip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ClipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Clip model.
     * @param integer $id
     * @param integer $cover_img_id
     * @param integer $rate_id
     * @param integer $status_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionView($id, $cover_img_id, $rate_id, $status_id, $category_id)
    {
      $cover = CoverImg::find()->where(['id'=>$cover_img_id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id, $cover_img_id, $rate_id, $status_id, $category_id),
              'cover'=>$cover,
        ]);
    }

    /**
     * Creates a new Clip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Clip();
        $modelimg = new CoverImg();
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
             ->thumbnail(new Box(350, 300))
             ->save($path, ['quality' => 70]);
               $modelimg->id;
               $model->cover_img_id = $modelimg->id;


               $model->save();

           } else {
               // error in saving model
           }
            return $this->redirect(['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelimg'=>  $modelimg,
            ]);
        }
    }

    /**
     * Updates an existing Clip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $cover_img_id
     * @param integer $rate_id
     * @param integer $status_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionUpdate($id, $cover_img_id, $rate_id, $status_id, $category_id)
    {
        $model = $this->findModel($id, $cover_img_id, $rate_id, $status_id, $category_id);

        $modelimg = CoverImg::find()->where(['id'=>$cover_img_id])->one();

        Yii::$app->params['uploadPath'] = 'uploads/coverimage/';

        if ($model->load(Yii::$app->request->post())) {


          $image = UploadedFile::getInstance($modelimg,'cover');
          if ($image->size!=0) {
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
             ->thumbnail(new Box(100, 100))
             ->save($path, ['quality' => 70]);
               $modelimg->id;
               $model->cover_img_id = $modelimg->id;
               $model->save();

           } else {
               // error in saving model
           }
         }
        //  else {
        //    Yii::$app->session->setFlash('warning', 'โปรดเลือกไฟล์.');
        //      return $this->refresh();
        //  }
            return $this->redirect(['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelimg' => $modelimg,
            ]);
        }
    }

    /**
     * Deletes an existing Clip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $cover_img_id
     * @param integer $rate_id
     * @param integer $status_id
     * @param integer $category_id
     * @return mixed
     */
    public function actionDelete($id, $cover_img_id, $rate_id, $status_id, $category_id)
    {

        $coverimage = CoverImg::find()->where(['id'=>$cover_img_id])->one();
        $model =   $this->findModel($id, $cover_img_id, $rate_id, $status_id, $category_id)->delete();
        $coverimage->delete();

          Yii::$app->session->setFlash('success', 'ลบข้อมูลสำเร็จ.');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Clip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $cover_img_id
     * @param integer $rate_id
     * @param integer $status_id
     * @param integer $category_id
     * @return Clip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $cover_img_id, $rate_id, $status_id, $category_id)
    {
        if (($model = Clip::findOne(['id' => $id, 'cover_img_id' => $cover_img_id, 'rate_id' => $rate_id, 'status_id' => $status_id, 'category_id' => $category_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
