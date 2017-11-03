<?php

namespace app\controllers;

use Yii;
use app\models\UsersSystem;
use app\models\UserSearch;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class UserController extends Controller
{
    public $layout = 'dashboard';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => false,
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => boolval(ArrayHelper::getValue(Yii::$app->user->identity, 'admin')),
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UsersSystem model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModelUser($id),
        ]);
    }

    /**
     * Creates a new UsersSystem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model_user = new UsersSystem();

        if ($model_user->load(Yii::$app->request->post()) && $model_user->save()) {
            return $this->redirect(['view', 'id' => $model_user->id]);
        } else {
            return $this->render('create', [
                'model_user' => $model_user,
            ]);
        }
    }

    /**
     * Updates an existing UsersSystem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model_user = $this->findModelUser($id);

        if ($model_user->load(Yii::$app->request->post()) && $model_user->save()) {
            return $this->redirect(['view', 'id' => $model_user->id]);
        } else {
            return $this->render('update', [
                'model_user' => $model_user,
            ]);
        }
    }

    /**
     * Deletes an existing UsersSystem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModelUser($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UsersSystem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UsersSystem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelUser($id)
    {
        if (($model = UsersSystem::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}