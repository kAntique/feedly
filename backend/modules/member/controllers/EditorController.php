<?php

namespace backend\modules\member\controllers;

use Yii;
use backend\modules\member\models\Editor;
use backend\modules\member\models\EditorSearch;
use backend\modules\member\models\PasswordResetRequestForm;
//use backend\modules\member\models\ResetRequestForm;
use backend\modules\member\models\ResetPasswordForm;
use yii\web\UploadedFile;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileupload\FileUploadUI;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\User;

/**
 * EditorController implements the CRUD actions for Editor model.
 */
class EditorController extends Controller
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
     * Lists all Editor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EditorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    public function actionSelect(){
          $this->layout = 'main2';
          return $this->render('select');
    }


    public function actionSignup()
    {
        $this->layout = 'main2';
        $model = new Editor();
        $user = new User();
        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
            $user->auth_key = Yii::$app->security->generateRandomString();
            $user->type_member = Yii::$app->request->get('type_member');
            if ($user->save()) {
                $file = \yii\web\UploadedFile::getInstance($model, 'avatar_img');
                $model->avatar = $file->name;
                $file->saveAs('uploads/avatar/'.md5($file->name). '.' . $file->extension);
                $model->avatar = md5($file->name).'.' . $file->extension;

                $model->user_id = $user->id;
                if($user->type_member == '1'){
                   $model->website = "-";
                   $model->save();
                }else {
                   $model->save();
                }



            }

                return $this->render('welcome',[
                    'model' => $model,
                ]);
        }else {
          return $this->render('signup', [
              'model' => $model,
              'user' => $user,
          ]);
        }
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           // check type user
           //var_dump(Yii::$app->user->email);

            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'main2';
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                //Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
                // return $this->render('login');
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }
        //Yii::$app->session->setFlash('success', 'ทางเราได้อีเมลล์ไปแล้ว กรุณาเข้าอีเมลล์เพื่อยืนยันรหัสผ่านของคุณ');
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        $this->layout = 'main2';
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        $model = new LoginForm(); //เพิ่มเข้ามา
        Yii::$app->user->logout();
        Yii::$app->session->setFlash('success', 'คุณได้ออกจากระบบเรียนร้อยแล้วครับ...');
        //return $this->goHome();
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Displays a single Editor model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
     public function actionView() //$id, $user_id
     {

         $model = $this->findModel(Yii::$app->user->identity->id);
         return $this->render('view', [
             'model' => $model,
             //'query' => $query,
         ]);
     }

    /**
     * Creates a new Editor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Editor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Editor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;
        $oldPass = $user->password_hash;
        $oldImage = $model->avatar;
        //echo $oldImage;
        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
           if ($oldPass != $user->password_hash) {
              $user->password_hash = Yii::$app->security->generatePasswordHash($user->password_hash);
           }
           if ($user->save()) {
                $file = \yii\web\UploadedFile::getInstance($model, 'avatar_img');
                if (isset($file->size) && $file->size !== 0) {
                    // if ($oldImage != $model->avatar) {
                    //     unlink($oldImage);
                    // }
                    $model->avatar = $file->name;
                    $file->saveAs('uploads/avatar/'.md5($file->name).'.'.$file->extension);
                    $model->avatar = md5($file->name).'.' . $file->extension;
                    //$model->save();
                }
                $model->save();
          }
          return $this->redirect(['view', 'id' => $model->id]); //, 'user_id' => $user->user_id
        } else {
            return $this->render('update', [
                'model' => $model,
                'user' => $user,
            ]);
        }
    }


    /**
     * Deletes an existing Editor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $user = $model->user;
        //$user = $user->$user_id;
        //$this->findModel($id, $user)->delete();
        //$model->user_id = $user->id;
        $model->delete();
        $user->delete();
        Yii::$app->session->setFlash('success', 'คุณได้ลบข้อมูลส่วนตัวของคุณเรียบร้อยแล้วครับ');
        return $this->redirect(['index']);
    }


    /**
     * Finds the Editor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Editor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Editor::findOne(['id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
