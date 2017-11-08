<?php

namespace app\controllers;

use app\models\ProfileAccount;
use app\models\UsersSystem;
use kartik\alert\Alert;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Yii;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\LoginForm;
use yii\widgets\ActiveForm;

class SiteController extends CustomController
{
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
            ])->id);
            if (Yii::$app->user->identity->admin) {
                return $this->redirect(Url::to('@web/dashboard/index'));
            }
            $this->checkaccount();
            return $this->redirect(Url::to('@web/myrofile'));
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

    /**
     * @param $model UsersSystem
     */
    public function sendEmailChangePass($model)
    {
        $url_verified = $model->getUrlChangePassword();
        $subject = "Reset Password";
        $body = "<h1>Click on the following link to complete your request</h1>";
        $body .= "<a href='" . $url_verified . "'>Change Password</a>";

        Yii::$app->mailer->compose()
            ->setTo($model->email)
            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();
    }

    public function actionRequestpassword()
    {

        $model = new UsersSystem();
        if (Yii::$app->user->isGuest) {
            $model->scenario = UsersSystem::SCENARIO_REQUEST_PASS;
            if ($model->load(Yii::$app->request->post())) {
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
                $email = $model->email;
                $model = UsersSystem::findOne(['email' => $email]);
            } else {
                $this->layout = "login";
                return $this->render('request_password', [
                    'user' => $model
                ]);
            }
        } else {
            $model = UsersSystem::findOne(Yii::$app->user->id);
        }
        if ($model) {
            $token = Yii::$app->security->generateRandomString();
            $model->password_reset_token = $token;
            $model->update(false);
            $this->sendEmailChangePass($model);
            $this->layout = 'login';
            return $this->render('alert', [
                'alerts' => [
                    [
                        'type' => Alert::TYPE_SUCCESS,
                        'title' => 'Change Password',
                        'body' => 'You will receive an email with instructions to finish with the change of your password'
                    ]
                ]
            ]);
        } else {
            throw new InvalidParamException();
        }
    }

    public function actionChangepassword($id, $auth)
    {
        $auth = Html::decode($auth);
        $id = Html::decode($id);

        $model = UsersSystem::findOne([
            'password_reset_token' => $id,
            'authKey' => $auth
        ]);

        if ($model) {
            $model->scenario = UsersSystem::SCENARIO_PASSWORD;
            if ($model->load(Yii::$app->request->post())) {
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($model);
                }
                $model->password_hash = Yii::$app->getSecurity()->generatePasswordHash($model->password_hash);
                $model->password_reset_token = NULL;
                if ($model->update(false)) {
                    echo "Successfully updated password, redirecting ...";
                    echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("/") . "'>";
                } else {
                    return $this->render('alert', [
                        'alerts' => [
                            [
                                'type' => Alert::TYPE_DANGER,
                                'title' => 'Change Password',
                                'body' => 'The password could not be modified, try again.'
                            ]
                        ]
                    ]);
                }
            } else {
                $model->password_hash = "";
                $this->layout = 'login';
                return $this->render('changepassword', [
                    'user' => $model
                ]);
            }
        } else {
            throw new InvalidParamException();
        }
    }

    public function actionSignup()
    {
        $profile_model = new ProfileAccount();
        $user_model = new UsersSystem();
        $user_model->scenario = UsersSystem::SCENARIO_SIGNUP;

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
                if ($user_model->save(false)) {
                    $profile_model->user_id = $user_model->id;
                    $profile_model->areas_support = json_encode($profile_model->areas_support);
                    if ($profile_model->save(false)) {
                        $autologin = new LoginForm();
                        $autologin->username = $user_model->username;
                        $url_verified = $user_model->getUrlVerifiedUser();
                        $subject = "Confirm Sign Up";
                        $body = "<h1>Click on the following link to complete your registration</h1>";
                        $body .= "<a href='" . $url_verified . "'>Confirm</a>";

                        Yii::$app->mailer->compose()
                            ->setTo($user_model->email)
                            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
                            ->setSubject($subject)
                            ->setHtmlBody($body)
                            ->send();

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

    public function actionNotVerified()
    {
        if (!boolval(Yii::$app->user->identity->verified_account)) {
            throw new NotFoundHttpException("User not verified");
        }else{
            return $this->goBack();
        }

    }

    public function actionVerifiedAccount($id, $auth)
    {
        $auth = Html::decode($auth);
        $id = Html::decode($id);

        $user = UsersSystem::findOne([
            'username' => $id,
            'authKey' => $auth
        ]);

        if ($user) {
            $user->verified_account = 1;
            if ($user->update(false)) {
                echo "Congratulations registration successfully, redirecting ...";
                echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("/") . "'>";
            } else {
                echo "An error occurred while performing the registration, redirecting ...";

//                var_dump($user->getErrors());
//                var_dump($user->username, $user->email, $user->password_hash);

                echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("/") . "'>";
            }
        } else {
            echo "User not identified, redirecting ...";
            echo "<meta http-equiv='refresh' content='8; " . Url::toRoute("/") . "'>";
        }
    }

    public function actionMyprofile()
    {
        $this->checkaccount();

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
                    return $this->redirect(Url::to('@web/myprofile'));
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
        return Html::a('Click on the following link to complete your registration', $user->getUrlChangePassword());
    }

    private function checkaccount()
    {
        if (!boolval(Yii::$app->user->identity->verified_account)) {
            return $this->redirect(Url::to('/site/not-verified'));
        }
    }
}
