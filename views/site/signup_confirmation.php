<?php
/* @var $this View */

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
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
</header>-->
 ////////////////////////////////////////////////////////////////////////////-->
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
                       
                                    <!-- Step 3 -->
                                    <fieldset>
                                        <div class="col-md-12 col-sm-12 col-xs-12 profile-image-container my-3">
								            <a href="#" class="profile-image">
								                 <img class="rounded-circle img-border height-100 mx-auto d-block" src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>" class="rounded-circle img-border mx-auto d-block" alt="Card image">
								            </a>
								        </div>
                                        <h3 class="section-title my-3 text-xs-center">Welcome to the community, <?= $profile->firstname?>!</h3>
                                        <p class="text-sm-center my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                            <br>Praesentium laborum voluptatibus corporis quis repellat ipsam sed vero.</p>
                                        

                                       
                                       
                                            <div class="text-xs-center my-3">
                                      	<a href="<?= Url::to('@web/search') ?>" class="btn button-primary btn-lg">Start Exploring</a>
                                        </div>
                                    </fieldset>
                               
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
<?php $this->render('script_maxcheckbox')?>