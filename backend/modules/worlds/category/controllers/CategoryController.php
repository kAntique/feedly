<?php

namespace backend\modules\worlds\category\controllers;

use Yii;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\category\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\worlds\coverimg\models\CoverImg;
use yii\web\UploadedFile;
use yii\data\ActiveDataProvider;
use Imagine\Image\Box;
use yii\imagine\Image;
use backend\modules\clip\models\Clip;


/**
 * CategoryController implements the CRUD actions for Category model.
 */
class CategoryController extends Controller
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
     * Lists all Category models.
     * @return mixed
     */
    public function actionIndex()
    {

       $searchModel = new CategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
           'searchModel' => $searchModel,
           'dataProvider' => $dataProvider,



        ]);
    }

    /**
     * Displays a single Category model.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $world_id
     * @param integer $cover_img_id
     * @return mixed
     */
    public function actionView($id, $rate_id, $world_id, $cover_img_id)
    {
      $cover = CoverImg::find()->where(['id'=>$cover_img_id])->one();
        return $this->render('view', [
            'model' => $this->findModel($id, $rate_id, $world_id, $cover_img_id),
            'cover'=>$cover,
        ]);
    }

    /**
     * Creates a new Category model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Category();
        $modelimg = new Coverimg();
        Yii::$app->params['uploadPath'] = 'uploads/coverimage/';
        if ($model->load(Yii::$app->request->post())) {
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
               Image::getImagine()->open($image)
               ->resize(new Box(1280, 720))
               ->save($path , ['quality' => 100]);
               $modelimg->id;
               $model->cover_img_id = $modelimg->id;
               $model->save();




           } else {
               // error in saving model
           }
          // $file = UploadedFile::getInstance($modelimg,'cover');
          //     $modelimg->filename = $file->name;
          //     $file->saveAs('uploads/coverimage'.$file->name );
          //     $modelimg->save();

            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
              'modelimg'=>  $modelimg,
            ]);
        }
    }

    /**
     * Updates an existing Category model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $world_id
     * @param integer $cover_img_id
     * @return mixed
     */
    public function actionUpdate($id, $rate_id, $world_id, $cover_img_id)
    {
        $model = $this->findModel($id, $rate_id, $world_id, $cover_img_id);


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
                 ->resize(new Box(1280, 720))
               ->save($path, ['quality' => 100]);
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
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'modelimg'=>  $modelimg,
            ]);
        }
    }

    /**
     * Deletes an existing Category model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $world_id
     * @param integer $cover_img_id
     * @return mixed
     */
    public function actionDelete($id, $rate_id, $world_id, $cover_img_id)
    {
         $coverimage = CoverImg::find()->where(['id'=>$cover_img_id])->one();
         $model = $this->findModel($id, $rate_id, $world_id,$cover_img_id);
         $clip = Clip::find()->where(['category_id'=>$model])->one();
         if ($clip) {
           Yii::$app->session->setFlash('warning', 'ไม่สามารถลบข้อมูลได้ เป็นส่วนสำคัญของตารางหลัก.');

         }else {
         $model->delete();
           unlink(getcwd().'/uploads/coverimage/'.$model->coverImg['filename']);
          $coverimage->delete();
         Yii::$app->session->setFlash('success', 'ลบข้อมูลสำเร็จ.');
         }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $rate_id
     * @param integer $world_id
     * @param integer $cover_img_id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $rate_id, $world_id, $cover_img_id)
    {
        if (($model = Category::findOne(['id' => $id, 'rate_id' => $rate_id, 'world_id' => $world_id, 'cover_img_id' => $cover_img_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
