<?php

namespace app\component;

use app\models\UsersSystem;
use stdClass;
use Yii;
use yii\helpers\ArrayHelper;

class SignupStepsComponent
{
    const SIGNUP = 'steps_signup';
    const STEP1 = 'signup1';
    const STEP2 = 'signup2';
    const STEP3 = 'signup3';
    const arraySteps = [self::STEP1, self::STEP2, self::STEP3];
    const CURRENT_STEP = 'current_step';

    public static function getSteps()
    {
        $steps = Yii::$app->session->get(self::SIGNUP);
        if (is_array($steps)) {
            return $steps;
        } else {
            Yii::$app->session->set(self::SIGNUP, []);
            return [];
        }
    }

    public static function getStep($step)
    {
        return ArrayHelper::getValue(self::getSteps(), $step);
    }

    public static function saveStep($data, $step)
    {
        $cur_steps = self::getSteps();
        $new_data = [
            $step => $data
        ];
        $new_steps = array_merge($cur_steps, $new_data);
        Yii::$app->session->set(self::SIGNUP, $new_steps);
    }

    public static function isStepComplete($step)
    {
        return ArrayHelper::keyExists($step, self::getSteps());
    }


    public function getcurrentStep()
    {
        return Yii::$app->session->get(self::CURRENT_STEP, 0);
    }

    public static function setCurrentStep($step)
    {
        return Yii::$app->session->set(self::CURRENT_STEP, array_search($step, self::arraySteps));
    }

    public function cursorArraySteps()
    {
        $array = self::arraySteps;
        $current = $this->getcurrentStep();

        $array = $this->updateCursor($array, $current);
        $return = new stdClass();
        $return->current = current($array);
        $return->prev = prev($array);
        $array = $this->updateCursor($array, $current);
        $return->next = next($array);


        return $return;
    }

    private function updateCursor($array, $current)
    {
        while ((array_search(current($array), $array)) !== $current) next($array);
        return $array;
    }

    public static function getStepKey($step)
    {
        $array = self::arraySteps;
        return array_search($step, $array);
    }


    /**
     * @param UsersSystem $user_model
     */
    public static function sendVerifiedAccountEmail($user_model)
    {
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

    }
}