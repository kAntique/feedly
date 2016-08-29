<?php

namespace backend\modules\clip\controllers;

use Yii;
use backend\modules\clip\models\Clip;
use backend\modules\clip\models\ClipSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return $this->render('view', [
            'model' => $this->findModel($id, $cover_img_id, $rate_id, $status_id, $category_id),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'cover_img_id' => $model->cover_img_id, 'rate_id' => $model->rate_id, 'status_id' => $model->status_id, 'category_id' => $model->category_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        $this->findModel($id, $cover_img_id, $rate_id, $status_id, $category_id)->delete();

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
