<?php

/* @var $this \yii\web\View */

/* @var $content string */
/* @var $modelDonations app\models\DonationsSearch */
$dataDonations = $this->params['dataDonations'];
$modelDonations = $this->params['modelDonations'];

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\ArrayHelper;
use yii\widgets\ListView;
use yii\widgets\Pjax;


$profile = \app\models\ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);


AppAsset::register($this);
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
// $this->registerCssFile("@web/app-assets/css/plugins/forms/wizard.css",
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_HEAD
//     ]);
$this->registerCssFile("@web/app-assets/css/plugins/pickers/daterange/daterange.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/colors/palette-tooltip.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);

////////////////////////////////////////////////////////////////////////////////////////////////
//$this->registerJsFile('@web/app-assets/vendors/js/extensions/jquery.steps.min.js',
//    [
//        'depends' => [AppAsset::className()],
//        'position' => \yii\web\View::POS_END
//    ]);
// $this->registerJsFile('@web/app-assets/vendors/js/pickers/dateTime/moment-with-locales.min.js',
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_END
//     ]);
//$this->registerJsFile('@web/app-assets/vendors/js/pickers/daterange/daterangepicker.js',
//    [
//        'depends' => [AppAsset::className()],
//        'position' => \yii\web\View::POS_END
//    ]);
// $this->registerJsFile('@web/app-assets/vendors/js/forms/validation/jquery.validate.min.js',
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_END
//     ]);
// $this->registerJsFile('@web/app-assets/vendors/js/tables/jquery.dataTables.min.js',
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_END
//     ]);
// $this->registerJsFile('@web/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js',
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_END
//     ]);
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
// $this->registerJsFile('@web/app-assets/js/scripts/tables/datatables/datatable-basic.js',
//     [
//         'depends' => [AppAsset::className()],
//         'position' => \yii\web\View::POS_END
//     ]);
$this->registerJsFile('@web/app-assets/js/scripts/tooltip/tooltip.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" data-textdirection="ltr" class="loading">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="<?= Url::to('@web/app-assets/images/logo/sympel-fav.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/app-assets/images/logo/sympel-fav.png') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">

    <?php $this->head() ?>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar">
<?php $this->beginBody() ?>

<!-- navbar-fixed-top-->
<nav id="mainNav" class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left">
              <a href="/" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu font-large-1"></i></a></li>
            <li class="nav-item">
              <a href="<?= Url::to('@web/') ?>" class="navbar-brand">
              <img alt="Sympel logo" src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png')?>" class="brand-logo">
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="fa fa-ellipsis-v"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content container-fluid">
          <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav">
                <li class="nav-item icon hidden-sm-down"><a href="/createdonation" class="nav-link"><i class="fa fa-pencil square-icon menu light link-primary"></i>Create a Donation</a></li>
                <?php if($profile) : ?>
                  <?php if ($profile->profile_type_id == 1) : ?>
                <li class="nav-item icon hidden-sm-down"><a href="/requestdonation" class="nav-link"><i class="fa fa-heart square-icon menu light link-secondary"></i>Request a Donation</a></li>
                 <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item icon hidden-sm-down link-hiw"><a href="<?= Url::to('@web/howitworks') ?>" class="nav-link">How it Works</a></li>
                <li class="nav-item nav-search"><a href="<?= Url::to('@web/search') ?>" class="nav-link nav-link-search"><i class="ficon ft-search strong"></i></a>
                <!--<div class="search-input">
                  <input type="text" placeholder="Search..." class="input">
                </div>-->
                </li>
              </ul>
              <!--<ul class="nav navbar-nav float-xs-right actions login-nav">
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item"><a class="nav-link nav-actions" href="/signup1">Signup</a></li>
                <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                 <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link nav-actions" href="/publicprofile/<?=Yii::$app->user->identity->username?>">
                     
                                <div class="frame-square">
                                   <div class="crop">
                                     <img src="<?= empty($img) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $img) ?>"
                                     class="">
                                   </div>
                                </div>
                                
                                <?= Yii::$app->user->identity->username ?>
                            </a>
                        </li>
                         <?php if (Yii::$app->user->identity->admin): ?>
                            <li class="nav-item"><a class="nav-link nav-actions" href="/dashboard/">Dashboard</a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link nav-actions" href="/logout"> Logout</a></li>
                    <?php endif; ?>
            </ul>-->
            <ul class="nav navbar-nav float-xs-right actions login-nav">
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item"><a class="nav-link nav-actions" href="/signup1">Signup</a></li>
                <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                 <?php else: ?>
                        <li class="dropdown dropdown-user">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link" aria-expanded="false">
                            <span class="">
                              <div class="frame-square">
                                 <div class="crop">
                                       <?php
                                $img = $profile->profile_picture_url;
                                ?>
                              <img src="<?= empty($img) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $img) ?>" alt="avatar">   </div>
                               </div><i></i>
                            </span>
                            <span class=""><?= Yii::$app->user->identity->username ?></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                             <?php if (Yii::$app->user->identity->admin): ?>
                             <a href="/dashboard/" class="dropdown-item"><i class="ft-monitor"></i> Dashboard</a>
                            <?php endif; ?>
                            <a href="/myprofile" class="dropdown-item"><i class="ft-edit"></i> Edit Profile</a>
                            <a href="/publicprofile/<?=Yii::$app->user->identity->username?>" class="dropdown-item"><i class="ft-user"></i> View Profile</a>
                            <div class="dropdown-divider"></div><a href="/logout" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                          </div>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link nav-actions" href="/publicprofile/<?=Yii::$app->user->identity->username?>">
                                <?php
                                $img = $profile->profile_picture_url;
                                ?>
                                <div class="frame-square">
                                   <div class="crop">
                                     <img src="<?= empty($img) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $img) ?>"
                                     class="">
                                   </div>
                                </div>
                                
                                <?= Yii::$app->user->identity->username ?>
                            </a>
                        </li>-->
                    <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>

<div class="app-content content container-fluid">
    <div class="content-wrapper">

        <div class="content-body"><!-- Form wizard with number tabs section start -->

            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="mt2">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <i class="fa fa-id-badge heading-icon"></i>
                                        <h3 class="section-title my-3 text-xs-center">Your Sympel's Profile</h3>
                                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
                                        <li class="nav-item">
                                            <a class="nav-link active card-title" id="active-tab3" data-toggle="tab"
                                               href="#active3" aria-controls="active3" aria-expanded="true">Account
                                                Info</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link card-title" id="link-tab3" data-toggle="tab"
                                               href="#link3" aria-controls="link3" aria-expanded="false">Postings</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1">
                                        <!--TAB 1-->
                                        <div role="tabpanel" class="tab-pane fade active in" id="active3"
                                             aria-labelledby="active-tab3" aria-expanded="true">
                                            <?= $content ?>
                                        </div> <!--END OF TAB 1-->
                                        <!--TAB 2-->
                                        <div class="tab-pane fade" id="link3" role="tabpanel"
                                             aria-labelledby="link-tab3" aria-expanded="false">

                                            <div class="card-body collapse in">
                                                <div class="card-block card-dashboard">
                                                    <div class="row mt-2 mb-3">
                                                        <div class="col-md-12">
                                                            <h3 class="form-section-heading mt-3 mb-1"><i class="fa fa-heart"></i>Items for Donation</h3>
                                                        </div>
                                                    </div>
                                                    <table class="table table-striped table-no-vertical table-bordered zero-configuration">
                                                        <thead>
                                                        <tr>
                                                            <th>Preview</th>
                                                            <th>ID</th>
                                                            <th>Status</th>
                                                            <th>Date</th>
                                                            <th>Title</th>
                                                            <th>Optional Category</th>
                                                            <th></th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?= ListView::widget([
                                                            'dataProvider' => $dataDonations,
                                                            'itemView' => function ($modelDonations, $key, $index, $widget) {
                                                                $images = empty($modelDonations->images_url) ? null : json_decode($modelDonations->images_url);
                                                                $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/09.jpg');
                                                                $img_preview = Html::img(Url::to([$img]), [
                                                                    'class' => 'img-fluid my-1',
                                                                    'style' => 'max-width: 200px;'
                                                                ]);
                                                                $details_url = Url::to(['itemdetails', 'id' => $modelDonations->id_public]);
                                                                $status = $modelDonations->checked ? "Checked" : "Pending";
                                                                $date = Yii::$app->formatter->format($modelDonations->created_at, 'date');
                                                                $category = $modelDonations->idCategory->name;
                                                                $layout = "<tr><td>$img_preview</td>
                                                                            <td>$modelDonations->id_public</td>
                                                                            <td>$status</td>
                                                                            <td>$date</td>
                                                                            <td><a href=\"$details_url\">$modelDonations->title</a></td>
                                                                            <td>$category</td>
                                                                            <td><a href='#'><i class='fa fa-pencil'></i></a><a href='#'><i class='fa fa-times'></i></a></td></tr>";

                                                                return $layout;
                                                            },
                                                            'summary' => '',
                                                        ]) ?>
                                                        </tbody>

                                                    </table>


                                                </div>
                                            </div>
                                        </div>
                                    </div> <!--END OF TAB 2-->
                                </div>
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
<!-- ////////////////////////////////////////////////////////////////////////////-->

    <footer class="hidden-md-down">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <ul class="col-sm-12 col-md-6 col-lg-6">
              <li><h3>Company</h3></li>
              <li><a href="">About Us</a></li>
              <li><a href="">Press</a></li>
              <li><a href="">Jobs</a></li>
              <li><a href="">FAQ's</a></li>
              <li><a href="">Privacy Policy</a></li>
              <li><a href="">Site Terms</a></li>
            </ul>
            <ul class="col-sm-12 col-md-6 col-lg-6">
              <li><h3>Connect</h3></li>
              <li><a href="">Facebook</a></li>
              <li><a href="">Twitter</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-6">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 border-right">
                    <h3 class="text-right">Looking to grow<br> your business?</h3>
                    <p class="text-right footer mt-1">Check out our <br> sister company</p>
                  </div>
                   <div class="col-md-6">
                   <a href="http://www.sympelworks.com"><img src="<?= Url::to('@web/sympel-assets/img/sympel-works.png') ?>" alt="sympel works"></a>
                   <p class="footer mt-1">SYMPEL WORKS is a creative consulting company that helps non-profits, entreprenuers and businesses create, develop an launch their sales and marketing strategies.</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </footer>

    <footer class="hidden-lg-up">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <ul class="col-sm-12 col-md-4 col-lg-3">
              <li><h3>Company</h3></li>
              <li><a href="">About Us</a></li>
              <li><a href="">Press</a></li>
              <li><a href="">Jobs</a></li>
              <li><a href="">FAQ's</a></li>
              <li><a href="">Privacy Policy</a></li>
              <li><a href="">Site Terms</a></li>
            </ul>
            <ul class="col-sm-12 col-md-4 col-lg-2">
              <li><h3>Connect</h3></li>
              <li><a href="">Facebook</a></li>
              <li><a href="">Twitter</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-12">
              <div class="container footer-company">
                <div class="row">
                  <div class="col-sm-6 border-right footer-company-text">
                    <h3>Looking to grow<br> your business?</h3>
                    <p class="footer mt-1">Check out our <br> sister company</p>
                  </div>
                   <div class="col-sm-6">
                    <a href="http://www.sympelworks.com"><img
                            src="<?= Url::to('@web/sympel-assets/img/sympel-works.png') ?>" alt="sympel works"></a>
                   <p class="footer mt-1">SYMPEL WORKS is a creative consulting company that helps non-profits, entreprenuers and businesses create, develop an launch their sales and marketing strategies.</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
