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
        $subject = "Verify Your Email";

        $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><!--[if IE]><html xmlns="http://www.w3.org/1999/xhtml" class="ie"><![endif]--><!--[if !IE]><!--><html style="margin: 0;padding: 0;" xmlns="http://www.w3.org/1999/xhtml"><!--<![endif]--><head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <!--[if !mso]><!--><meta http-equiv="X-UA-Compatible" content="IE=edge" /><!--<![endif]-->
    <meta name="viewport" content="width=device-width" />

    
  <!--[if !mso]><!--><style type="text/css">
@import url(https://fonts.googleapis.com/css?family=Montserrat:400);
</style><link href="https://fonts.googleapis.com/css?family=Montserrat:400" rel="stylesheet" type="text/css" /><!--<![endif]-->
</head>
<!--[if mso]>
  <body class="mso">
<![endif]-->
<!--[if !mso]><!-->
  <body class="no-padding" style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;">
<!--<![endif]-->
    <table class="wrapper" style="border-collapse: collapse;table-layout: fixed;min-width: 320px;width: 100%;background-color: #fff;" cellpadding="0" cellspacing="0" role="presentation"><tbody><tr><td>
      <div role="banner">
        
        <div class="header" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);" id="emb-email-header-container">
        <!--[if (mso)|(IE)]><table align="center" class="header" cellpadding="0" cellspacing="0" role="presentation"><tr><td style="width: 600px"><![endif]-->
          <div class="logo emb-logo-margin-box" style="line-height: 32px;Margin-top: 6px;Margin-bottom: 20px;" align="center">
            <div class="logo-center" align="center" id="emb-email-header"><img style="display: block;height: auto;width: 100%;border: 0;max-width: 560px;" src="images/sympel-banner1.jpg" alt="" width="560" /></div>
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>
      <div role="section">

  
      <div class="layout one-col fixed-width" style="Margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;">
        <div class="layout__inner" style="border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;">
        <!--[if (mso)|(IE)]><table align="center" cellpadding="0" cellspacing="0" role="presentation"><tr class="layout-fixed-width" style="background-color: #ffffff;"><td style="width: 600px" class="w560"><![endif]-->
          <div class="column" style="text-align: left;color: #8e959c;font-size: 14px;line-height: 21px;font-family: sans-serif;max-width: 600px;min-width: 320px; width: 320px;width: calc(28000% - 167400px);">
        
    <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;line-height: 10px;font-size: 1px;">&nbsp;</div>
    </div>
        
    <div style="Margin-left: 20px;Margin-right: 20px;">
      <div style="mso-line-height-rule: exactly;mso-text-raise: 4px;">
        <p style="Margin-top: 0;Margin-bottom: 0;font-family: montserrat,dejavu sans,verdana,sans-serif; font-size: 18px;letter-spacing: 2px;line-height: 24px;"><span class="font-montserrat"><span style="color:#000000">Thank you for registering with sympel.com. <br /> In order to authenticate your registration please verify your email by clicking the link below.</span></span></p>
        <p class="font-montserrat" style="margin-top: 50px;margin-bottom: 50;font-family: montserrat,dejavu sans,verdana,sans-serif; font-size: 24px;color: #eb5454;letter-spacing: 2px;line-height: 24px;"><a href="'. $url_verified .'">Confirm Email</a></p>
      </div>
    </div>
        
          </div>
        <!--[if (mso)|(IE)]></td></tr></table><![endif]-->
        </div>
      </div>

    </div></td></tr></tbody></table>
  
</body></html>
';


        Yii::$app->mailer->compose()
            ->setTo($user_model->email)
            ->setFrom([Yii::$app->params["adminEmail"] => Yii::$app->params["title"]])
            ->setSubject($subject)
            ->setHtmlBody($body)
            ->send();

    }
}