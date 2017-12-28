<?php
/* @var $this View */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\web\View;
use yii\bootstrap\ActiveForm;

$this->title = "Create Account - Sympel";

$this->registerCssFile('@web/app-assets/css/core/menu/menu-types/vertical-menu.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/plugins/forms/wizard.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/plugins/pickers/daterange/daterange.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/plugins/forms/checkboxes-radios.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);

//$this->registerJsFile('@web/app-assets/vendors/js/extensions/jquery.steps.min.js',
//    [
//        'depends' => [AppAsset::className()],
//        'position' => \yii\web\View::POS_END
//    ]);
$this->registerJsFile('@web/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/pickers/daterange/daterangepicker.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
//$this->registerJsFile('@web/app-assets/vendors/js/forms/validation/jquery.validate.min.js',
//    [
//        'depends' => [AppAsset::className()],
//        'position' => \yii\web\View::POS_END
//    ]);
//$this->registerJsFile('@web/app-assets/js/scripts/forms/wizard-steps.js',
//    [
//        'depends' => [AppAsset::className()],
//        'position' => \yii\web\View::POS_END
//    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/checkbox-radio.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
?>

<!--<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="header-content">
                    <h1 class="content-header-title text-sm-center sympel-title" style="font-size: 70px; color:black;">
                        Create Account</h1>
                </div>
            </div>
        </div>
    </div>
</header> -->
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content container-fluid">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="mt-3">
                            <!--                 <div class="card-header">
                <h4 class="card-title">Validation Example</h4>
            </div> -->
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <?php $form = ActiveForm::begin([
                                            'enableAjaxValidation' => true,
                                            'options' => [
                                                'class' => 'steps-validation wizard-circle'
                                            ]
                                        ]
                                    ); ?>
                                    <fieldset>
                                        <i class="fa fa-user-plus heading-icon"></i>
                                        <h3 class="section-title my-3 text-xs-center">Let's Start creating your account</h3>
                                        <p class="text-sm-center my-3">First, we need to know what type of profile
                                            you are interested in setting up.</p>
                                        <div class="row">
                                            <div class="col-md-8 offset-md-2 mb-1  card">
                                                <div class="card-body">
                                                    <?php /*$form->field($profile, 'profile_type_id')->radioList([
                                                        'non', 'company', 'individual'
                                                    ])*/ ?>
                                                    <div class="card-block">
                                                        <input class="big-radio" type="radio" id="test1"
                                                               name="ProfileAccount[profile_type_id]" <?= $profile->profile_type_id == 1 ? 'checked' : '' ?>
                                                               value="1">
                                                        <label for="test1" class="radio-primary label-big">Non
                                                            Profit</label>
                                                        <p class="radio-description">Non-profit profiles can create
                                                            donation requests and post items for donation </p>
                                                        <p class="radio-description">*Tax ID will be required for verification</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 offset-md-2 mb-1  card">
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <input class="big-radio" type="radio" id="test2"
                                                               value="2" <?= $profile->profile_type_id == 2 ? 'checked' : '' ?>
                                                               name="ProfileAccount[profile_type_id]">
                                                        <label for="test2"
                                                               class="radio-secondary label-big">Company</label>
                                                        <p class="radio-description">Company profiles can post items
                                                            for donation</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8 offset-md-2 mb-1  card">
                                                <div class="card-body">
                                                    <div class="card-block">
                                                        <input class="big-radio" type="radio" id="test3"
                                                               value="3" <?= $profile->profile_type_id == 3 ? 'checked' : '' ?>
                                                               name="ProfileAccount[profile_type_id]">
                                                        <label for="test3"
                                                               class="radio-tertiary label-big">Individual</label>
                                                        <p class="radio-description">Individual profiles can post
                                                            items for donation</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-xs-center my-3">
                                        <?= Html::submitButton('Next Step', ['class' => 'btn btn-primary btn-lg']) ?>
                                        <div>
                                    </fieldset>
                                    <?php ActiveForm::end() ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
</div>
