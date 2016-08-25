<?php

namespace backend\modules\worlds\coverimg\controllers;

use Yii;
use backend\modules\worlds\coverimg\models\Coverimg;
use backend\modules\worlds\coverimg\models\CoverimgSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CoverimgController implements the CRUD actions for Coverimg model.
 */
class CoverimgController extends Controller
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
     * Lists all Coverimg models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CoverimgSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    /**
     * Displays a single Coverimg model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Coverimg model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Coverimg();

        if ($model->load(Yii::$app->request->post())) {

          $file = UploadedFile::getInstance($model,'cover');

          // if ($file->size!= 0 ) {
          //   Yii::$app->session->setFlash('warning', 'Check your  file size .');
          //   return $this->refresh();
          // }
            if ($file->size > 409600) {
                Yii::$app->session->setFlash('warning', 'ไฟล์ขนาดใหญ่เกินไป โปรดเลือกไฟล์ใหม่.');
                  return $this->refresh();
            }else {
              $model->filename = $file->name;
              $file->saveAs('uploads/coverimage'.$file->name );
              $model->save();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Coverimg model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Coverimg model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Coverimg model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Coverimg the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Coverimg::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
