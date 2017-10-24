<?php

namespace app\controllers;

use app\models\ProfileAccount;
use app\models\UsersSystem;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\widgets\ActiveForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
//        var_dump(Yii::$app->getSecurity()->generatePasswordHash('1234'));
//        Yii::$app->session->destroy();
//        exit();
        $this->layout = "login";
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/site/profile');
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $profile_model = new ProfileAccount();
        $user_model = new UsersSystem();

        if ($user_model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user_model);
            }
            if ($profile_model->load(Yii::$app->request->post())) {
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($profile_model);
                }
                $user_model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user_model->password_hash);
                if ($user_model->save()) {
                    $profile_model->user_id = $user_model->id;
                    if ($profile_model->save()) {
                        $autologin = new LoginForm();
                        $autologin->username = $user_model->username;
                        $autologin->createLogin();
                        return $this->goHome();
                    } else {
                        return 'Profile: Error, please contact a tecnical support';
                    }
                } else {
                    return 'User: Error, please contact a tecnical support';
                }
            }
        } else {
            $query = new Query();
            $areas_suport = $query->from('areas_support')->all();

            return $this->render('signup', [
                'areas_suport' => ArrayHelper::map($areas_suport, 'id', 'name'),
                'profile' => $profile_model,
                'user' => $user_model
            ]);
        }
    }
}
