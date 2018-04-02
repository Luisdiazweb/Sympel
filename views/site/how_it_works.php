<?php

use app\assets\AppAsset;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this yii\web\View */

$this->title = "How it Works - Sympel";

$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile("@web/app-assets/js/scripts/forms/checkbox-radio.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);


?>


    <section id="validation mt-3">
        <div class="row">
            <div class="col-md-12 mt-3">
                <div class="">
                    <div class="card-body collapse in mt-3">
                        <div class="card-block">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <h2 class="section-title my-3 text-xs-center howitworks-title">How It Works</h2>
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
            <!-- Call to Action -->
    <section class="title-full secondary text-white text-xs-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <h2 class="">For Everyone</h2>
          </div>
        </div>
      </div>
    </section>
    <div class="arrow-down"></div>  

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-xs-center">
      <div class="container">
        <div class="row">
          <div class="my-3 col-lg-12 col-md-12 col-sm-12">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-list-alt m-auto card-icon"></i>
              </div>
              <h3 class="howitworks">Create a Donation</h3>
              <p class="howitworks">Got something to give? Maybe an extra computer or some office furniture you want to go to a charitable organization. Take some time to list your donation and offer it up.</p>
            </div>
          </div>
          <div class="my-3 col-lg-12 col-md-12 col-sm-12">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-heart m-auto card-icon"></i>
              </div>
              <h3 class="howitworks">Find Need</h3>
              <p class="howitworks">Browse the everyday and open needs of charitable organizations in your area.Choose to give the item and know your donation went straight to the cause.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

      <section class="features-icons bg-light bg-triangle text-xs-center triangle-margin">
      <div class="container">
        <div class="row justify-center-columns">
          <img class="triangle-bg" src="<?= Url::to('@web/app-assets/img/triangle-bg.png')?>" alt="">
          <div class="my-3 col-lg-6 col-md-6 col-sm-6">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3 triangle-padding">
              <h3 class="howitworks">Give</h3>
              <p class="howitworks">Meet up and donate to a cause of your choice.</p>
              <div class="features-icons-icon d-flex">
                <i class="fa fa-handshake-o m-auto card-icon"></i>
              </div>
              <h3 class="howitworks">Receive.</h3>
              <p class="howitworks">Connect with new donors and receive items to help your cause.</p>
          </div>
          </div>
        </div>
      </div>
    </section>


     <!-- Icons Grid -->
    <section class="features-icons bg-light text-xs-center">
      <div class="container">
        <div class="row">
          <div class="my-3 col-lg-12 col-md-12 col-sm-12">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-list-alt m-auto card-icon"></i>
              </div>
              <h3 class="howitworks">Find Donations</h3>
              <p class="howitworks">Browse the list of donations in your area and source items and donations that will help your cause.</p>
            </div>
          </div>
          <div class="my-3 col-lg-12 col-md-12 col-sm-12">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-heart m-auto card-icon"></i>
              </div>
              <h3 class="howitworks">Request Donations</h3>
              <p class="howitworks">In need of something? Request an item in need allowing your supporters and the community a opportunity to donate directly.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


    <div class="arrow-up"></div>
    <!-- Call to Action -->
    <section class="title-full primary text-white text-xs-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <h2 class="">For Nonprofits</h2>
          </div>
        </div>
      </div>
    </section>