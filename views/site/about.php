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
                                    <h3 class="section-title my-3 text-xs-center">Donate where it's needed </h3>
                                     <p class="text-sm-center my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
                                    <!--END OF CHECKBOX AREA-->
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Icons Grid -->
    <section class="features-icons bg-light text-xs-center my-3">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-list-alt m-auto text-primary"></i>
              </div>
              <h3>Step 1</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-handshake-o m-auto text-primary"></i>
              </div>
              <h3>Step 2</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="fa fa-heart m-auto text-primary"></i>
              </div>
              <h3>Step 3</h3>
              <p class="lead mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

        <!-- Call to Action -->
    <section class="call-to-action text-white text-xs-center">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-xl-12">
            <h2 class="mb-3">Ready to get started?</h2>
            <a class="btn btn-cta" href="#">Sign up now!</a>
          </div>
        </div>
      </div>
    </section>

     <section class="my-3">
      <div class="container">
        <div class="row align-items-center">
          <div class="feature-half order-lg-2">
            <div class="p-5">
              <img class="img-feature rounded-circle" src="<?= Url::to('@web/app-assets/img/01.jpg')?>" alt="">
            </div>
          </div>
          <div class="feature-half order-lg-1">
            <div class="p-5">
              <h2 class="section-title my-3">For those about to rock...</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 feature-half">
            <div class="p-5">
              <img class="img-feature rounded-circle" src="<?= Url::to('@web/app-assets/img/02.jpg')?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 feature-half">
            <div class="p-5">
              <h2 class="section-title my-3">We salute you!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 feature-half order-lg-2">
            <div class="p-5">
              <img class="img-feature rounded-circle" src="<?= Url::to('@web/app-assets/img/03.jpg')?>" alt="">
            </div>
          </div>
          <div class="col-lg-6 feature-half order-lg-1">
            <div class="p-5">
              <h2 class="section-title my-3">Let there be rock!</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod aliquid, mollitia odio veniam sit iste esse assumenda amet aperiam exercitationem, ea animi blanditiis recusandae! Ratione voluptatum molestiae adipisci, beatae obcaecati.</p>
            </div>
          </div>
        </div>
      </div>
    </section>



    <!-- Testimonials -->
    <section class="testimonials text-xs-center bg-light">
      <div class="container">
        <h2 class="section-title my-3">What people are saying...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="<?= Url::to('@web/app-assets/img/testimonials-1.jpg')?>" alt="">
              <h5>Margaret E.</h5>
              <p class="font-weight-light mb-0">"Lorem ipsum dolor sit amet, consectetur adipisicing elit"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="<?= Url::to('@web/app-assets/img/testimonials-2.jpg')?>" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">"Lorem ipsum dolor sit amet, consectetur adipisicing elit"</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="<?= Url::to('@web/app-assets/img/testimonials-3.jpg')?>" alt="">
              <h5>Sarah	W.</h5>
              <p class="font-weight-light mb-0">"Lorem ipsum dolor sit amet, consectetur adipisicing elit"</p>
            </div>
          </div>
        </div>
      </div>
    </section>
