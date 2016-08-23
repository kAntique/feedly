<?php

namespace backend\modules\worlds\category\controllers;

use Yii;
use backend\modules\worlds\category\models\Category;
use backend\modules\worlds\category\models\CategorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
        return $this->render('view', [
            'model' => $this->findModel($id, $rate_id, $world_id, $cover_img_id),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'world_id' => $model->world_id, 'cover_img_id' => $model->cover_img_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
        $this->findModel($id, $rate_id, $world_id, $cover_img_id)->delete();

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