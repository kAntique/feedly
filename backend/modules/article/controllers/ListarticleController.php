<?php

namespace backend\modules\article\controllers;

use Yii;
use backend\modules\article\models\Listarticle;
use backend\modules\article\models\ListarticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ListarticleController implements the CRUD actions for Listarticle model.
 */
class ListarticleController extends Controller
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
     * Lists all Listarticle models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListarticleSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Listarticle model.
     * @param integer $playlist_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionView($playlist_id, $article_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($playlist_id, $article_id),
        ]);
    }

    /**
     * Creates a new Listarticle model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Listarticle();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_id' => $model->playlist_id, 'article_id' => $model->article_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Listarticle model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $playlist_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionUpdate($playlist_id, $article_id)
    {
        $model = $this->findModel($playlist_id, $article_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_id' => $model->playlist_id, 'article_id' => $model->article_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Listarticle model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $playlist_id
     * @param integer $article_id
     * @return mixed
     */
    public function actionDelete($playlist_id, $article_id)
    {
        $this->findModel($playlist_id, $article_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Listarticle model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $playlist_id
     * @param integer $article_id
     * @return Listarticle the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($playlist_id, $article_id)
    {
        if (($model = Listarticle::findOne(['playlist_id' => $playlist_id, 'article_id' => $article_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    

}
