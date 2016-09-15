<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\modules\article\models\Article;
use backend\modules\article\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
    public function actionView($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id),
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

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id, 'world_id' => $model->world_id, 'category_id' => $model->category_id, 'status_id' => $model->status_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
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
    public function actionUpdate($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id)
    {
        $model = $this->findModel($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'rate_id' => $model->rate_id, 'cover_img_id' => $model->cover_img_id, 'world_id' => $model->world_id, 'category_id' => $model->category_id, 'status_id' => $model->status_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
    public function actionDelete($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id)
    {
        $this->findModel($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id)->delete();

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
    protected function findModel($id, $rate_id, $cover_img_id, $world_id, $category_id, $status_id)
    {
        if (($model = Article::findOne(['id' => $id, 'rate_id' => $rate_id, 'cover_img_id' => $cover_img_id, 'world_id' => $world_id, 'category_id' => $category_id, 'status_id' => $status_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
