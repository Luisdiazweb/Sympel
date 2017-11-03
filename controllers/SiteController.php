<?php

namespace app\controllers;

use app\models\ProfileAccount;
use app\models\UsersSystem;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
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
                'only' => ['login', 'logout', 'signup', 'profile'],
                'rules' => [
                    [
                        'actions' => ['logout', 'profile'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id=='error') $this->layout ='login';
            return true;
        } else {
            return false;
        }
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
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            Yii::$app->session->set('profile_id', ProfileAccount::findOne([
                'user_id' => Yii::$app->user->identity->id
            ])
                ->id
            );
            if (Yii::$app->user->identity->admin) {
                return $this->redirect(Url::to('@web/dashboard/index'));
            }
            return $this->redirect(Url::to('@web/profile'));
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
                $user_model->authKey = Yii::$app->getSecurity()->generateRandomString();
                $user_model->accessToken = Yii::$app->getSecurity()->generateRandomString();
                if ($user_model->save()) {
                    $profile_model->user_id = $user_model->id;
                    $profile_model->areas_support = json_encode($profile_model->areas_support);
                    if ($profile_model->save()) {
                        $autologin = new LoginForm();
                        $autologin->username = $user_model->username;
                        $url_verified = $user_model->getUrlVerifiedUser();
                        $subject = "Confirm Sign Up";
                        $body = "<h1>Click on the following link to complete your registration</h1>";
                        $body .= "<a href='" . $url_verified . "'>Confirm</a>";

                        //Enviamos el correo
//                        Yii::$app->mailer->compose()
//                            ->setTo($user_model->email)
//                            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
//                            ->setSubject($subject)
//                            ->setHtmlBody($body)
//                            ->send();

                        $autologin->createLogin();
                        return $this->goHome();
                    } else {
//                        var_dump($profile_model->errors);
                        return 'Profile: Error, please contact a tecnical support';
                    }
                } else {
//                    var_dump($user_model->errors);
                    return 'User: Error, please contact a tecnical support';
                }
            }
        } else {
            $query = new Query();
            $areas_support = $query->from('areas_support')->all();

            return $this->render('signup', [
                'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
                'profile' => $profile_model,
                'user' => $user_model
            ]);
        }
    }

    public function actionVerifiedAccount($id, $auth)
    {
        $auth = Html::encode($auth);
        $id = Yii::$app->getSecurity()->decryptByPassword($id, $auth);

        if ((int)$id) {
            $user = UsersSystem::findOne([
                'id' => $id,
                'authKey' => $auth
            ]);

            if ($user) {
                $user->verified_account = 1;
                if ($user->update()) {
                    echo "Congratulations registration successfully, redirecting ...";
                    echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("site/login") . "'>";
                } else {
                    echo "An error occurred while performing the registration, redirecting ...";
                    echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("site/login") . "'>";
                }
            } else {
                return $this->redirect(["site/login"]);
            }
        }
    }

    public function actionProfile()
    {
        $this->layout = "profile";

        $user_id = Yii::$app->user->identity->getId();

        $user = UsersSystem::findOne($user_id);
        if (!$user) {
            throw new NotFoundHttpException("The user was not found.");
        }

        $profile = ProfileAccount::findOne(['user_id' => $user_id]);

        if (!$profile) {
            throw new NotFoundHttpException("The user has no profile.");
        }

        if ($user->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user);
            }
            if ($profile->load(Yii::$app->request->post())) {
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($profile);
                }
                $isValid = $user->validate();
                $isValid = $profile->validate() && $isValid;
                if ($isValid) {
                    $user->save(false);
                    $profile->save(false);
                    return $this->redirect(Url::to('@web/profile'));
                }
            }
        }

        $query_areas = new Query();
        $areas_support = $query_areas->from('areas_support')->all();
//        var_dump($profile->profile_type_id);
        return $this->render('profile_' . $profile->profileType->name, [
            'user' => $user,
            'profile' => $profile,
            'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
        ]);
    }

    public function actionTestmail()
    {
        Yii::$app->mailer->compose()
            ->setFrom(Yii::$app->params['adminEmail'])
            ->setTo('valbert1993@gmail.com')
            ->setSubject('Message subject')
            ->setTextBody('Plain text content')
            ->setHtmlBody('<b>HTML content</b>')
            ->send();
    }

    public function actionTest()
    {
        $user = UsersSystem::findOne(Yii::$app->request->get('id'));
        return Html::a('Click on the following link to complete your registration', $user->getUrlVerifiedUser());
    }
}
