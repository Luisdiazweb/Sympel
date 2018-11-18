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

$this->registerCssFile("@web/app-assets/vendors/css/extensions/toastr.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/extensions/toastr.css",
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
$this->registerJsFile("@web/app-assets/vendors/js/extensions/toastr.min.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile("@web/app-assets/js/scripts/extensions/toastr.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
if($verified == false){
  $this->registerJs("toastr.error('Some functions will be unavaliable until you verify your account.', 'Verify your Account!');",\yii\web\View::POS_END);
}

if($verifyEin == false){
  var_dump($verifyEin);
  $this->registerJs("toastr.warning('Some functions will be unavaliable until we verify your EIN number.', 'EIN not verified');",\yii\web\View::POS_END);
}




?>

<header class="masthead d-lg-none hidden-md-down">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="header-content">
          <p class="main-quote"><span>Make your donations count</span></p>
          <p class="main-quote"><span>by giving where it's needed</span></p>
          <p class="quote-paragraph">A needs based giving platform for churches ... simple.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<header class="masthead d-lg-none hidden-lg-up">
  <div class="container h-100">
    <div class="row h-100">
      <div class="col-lg-12 my-auto">
        <div class="header-content">
          <p class="main-quote"><span>Make your donations count by giving where it's needed</span></p>
          <p class="quote-paragraph">A needs based giving platform for churches ... simple.</p>
        </div>
      </div>
    </div>
  </div>
</header>

<section class="welcome-section hidden-md-down">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-6 welcome-column quote">
          <h2 class="welcome-quote">Welcome to the giving community</h2>

        </div>
        <div class="col-md-6 welcome-column description">
            <p class="text-gray welcome-text">The sympel community...</p>
            <p class="text-gray welcome-text">believes in a community that recycles, reuses and gives to make a greater impact to the everyday needs.</p>
            <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn button-description">Sign Up</a></p>

        </div>
    </div>
  </div>
</section>

<section class="welcome-section-small hidden-lg-up">
  <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 welcome-column-small quote">
          <h2 class="welcome-quote">Welcome to the giving community</h2>

        </div>
        <div class="col-md-12 welcome-column-small description text-xs-center">
            <p class="text-gray welcome-text">The sympel community...</p>
            <p class="text-gray welcome-text">believes in a community that recycles, reuses and gives to make a greater impact to the everyday needs of organizations that make this world a better place.</p>
            <p class="text-xs-center mt-2"><a href="<?= Url::to('@web/signup1') ?>" class="btn button-description">Sign Up</a></p>

        </div>
    </div>
  </div>
</section>
        
<!-- Card headings examples section end -->
<section class="welcome-options mt-3">
  <div class="container">
    <div class="row option-container">
        <div class="col-lg-2 col-md-4 col-sm-4 action-option">
          <a href="<?= Url::to('@web/createdonation') ?>" class="btn button-secondary button-options">Give something</a>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-8">
            <p class="options-description">Have something to give? Offer it up to other churches in your area.</p>
        </div>
    </div>
    <div class="row option-container">
        <div class="col-lg-2 col-md-4 col-sm-4 action-option">
          <a href="<?= Url::to('@web/requestdonation') ?>" class="btn button-primary  button-options">Need Something</a>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-8">
            <p class="options-description">Looking for something? You are not alone, there are churches wanting to help right where you need. Create a need now.</p>
        </div>
    </div>
    <div class="row option-container">
        <div class="col-lg-2 col-md-4 col-sm-4 action-option">
          <a href="<?= Url::to('@web/search') ?>" class="btn button-tertiary button-options">Search</a>
        </div>
        <div class="col-lg-10 col-md-8 col-sm-8">
            <p class="options-description">Check out items in your area and connect with other churches. Help other churches by giving where its needed.</p>
        </div>
    </div>
  </div>
</section>

<div class="container-fluid">
    <div class="row recent-container">
        <div class="col-md-10 offset-md-1">
      <h3 class="section-title icon"><i class="fa fa-heart square-icon heading-category light link-secondary"></i>Recent Needs</h3>
             <div class="row mt-3">
                <div class="col-md-12">
                    <?php Pjax::begin(); ?>
                    <?= ListView::widget([
                        'dataProvider' => $needs,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'sympel-assets/img/placeholder-needs.png');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                             $nameOrganization=null;
                         $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;

                          //In case it's an individual
                           if($model->profile_account->profile_type_id == "3"){ $nameOrganization =  $model->profile_account->firstname . ' ' . $model->profile_account->lastname; } else {}

                           //Path for URL's
                          $path_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
                           

                            $layout = "<div class=\"col-xl-4 col-md-6 col-sm-6 list-item\">
                            <div class=\"card\" style=\"\">
                             <i class=\"fa fa-heart square-icon list-tag light link-secondary\"></i>
                                <div class=\"card-body\">
                                    <figure style=\"\">
                                    $img_preview</figure>
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title section-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">".$model->city.", ".$model->state."</p>
                                        <a href='/search?cat=".$model->idCategory->id."' class=\"card-link\">".$model->idCategory->name."</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"$details_url\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"mailto:".$model->user->email."\" class=\"card-icon\"><i class=\"fa fa-envelope-o\"></i></a>
                                            <a href=\"mailto:hello@sympel.com?subject=Report of inapropiate content&body=Hi, I found an inapropiate content and I want to report it.  ".$path_url.$details_url."\" class=\"card-icon\"><i class=\"fa fa-flag\" aria-hidden=\"true\"></i></a>
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
      <div class="text-xs-center mt-3"><a href="<?= Url::to('@web/search?type=1') ?>" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Needs</a></div>
        </div>  
    </div>
  </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

     <div class="container-fluid">
    <div class="row recent-container">
    <div class="col-md-10 offset-md-1">
      <h3 class="section-title icon"><i class="fa fa-plus square-icon heading-category light link-primary"></i>Recent Donations</h3>
       <div class="row mt-3">
                <div class="col-md-12">
                    <?php Pjax::begin(); ?>
                    <?= ListView::widget([
                        'dataProvider' => $donate,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'sympel-assets/img/placeholder-donations.png');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100); 
                            $nameOrganization=null;
                           
                            //if($model->profile_account->profile_type_id == "3"){$nameOrganization=$model->profile_account->non_profit_name;} 
                           // if else (){}

                           
                            $path_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

                           $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->company_name : $model->profile_account->non_profit_name ;
                         
                          //In case it's an individual
                           if($model->profile_account->profile_type_id == "3"){ $nameOrganization =  $model->profile_account->firstname . ' ' . $model->profile_account->lastname; } else {}

                            $layout = "<div class=\"col-xl-4 col-md-6 col-sm-6 list-item\">
                            <div class=\"card\" style=\"\">
                              <i class=\"fa fa-plus square-icon list-tag light link-primary\"></i>
                                <div class=\"card-body\">
                                    $img_preview
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title section-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">".$model->city.", ".$model->state."</p>
                                        <a href='/search?cat=".$model->idCategory->id."' class=\"card-link\">".$model->idCategory->name."</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"$details_url\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"mailto:".$model->user->email."\" class=\"card-icon\"><i class=\"fa fa-envelope-o\"></i></a>
                                            <a href=\"mailto:hello@sympel.com?subject=Report of inapropiate content&body=Hi, I found an inapropiate content and I want to report it.  ".$path_url.$details_url."\" class=\"card-icon\"><i class=\"fa fa-flag\" aria-hidden=\"true\"></i></a>
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
      <div class="text-xs-center mt-3"><a href="<?= Url::to('@web/search?type=2') ?>" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Donations</a></div>
    </div>  
  </div>
  </div>
   <!-- ////////////////////////////////////////////////////////////////////////////-->
   <section>
      <div class="container-fluid">
        <div class="row equal center">
          <div class="col-md-6 bg-primary cta-box block1">
            <h4 class="box-tag">For Everyone</h4>
            <h3>Be a Giver</h3>
            <p>
              Just like you we hate waste and love giving. Who said money was the only way to help your church community. The church needs you more than you can imagine. Find what items are in need and give where it counts. No cost, just giving!
            </p>
            <?php if(Yii::$app->user->isGuest) : ?>
                <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn">I'm Ready</a></p>
            <?php endif; ?>
          </div>
          <div class="col-md-6 bg-secondary cta-box">
            <h4 class="box-tag">For Churches</h4>
            <h3>One Church Family</h3>
            <p>
              God never said his work was going to be easy, we get that. We know in your growth you are always looking for things to help your church. That's what the sympel community is about; helping fulfill your needs where it counts. Create donation requests and tell the community what you need. Be a part of the giving community and help other churches.
            </p>
            <?php if(Yii::$app->user->isGuest) : ?>
                <p class="text-xs-center"><a href="<?= Url::to('@web/signup1') ?>" class="btn">Let's Go</a></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>

<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=<?php print Yii::$app->params['sharethis_id'] ?>&product=sticky-share-buttons' async='async'></script>

