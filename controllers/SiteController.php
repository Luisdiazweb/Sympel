<?php

namespace app\controllers;

use app\component\SignupForms;
use app\component\SignupStepsComponent;
use app\models\Donations;
use app\models\DonationsCategory;
use app\models\DonationsSearch;
use app\models\ProfileAccount;
use app\models\UsersSystem;
use kartik\alert\Alert;
use Symfony\Component\Finder\Exception\AccessDeniedException;
use Yii;
use yii\base\InvalidParamException;
use yii\db\Query;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use app\models\LoginForm;
use yii\web\UploadedFile;
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
        $searchModel = new DonationsSearch();
        $donate = $searchModel->search(Yii::$app->request->queryParams, FALSE, DonationsSearch::FROMPROFILEPUBLIC_DONATION);
        $needs = $searchModel->search(Yii::$app->request->queryParams, FALSE, DonationsSearch::FROMPROFILEPUBLIC_NEEDED);

        return $this->render('index', [
            'modelSearchDonation' => $searchModel,
            'donate' => $donate,
            'needs' => $needs
        ]);
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
                return $this->redirect(Url::to('@web/dashboard/'));
            }
            $this->checkaccount();
            return $this->redirect(Url::to('@web/myprofile'));
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

    /**
     * @param $model UsersSystem
     */
    public function sendEmailReminderUsername($model)
    {
        $subject = "Reminder Username";
        $body = "<h1>Your username to access is: $model->username</h1>";
        $body .= "<p>Don't forget it</p>";

        Yii::$app->mailer->compose()
            ->setTo($model->email)
            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();
    }

    public function actionRequestusername()
    {
        $model = new UsersSystem();

        $model->scenario = UsersSystem::SCENARIO_REQUEST_PASS;
        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
//                var_dump($model->errors);
//                exit();
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $email = $model->email;
            $model = UsersSystem::findOne(['email' => $email]);
//            var_dump($email);
//            exit();
            if ($model) {
                $this->sendEmailReminderUsername($model);
                $this->layout = 'login';
                return $this->render('alert', [
                    'alerts' => [
                        [
                            'type' => Alert::TYPE_SUCCESS,
                            'title' => 'Remember Username',
                            'body' => 'You will receive an email with your username access to ' . $email
                        ]
                    ]
                ]);
            } else {
                $this->redirect("requestusername");
            }
        } else {
            $this->layout = "login";
            return $this->render('request_password', [
                'user' => $model,
                'submit_text' => 'Recover Username'
            ]);
        }
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
                    'user' => $model,
                    'submit_text' => 'Recover Password'
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
            $this->redirect("requestpassword");
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
                    $this->layout = 'login';
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
        return $this->redirect('/signup1');

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

    public function actionHowitworks()
    {
        return $this->render('how_it_works');

    }

    public function actionFaq()
    {
        return $this->render('faq');

    }

     public function actionLegalstuff()
    {
        return $this->render('legal_stuff');

    }


    public function actionNotverified($id = false)
    {
        if (!boolval(Yii::$app->user->identity->verified_account)) {
            if ($id === 'resend') {
                SignupStepsComponent::sendVerifiedAccountEmail(UsersSystem::findOne(Yii::$app->user->identity->getId()));
            }
            $this->layout = "login";
            return $this->render('alert', [
                'alerts' => [
                    [
                        'type' => Alert::TYPE_DANGER,
                        'title' => 'Verify Account',
                        'body' => 'User not verified'
                    ],
                    [
                        'type' => Alert::TYPE_WARNING,
                        'title' => null,
                        'body' => (($id === 'resend') ? ('Forwarded - ') : ('')) . Html::a('Resend Verification link', '/notverified/resend')
                    ]
                ]
            ]);
        } else {
            return $this->goHome();
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
        $user->scenario = UsersSystem::SCENARIO_ADMIN;
        if (!$user) {
            throw new NotFoundHttpException("The user was not found.");
        }

        $profile = ProfileAccount::findOne(['user_id' => $user_id]);

        if (!$profile) {
            throw new NotFoundHttpException("The user has no profile.");
        }

//         $profile_type = $profile->profile_type_id;
//         if ($profile_type == 1) {
//             $profile->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_1;
//         } elseif ($profile_type == 2) {
//             $profile->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_2;
//         } elseif ($profile_type == 3) {
//             $profile->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_3;
//         }
        if ($user->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($user);
            }
            if ($profile->load(Yii::$app->request->post())) {
                $profile->areas_support = json_encode($profile->areas_support);
                if (Yii::$app->request->isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return ActiveForm::validate($profile);
                }
//                $profile->profile_picture_upload = UploadedFile::getInstance($profile, 'profile_picture_upload');
                $isValid = $user->validate();
                $isValid = $profile->validate() && $isValid;
                if ($isValid) {

                    $user->save(false);
                    $profile->save(false);
//                    return $this->redirect(Url::to('@web/myprofile'));
                } else {
//                    var_dump($user->errors);
//                    var_dump($profile->errors);
//                    exit();
                }
            }
        }


        $query_areas = new Query();
        $areas_support = $query_areas->from('areas_support')->all();

//        var_dump(json_decode($profile->areas_support));


        $searchModel = new DonationsSearch();
        $searchModel->id_user = $user->id;
        $dataDonations = $searchModel->search(Yii::$app->request->queryParams, FALSE, DonationsSearch::FROMMYPROFILE);
        Yii::$app->view->params['dataDonations'] = $dataDonations;
        Yii::$app->view->params['modelDonations'] = $searchModel;
        return $this->render('profile_' . $profile->profileType->name, [
            'user' => $user,
            'profile' => $profile,
            'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
            'dataDonations' => $dataDonations,
            'modelDonations' => $searchModel,
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

    private function checkaccount()
    {
        if (!boolval(Yii::$app->user->identity->verified_account)) {
            return $this->redirect(Url::to('/notverified'));
        }
    }

    public function actionSignup1()
    {
//        Yii::$app->session->destroy();
        $component = new SignupForms();
        $post = Yii::$app->request->post();
        $steps = new SignupStepsComponent();
        $steps::setCurrentStep(SignupStepsComponent::STEP1);
//        $cursors = $steps->cursorArraySteps();
//        var_dump($steps::getSteps());
//        exit();
        $return = $component->signup_step1($post, Yii::$app->request->isAjax);
        if ((is_array($return)) && Yii::$app->request->isAjax) {
            return $return;
        } elseif (($return === true) && Yii::$app->request->isPost) {
            $steps::saveStep($post, SignupStepsComponent::STEP1);
            return $this->redirect(SignupStepsComponent::STEP2);
        } else {

            if ($this->checkifcuriscomplete(SignupStepsComponent::STEP1)) {
                $return->model->load($steps::getStep(SignupStepsComponent::STEP1));
            }

            return $this->render($return->render, [
                'url_next' => SignupStepsComponent::STEP2,
                'profile' => $return->model,
            ]);
        }
    }

    public function actionSignup2()
    {
        $steps = new SignupStepsComponent();
//        $cursors = $steps->cursorArraySteps();
        $steps::setCurrentStep(SignupStepsComponent::STEP2);
//        var_dump($cursors);
//        var_dump($this->checkifpreviscomplete($cursors->prev));
//        exit();


        $component = new SignupForms();
        $post = Yii::$app->request->post();
        $return = $component->signup_step2($post, Yii::$app->request->isAjax);

        if ((is_array($return)) && Yii::$app->request->isAjax) {
            return $return;
        } elseif (($return === true) && Yii::$app->request->isPost) {
            $steps::saveStep($post, SignupStepsComponent::STEP2);
            return $this->redirect(SignupStepsComponent::STEP3);
        } else {

            if (!$this->checkifpreviscomplete(SignupStepsComponent::STEP1)) {
                return $this->redirect(SignupStepsComponent::STEP1);
            }
            if ($this->checkifcuriscomplete(SignupStepsComponent::STEP2)) {
                $return->user_model->load($steps::getStep(SignupStepsComponent::STEP2));
                $return->profile_model->load($steps::getStep(SignupStepsComponent::STEP2));
            }

            return $this->render($return->render, [
                'user' => $return->user_model,
                'profile' => $return->profile_model,
                'url_prev' => SignupStepsComponent::STEP1,
                'url_next' => SignupStepsComponent::STEP3
            ]);
        }
    }

    public function actionSignup3()
    {
        $steps = new SignupStepsComponent();
        $steps::setCurrentStep(SignupStepsComponent::STEP3);
//        $cursors = $steps->cursorArraySteps();

        $component = new SignupForms();
        $post = Yii::$app->request->post();
        $return = $component->signup_step3($post, Yii::$app->request->isAjax);
        if ((is_array($return)) && Yii::$app->request->isAjax) {
            return $return;
        } elseif (($return === true) && Yii::$app->request->isPost) {
            $steps::saveStep($post, SignupStepsComponent::STEP3);
            $this->finishSignup();
        } else {
            if (!$this->checkifpreviscomplete(SignupStepsComponent::STEP2)) {
                return $this->redirect(SignupStepsComponent::STEP1);
            }

            if (!$this->checkifcuriscomplete(SignupStepsComponent::STEP3)) {
                $return->model->load($steps::getStep(SignupStepsComponent::STEP3));
            }

            $query = new Query();
            $areas_support = $query->from('areas_support')->all();
            return $this->render($return->render, [
                'areas_suport' => ArrayHelper::map($areas_support, 'id', 'name'),
                'profile' => $return->model,
                'url_prev' => SignupStepsComponent::STEP2
            ]);
        }
    }

    public function actionSignupconfirm(){
         $profile = ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);
        return $this->render('signup_confirmation', [
            'profile' => $profile,
        ]);
    }

    public function actionPublicprofile($id)
    {

        $user = UsersSystem::findOne(['username' => $id]);
        if (!$user) {
            throw new NotFoundHttpException("The user was not found.");
        }

        $profile = ProfileAccount::findOne(['user_id' => $user->id]);

        if (!$profile) {
            throw new NotFoundHttpException("The user has no profile.");
        }


        $searchModel = new DonationsSearch();
        $searchModel->id_user = $user->id;
        $dataDonation = $searchModel->search(Yii::$app->request->queryParams, FALSE, DonationsSearch::FROMPROFILEPUBLIC_DONATION);
        $dataNeeded = $searchModel->search(Yii::$app->request->queryParams, FALSE, DonationsSearch::FROMPROFILEPUBLIC_NEEDED);

        $this->layout = 'profile_public';
        $summaryNeeds = Donations::find()->where(['id_type' => 1])->andWhere(['id_user' => $user->id])->andWhere(['checked' => 1])->count();
        $summaryDonations = Donations::find()->where(['id_type' => 2])->andWhere(['id_user' => $user->id])->andWhere(['checked' => 1])->count();
        $areas_id = empty($profile->areas_support) ? FALSE : json_decode($profile->areas_support);
        $query_areas = new Query();
        $areas_db = ArrayHelper::map($query_areas->from('areas_support')->all(), 'id', 'name');
        $areas = [];
        if ($areas_id) {
            foreach ($areas_id as $area) {
                $areas[] = $areas_db[$area];
            }
        }
        return $this->render('profile_public', [
            'profile' => $profile,
            'modelSearchDonation' => $searchModel,
            'dataDonation' => $dataDonation,
            'dataNeeded' => $dataNeeded,
            'summaryNeeds' => $summaryNeeds,
            'summaryDonations' => $summaryDonations,
            'areas' => $areas,
        ]);
    }

    public function actionUpdatedonation($id){
        $this->restrict_nonprofit();

        $model = Donations::findOne(['id' => $id]);

        $cat_conations = ArrayHelper::map(DonationsCategory::find()->asArray()->all(), 'id', 'name');

        if($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect('/myprofile');
        }

        return $this->render('create_donation',[
            'model' => $model,
            'cat_donations' => $cat_conations
        ]);
    }

    public function actionCreatedonation($id = false)
    {
        $this->restrict_nonprofit();
        if ($id) {
            $model = Donations::findOne(['id_public' => $id]);
            if (!$model) {
                throw new NotFoundHttpException("Donation was not found.");
            }
        } else {
            $model = new Donations();
        }


        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->id_type = 2;
            $model->id_user = Yii::$app->user->getId();

            $model->save();

            return $this->redirect(['reviewdonation', 'id' => $model->id_public]);
     

        } else {
            $cat_donations = ArrayHelper::map(DonationsCategory::find()->asArray()->all(), 'id', 'name');
            return $this->render('create_donation', [
                'model' => $model,
                'cat_donations' => $cat_donations
            ]);
        }

    }

    public function actionReviewdonation($id)
    {
        $model = Donations::findOne(['id_public' => $id]);
        if (!$model) {
            throw new NotFoundHttpException("Donation was not found.");
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        } else {
             $profile_information = ProfileAccount::findOne(['user_id' => $model->id_user]);
            return $this->render('review_create_donation', [
                'model' => $model,
                'owner' => $model->id_user === Yii::$app->user->getId(),
                'profile' => $profile_information,
            ]);
        }

    }

    

    public function actionRequestdonation($id = false)
    {
        $this->restrict_only_nonprofit();
        $this->restrict_nonprofit();
        if ($id) {
            $model = Donations::findOne(['id_public' => $id]);
            if (!$model) {
                throw new NotFoundHttpException("Request was not found.");
            }
        } else {
            $model = new Donations();
        }


        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ActiveForm::validate($model);
            }
            $model->id_type = 1;
            $model->id_user = Yii::$app->user->getId();

            $model->save();
            return $this->redirect(['reviewrequest', 'id' => $model->id_public]);
        } else {
            $cat_donations = ArrayHelper::map(DonationsCategory::find()->asArray()->all(), 'id', 'name');
            return $this->render('request_donation', [
                'model' => $model,
                'cat_donations' => $cat_donations
            ]);
        }

    }

    public function actionReviewrequest($id)
    {
        $model = Donations::findOne(['id_public' => $id]);
        if (!$model) {
            throw new NotFoundHttpException("Request was not found.");
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        } else {
            $profile_information = ProfileAccount::findOne(['user_id' => $model->id_user]);
            return $this->render('review_request_donation', [
                'model' => $model,
                'owner' => $model->id_user === Yii::$app->user->getId(),
                'profile' => $profile_information,
            ]);
        }

    }

    public function actionItemdetails($id)
    {
        $model = Donations::findOne(['id_public' => $id]);
        if (!$model) {
            throw new NotFoundHttpException("Request was not found.");
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->goHome();
        } else {

            $profile_information = ProfileAccount::findOne(['user_id' => $model->id_user]);
            return $this->render('view_donation', [
                'model' => $model,
                'owner' => $model->id_user === Yii::$app->user->getId(),
                'profile' => $profile_information,
            ]);
        }

    }


    public function actionSearch()
    {

        $this->layout = 'profile_public';
        $searchModel = new DonationsSearch();
        if(isset($_REQUEST['tag'])){
            $searchModel->title = $_REQUEST['tag'];
        }
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, FALSE);

        return $this->render('search', [
            'model' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDeletedonation($id)
    {
        $model = Donations::findOne(['id_public' => $id]);
        if (!$model) {
            throw new NotFoundHttpException("Donation was not found.");
        }

        $model->delete();
        return $this->redirect('/');
    }

    private function checkifpreviscomplete($prev)
    {
//        $key = SignupStepsComponent::getStepKey($prev);
        return SignupStepsComponent::isStepComplete($prev);
    }

    private function checkifcuriscomplete($current)
    {
//        $key = SignupStepsComponent::getStepKey($prev);
        return SignupStepsComponent::isStepComplete($current);
    }

    private function finishSignup()
    {
        $step1 = SignupStepsComponent::getStep(SignupStepsComponent::STEP1);
        $step2 = SignupStepsComponent::getStep(SignupStepsComponent::STEP2);
        $step3 = SignupStepsComponent::getStep(SignupStepsComponent::STEP3);

//        var_dump($step1);
//        exit();
        SignupForms::saveNewUser($step1, $step2, $step3);

        return $this->redirect('/signupconfirm');
    }

    private function restrict_only_nonprofit()
    {
        $profile = ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);
        if ($profile) {
            if ($profile->profile_type_id != 1) {
                throw new NotFoundHttpException('You are not allowed to perform this action.');

//                $this->layout = 'login';
//                return $this->render('alert', [
//                    'alerts' => [
//                        [
//                            'type' => Alert::TYPE_DANGER,
//                            'title' => 'Forbidden',
//                            'body' => ''
//                        ]
//                    ]
//                ]);
            }
        }
    }

    private function restrict_nonprofit()
    {
        $profile = ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);
        if ($profile) {
            if ((($profile->profile_type_id == 1) && !boolval($profile->ein_verified))) {
                throw new NotFoundHttpException('Ein # Not Verified.');
//                $this->layout = 'login';
//                return $this->render('alert', [
//                    'alerts' => [
//                        [
//                            'type' => Alert::TYPE_DANGER,
//                            'title' => 'Forbidden',
//                            'body' => 'Ein # Not Verified.'
//                        ]
//                    ]
//                ]);
            }
        }
    }
}
