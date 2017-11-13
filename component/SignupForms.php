<?php

namespace app\component;


use app\models\ProfileAccount;
use app\models\UsersSystem;
use Yii;
use yii\base\Model;
use yii\bootstrap\ActiveForm;
use yii\web\Response;

class SignupForms
{

    const PROFILE_TYPE = 'profile_type';

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

        if ($user_model->load(Yii::$app->request->post()) && $profile_model->load(Yii::$app->request->post())) {
            if ($isAjax) {
                if (!$user_model->validate()) {
                    return $this->ajaxResponse($user_model);
                }
                if (!$profile_model->validate()) {
                    return $this->ajaxResponse($profile_model);
                }
            }
            return true;
        } else {
            return (object)[
                'render' => __FUNCTION__,
                'user_model' => $user_model,
                'profile_model' => $profile_model
            ];
        }
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
            $model->scenario = ProfileAccount::SCENARIO_SIGNUP_STEP3_2;
        }
        if ($model->load($post)) {
            if ($isAjax) {
                return $this->ajaxResponse($model);
            }
            Yii::$app->session->set(self::PROFILE_TYPE, $model->profileType->name);
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