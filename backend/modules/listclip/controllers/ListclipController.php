<?php

namespace backend\modules\listclip\controllers;

use Yii;
use backend\modules\listclip\models\Listclip;
use backend\modules\listclip\models\ListclipSearch;
use backend\modules\playlist\models\Playlist;
use backend\modules\clip\models\Clip;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ListclipController implements the CRUD actions for Listclip model.
 */
class ListclipController extends Controller
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
     * Lists all Listclip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ListclipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Listclip model.
     * @param integer $playlist_id
     * @param integer $clip_id
     * @return mixed
     */
    public function actionView($playlist_id, $clip_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($playlist_id, $clip_id),
        ]);
    }

    /**
     * Creates a new Listclip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Listclip();
         $playlist = Playlist::find()->where(['id'=>1])->one();
        $clip = Clip::find()->where(['category_id'=> 3])->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_id' => $model->playlist_id, 'clip_id' => $model->clip_id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'playlist' => $playlist,
                'clip' => $clip,
            ]);
        }
    }

    /**
     * Updates an existing Listclip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $playlist_id
     * @param integer $clip_id
     * @return mixed
     */
    public function actionUpdate($playlist_id, $clip_id)
    {
        $model = $this->findModel($playlist_id, $clip_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'playlist_id' => $model->playlist_id, 'clip_id' => $model->clip_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Listclip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $playlist_id
     * @param integer $clip_id
     * @return mixed
     */
    public function actionDelete($playlist_id, $clip_id)
    {
        $this->findModel($playlist_id, $clip_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Listclip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $playlist_id
     * @param integer $clip_id
     * @return Listclip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($playlist_id, $clip_id)
    {
        if (($model = Listclip::findOne(['playlist_id' => $playlist_id, 'clip_id' => $clip_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
