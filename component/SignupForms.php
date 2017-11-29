<?php

namespace app\component;


use app\models\LoginForm;
use app\models\ProfileAccount;
use app\models\UsersSystem;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\helpers\BaseFileHelper;
use yii\web\Response;
use yii\web\UploadedFile;

class SignupForms
{

    const PROFILE_TYPE = 'profile_type';

    public static function saveNewUser($step1, $step2, $step3)
    {
        $user = new UsersSystem();
        $user->load($step2);

        $user->password_hash = Yii::$app->getSecurity()->generatePasswordHash($user->password_hash);
        $user->password_repeat = $user->password_hash;

        $user->authKey = Yii::$app->getSecurity()->generateRandomString();
        $user->accessToken = Yii::$app->getSecurity()->generateRandomString();

        if ($user->save(false)) {
            $profile = new ProfileAccount();

            $profile->load($step1);
            $profile->load($step2);
            $profile->load($step3);

            $profile->user_id = $user->id;
            $profile->areas_support = json_encode($profile->areas_support);
//            $profile->profile_picture_upload = UploadedFile::getInstance($profile, 'profile_picture_upload');

            if ($profile->save(false)) {
                SignupStepsComponent::sendVerifiedAccountEmail($user);
                Yii::$app->session->remove(SignupStepsComponent::SIGNUP);
                $autologin = new LoginForm();
                $autologin->username = $user->username;
                return $autologin->createLogin();
            } else {
//                var_dump($profile->errors);
//                exit();
            }
        } else {
//            var_dump($user->errors);
//            exit();
        }

    }

    public function signup_step1($post, $isAjax)
    {
        $model = new ProfileAccount();
        $model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP1;
        if ($model->load($post)) {
            if ($isAjax) {
                return $this->ajaxResponse($model);
            }
            Yii::$app->session->set(self::PROFILE_TYPE, $model->profile_type_id);
            return true;
        } else {
            return (object)[
                'render' => __FUNCTION__,
                'model' => $model
            ];
        }
    }

    public function signup_step2($post, $isAjax)
    {
        $user_model = new UsersSystem();
        $profile_model = new ProfileAccount();

        $user_model->scenario = UsersSystem::SCENARIO_SIGNUP;
        $profile_model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP2;

        if ($user_model->load($post)) {
            if ($isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return $this->ajaxResponse($user_model);
            }
            if ($profile_model->load($post)) {
                if ($isAjax) {
                    Yii::$app->response->format = Response::FORMAT_JSON;
                    return $this->ajaxResponse($profile_model);
                }
                return true;
            }
        } else {
            return (object)[
                'render' => __FUNCTION__,
                'user_model' => $user_model,
                'profile_model' => $profile_model
            ];
        }


//        if ($user_model->load(Yii::$app->request->post()) && $profile_model->load(Yii::$app->request->post())) {
//            if ($isAjax) {
//                if (!$user_model->validate()) {
//                    return $this->ajaxResponse($user_model);
//                }
//                if (!$profile_model->validate()) {
//                    return $this->ajaxResponse($profile_model);
//                }
//            }
//            return true;
//        } else {
//            return (object)[
//                'render' => __FUNCTION__,
//                'user_model' => $user_model,
//                'profile_model' => $profile_model
//            ];
//        }
    }

    public function signup_step3($post, $isAjax)
    {
        $model = new ProfileAccount();

        $profile_type = Yii::$app->session->get(self::PROFILE_TYPE);
        if ($profile_type == 1) {
            $model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_1;
        } elseif ($profile_type == 2) {
            $model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_2;
        } elseif ($profile_type == 3) {
            $model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_3;
        }
        if ($model->load($post)) {
            $model->areas_support = json_encode($model->areas_support);
            if ($isAjax) {
                return $this->ajaxResponse($model);
            }
            Yii::$app->session->set(self::PROFILE_TYPE, $model->profile_type_id);
            return true;
        } else {
            return (object)[
                'render' => __FUNCTION__ . "_" . $profile_type,
                'model' => $model
            ];
        }
    }

    private function ajaxResponse($model)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return ActiveForm::validate($model);
    }


}