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
                                    <!-- Step 3 -->
                                    <fieldset>
                                        <p class="text-sm-center my-3">We just need a little information before you
                                            get started.
                                            <br>Some of the information you can complete later or from your profile
                                            settings page.</p>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h3 class="my-2">Profile Information</h3>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <fieldset class="form-group">
                                                    <label for="file">Profile Image</label>
                                                    <label class="custom-file center-block block">
                                                        <input type="file" id="file" class="custom-file-input">
                                                        <span class="custom-file-control"></span>
                                                    </label>
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'non_profit_name'
                                                        , [
                                                            'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                        ]
                                                    ); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'title', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'address', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'state', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'city', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'zip_code', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'phone', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'registered_ein', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'website', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ]); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <?= $form->field($profile, 'mission', [
                                                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                                                    ])->label('Your mission'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <h3 class="my-2">Areas of support</h3>
                                        <p class="mb-2">Almost done! Tell us a little about your area of support.
                                            This will allow others to find you based on similar cause and interests.
                                            You can always make changes in your profile settings at anytime.</p>
                                        <div class="row mb-3">
                                            <?= $form->field($profile, 'areas_support', [
//                                                'template' => '<fieldset class="col-md-4 col-sm-12 skin skin-flat">{input}{label}</fieldset>'
                                            ])->checkboxList($areas_suport, [
                                                'itemOptions' => [
                                                    'template' => '<fieldset class="col-md-4 col-sm-12 skin skin-flat">{input}<label>{label}</label></fieldset>'
                                                ],
                                                'item' => function ($index, $label, $name, $checked, $value) {
                                                    return '<fieldset class="col-md-4 col-sm-12 skin skin-flat">
                                                                <label>
                                                                    <input type="checkbox" name="' . $name . '" value="' . $value . '" />
                                                                    ' . $label . '
                                                                </label>
                                                            </fieldset>';
                                                }
                                            ])->label(false); ?>
                                        </div>
                                        <p class="my-2">IMPORTANT: By submitting this form you are acknowledging
                                            that ou have the authority to represent the listed party and have read
                                            our account creation policies.</p>
                                        <?= Html::a('Previous',$url_prev,  ['class' => 'btn btn-primary']) ?>
                                        <?= Html::submitButton('Finish', ['class' => 'btn btn-success']) ?>
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