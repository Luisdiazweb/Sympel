<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $modelSearchDonation app\models\DonationsSearch */

use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Giving is Sympel - Sympel';

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

<header class="masthead d-lg-none">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="header-content">
          <p class="main-quote"><span>Make your donations count</span></p>
          <p class="main-quote"><span>by giving where it's needed</span></p>
          <p class="quote-paragraph">sympel offers a new way to give to the need by connecting <br >items for donations with churches, non-profits and <br >charitable organizations.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="welcome-section">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 welcome-column quote">
          <h2 class="welcome-quote">Welcome to the giving community</h2>

        </div>
        <div class="col-md-6 welcome-column description">
            <p class="text-gray welcome-text">The sympel community...</p>
            <p class="text-gray welcome-text">believes in a community that recycles, reuses and gives to make a greater impact to the everyday needs of organizations that make this world a better place.</p>
            <p class="text-xs-center"><button type="button" class="btn button-description">Sign Up</button></p>

        </div>
    </div>
  </div>
</section>
        
<!-- Card headings examples section end -->
<section class="welcome-options">
  <div class="container">
    <div class="row option-container">
        <div class="col-lg-2 col-md-4">
          <a href="<?= Url::to('@web/createdonation') ?>" class="btn button-primary button-options">Create a Donation</a>
        </div>
        <div class="col-lg-10 col-md-8">
            <p class="options-description">Anyone can create a donation post to offer an item for donation to a non-profit or charitable organization. </p>
        </div>
    </div>
    <div class="row option-container">
        <div class="col-lg-2 col-md-4">
          <a href="<?= Url::to('@web/requestdonation') ?>" class="btn button-secondary button-options">Request a Donation</a>
        </div>
        <div class="col-lg-10 col-md-8">
            <p class="options-description">Anyone can create a donation post to offer an item for donation to a non-profit or charitable organization. </p>
        </div>
    </div>
    <div class="row option-container">
        <div class="col-lg-2 col-md-4">
          <a href="<?= Url::to('@web/search') ?>" class="btn button-tertiary button-options">Search</a>
        </div>
        <div class="col-lg-10 col-md-8">
            <p class="options-description">Anyone can create a donation post to offer an item for donation to a non-profit or charitable organization. </p>
        </div>
    </div>
  </div>
</section>

<div class="container-fluid">
    <div class="row recent-container">
        <div class="col-md-10 offset-md-1">
      <h3 class="section-title"><i class="fa fa-arrow-circle-down color-primary icon-title"></i>Recent Needs</h3>
             <div class="row mt-3">
                <div class="col-md-12">
                    <?php Pjax::begin(); ?>
                    <?= ListView::widget([
                        'dataProvider' => $needs,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/05.jpg');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                            $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;

                            $layout = "<div class=\"col-xl-4 col-md-4 col-sm-6\">
                            <div class=\"card\" style=\"\">
                                <div class=\"card-body\">
                                    <figure style=\"\">
                                    $img_preview</figure>
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">Location, State</p>
                                        <a href=\"#\" class=\"card-link\">category</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-comment-o\"></i></a>
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-share-alt\"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                            return $layout;
                        },
                        'summary' => '',
                    ]) ?>
                    <?php Pjax::end(); ?>
                   
                </div>

            </div>
      <div class="text-xs-center mt-3"><button type="button" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Needs</button></div>
        </div>  
    </div>
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

     <div class="container-fluid">
    <div class="row recent-container">
    <div class="col-md-10 offset-md-1">
      <h3 class="section-title"><i class="fa fa-arrow-circle-down color-secondary icon-title"></i>Recent Donations</h3>
       <div class="row mt-3">
                <div class="col-md-12">
                    <?php Pjax::begin(); ?>
                    <?= ListView::widget([
                        'dataProvider' => $donate,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/05.jpg');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);

                            $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;
                            $layout = "<div class=\"col-xl-3 col-md-4 col-sm-6\">
                            <div class=\"card\" style=\"\">
                                <div class=\"card-body\">
                                    $img_preview
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">Location, State</p>
                                        <a href=\"#\" class=\"card-link\">category</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-comment-o\"></i></a>
                                            <a href=\"#\" class=\"card-icon\"><i class=\"fa fa-share-alt\"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                            return $layout;
                        },
                        'summary' => '',
                    ]) ?>
                    <?php Pjax::end(); ?>
                </div>

      </div>
      <div class="text-xs-center mt-3"><button type="button" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Donations</button></div>
    </div>  
  </div>
  </div>
   <!-- ////////////////////////////////////////////////////////////////////////////-->
   <section>
      <div class="container-fluid">
        <div class="row equal center">
          <div class="col-md-6 bg-primary cta-box">
            <h3>Start Making a Difference</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. mollit anim id est laborum.
            </p>
            <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn">Sign Up</a></p>
          </div>
          <div class="col-md-6 bg-secondary cta-box">
            <h3>Learn More</h3>
            <p>
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. mollit anim id est laborum.
            </p>
            <p class="text-xs-center"><a href="<?= Url::to('@web/howitworks') ?>" class="btn">How it works</a></p>
          </div>
        </div>
      </div>
    </section>
