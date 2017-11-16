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

<header class="masthead">
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
</header>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content container-fluid">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row" style="background: #252626;">
                    <div class="col-md-10 offset-md-1">
                        <div class="card mt-2">
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
                                    <!-- Step 2 -->
                                    <fieldset>
                                        <p class="text-sm-center my-3">To get started, first we need your basic
                                            profile details.</p>
                                        <div class="row">
<!--                                            <div class="col-md-12">-->
<!--                                                <p>You can sign in with:</p>-->
<!--                                                <a href="#" class="btn btn-social btn-facebook">-->
<!--                                                    <span class="fa fa-facebook"></span> Sign in with Facebook</a>-->
<!--                                                <p class="my-2">Or you can create an account:</p>-->
<!--                                            </div>-->
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'firstname', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'lastname', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'email', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'username', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'password_hash', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ])->passwordInput(); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($user, 'password_repeat', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ])->passwordInput()->label('Re-type Password'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?= Html::a('Previous',$url_prev,  ['class' => 'btn btn-primary']) ?>
                                        <?= Html::submitButton('Next Step', ['class' => 'btn btn-success']) ?>
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

