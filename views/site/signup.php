<?php
/* @var $this View */

use app\assets\AppAsset;
use yii\web\View;

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

$this->registerJsFile('@web/app-assets/vendors/js/extensions/jquery.steps.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
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
$this->registerJsFile('@web/app-assets/vendors/js/forms/validation/jquery.validate.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/wizard-steps.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
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
                                    <form action="#" class="steps-validation wizard-circle">
                                        <!-- Step 1 -->
                                        <h6><i class="step-icon fa fa-check"></i> Get Started</h6>
                                        <fieldset>
                                            <p class="text-sm-center my-3">First, we need to know what type of profile
                                                you are interested in setting up.</p>
                                            <div class="row">
                                                <div class="col-md-4 mb-3  card">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <input class="big-radio" type="radio" id="test1"
                                                                   name="radio-group" checked>
                                                            <label for="test1" class="radio-primary label-big">Non
                                                                Profit</label>
                                                            <p class="radio-description">Non-profit profiles can create
                                                                donation requests and post items for donation </p>
                                                            <p class="radio-description">*Registration will require
                                                                501-c3 verification</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3  card">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <input class="big-radio" type="radio" id="test2"
                                                                   name="radio-group">
                                                            <label for="test2"
                                                                   class="radio-secondary label-big">Company</label>
                                                            <p class="radio-description">Company profiles can post items
                                                                for donation</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3  card">
                                                    <div class="card-body">
                                                        <div class="card-block">
                                                            <input class="big-radio" type="radio" id="test3"
                                                                   name="radio-group">
                                                            <label for="test3" class="radio-tertiary label-big">Individual</label>
                                                            <p class="radio-description">Individual profiles can post
                                                                items for donation</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 2 -->
                                        <h6><i class="step-icon fa fa-user-plus"></i> Create Account</h6>
                                        <fieldset>
                                            <p class="text-sm-center my-3">To get started, first we need your basic
                                                profile details.</p>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <p>You can sign in with:</p>
                                                    <a href="#" class="btn btn-social btn-facebook">
                                                        <span class="fa fa-facebook"></span> Sign in with Facebook</a>
                                                    <p class="my-2">Or you can create an account:</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="firstName">
                                                            First Name :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="firstName"
                                                               name="firstName">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="lastName">
                                                            Last Name :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="lastName"
                                                               name="lastName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="emailAddress">
                                                            Email Address :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="email" class="form-control " id="emailAddress"
                                                               name="emailAddress">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="userName">
                                                            Username :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="userName"
                                                               name="userName">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="password">
                                                            Password :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="password" class="form-control " id="password"
                                                               name="password">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="passwordConfirm">
                                                            Re-type Password :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="password" class="form-control "
                                                               id="passwordConfirm" name="passwordConfirm">
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <!-- Step 3 -->
                                        <h6><i class="step-icon fa fa-pencil"></i> Set Up Profile</h6>
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
                                                        <label for="nonprofit-name">
                                                            Non-Profit Name :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="nonprofit-name"
                                                               name="nonprofit-name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="title">
                                                            Title/Position :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="title"
                                                               name="title">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">
                                                            Address :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="email" class="form-control " id="address"
                                                               name="address">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="state">
                                                            State :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="state"
                                                               name="state">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="city">
                                                            City :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="city" name="city">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="zipcode">
                                                            Zip Code :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="zipcode"
                                                               name="zipcode">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="phone">
                                                            Phone :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="tel" class="form-control " id="phone" name="phone">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ein">
                                                            Registered EIN# :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="eine" name="ein">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="website">
                                                            Website :
                                                            <span class="danger">*</span>
                                                        </label>
                                                        <input type="text" class="form-control " id="website"
                                                               name="website">
                                                    </div>
                                                </div>
                                            </div>
                                            <h3 class="my-2">Areas of support</h3>
                                            <p class="mb-2">Almost done! Tell us a little about your area of support.
                                                This will allow others to find you based on similar cause and interests.
                                                You can always make changes in your profile settings at anytime.</p>
                                            <div class="row mb-3">
                                                <div class="col-md-4 col-sm-12 skin skin-flat">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Advocacy and Human Rights</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Animals</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Art's & Culture</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Board Development</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Children & Youth</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Comunity</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Computers & Technology</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Crisis Support</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Seniors</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Women</label>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4 col-sm-12 skin skin-flat">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Disaster Relief</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Education & Literacy</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Emergency & Safety</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Employment</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Environment</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Faith Based</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Health & Medicine</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Homeless & Housing</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Sports & Recreation</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Health & Fitness</label>
                                                        </fieldset>
                                                </div>
                                                <div class="col-md-4 col-sm-12 skin skin-flat">
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Hunger</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Immigrants & Refugees</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">International</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="input-11">
                                                        <label for="input-11">Justice & Legal</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">LGBT</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Media & Broadcasting</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Politics</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Race & Ethnicity</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Veterans & Military</label>
                                                        </fieldset>
                                                        <fieldset>
                                                            <input type="checkbox" id="input-11">
                                                            <label for="input-11">Civil Rights & Support</label>
                                                        </fieldset>
                                                </div>
                                            </div>
                                            <p class="my-2">IMPORTANT: By submitting this form you are acknowledging
                                                that ou have the authority to represent the listed party and have read
                                                our account creation policies.</p>
                                        </fieldset>
                                    </form>
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