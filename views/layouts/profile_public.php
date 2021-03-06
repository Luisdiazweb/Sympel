<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);

$profile = \app\models\ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);

$this->registerCssFile("@web/app-assets/vendors/css/forms/toggle/switchery.min.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/horizontal-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/fonts/simple-line-icons/style.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/colors/palette-gradient.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/switch.min.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/ui/jquery.sticky.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/charts/jquery.sparkline.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/forms/toggle/bootstrap-checkbox.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/forms/toggle/switchery.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/ui/breadcrumbs-with-stats.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/switch.js',
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

<?php 

//validate if this code is loaded in the Public profile page
//variable for the og:url
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

//validate if I'm in Need or donations
if (strpos($actual_link, 'publicprofile') != false) {

 //Path for images
$path = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

//variable for the og:url
$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
$usernickname_var = explode('/', $actual_link, 5);
//echo $usernickname_var[4];
$usenickname = "company";
//$user_id_share = app\models\UsersSystem::findOne(['id' => $usenickname]);
$user_id_share = app\models\UsersSystem::find()->where(['username' => $usernickname_var[4]])->one();
$idd = $user_id_share->id;
//echo $idd;
$profiletwo = \app\models\ProfileAccount::findOne(['user_id' => $idd]);
//echo $profiletwo->profile_type_id;
if($profiletwo->profile_type_id == 1){
  $metatitle = $profiletwo->non_profit_name;
  $description = $profiletwo->mission;
} else if($profiletwo->profile_type_id == 2){
  $metatitle = $profiletwo->company_name;
  $description = "sympel offers a new way to give to the need by connecting items for donations with churches, non-profits and charitable organizations.";
} else if($profiletwo->profile_type_id == 3){
  $metatitle = $profiletwo->firstname." ".$profiletwo->lastname;
  $description = "sympel offers a new way to give to the need by connecting items for donations with churches, non-profits and charitable organizations.";
}
?>

<meta property="og:title" content="<?= $metatitle ?>">
<meta property="og:description" content="<?= $description ?>">
<meta property="og:image" content="<?php echo $path."/".$profiletwo->profile_picture_url; ?>">
<meta property="og:image:width" content="500" />
<meta property="og:url" content="<?php echo $actual_link; ?>">
<meta name="twitter:card" content="summary_large_image">

<?php } ?>

    <title><?= Html::encode($this->title) ?></title>
    <link rel="apple-touch-icon" href="<?= Url::to('@web/app-assets/images/logo/sympel-fav.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/app-assets/images/logo/sympel-fav.png') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">
    <?php $this->head() ?>
</head>
<body data-menu="horizontal-menu" data-col="2-columns"
      class="horizontal-layout horizontal-menu 2-columns  fixed-navbar  menu-expanded">
<?php $this->beginBody() ?>


<!-- navbar-fixed-top-->
<?php

/*NavBar::begin([
    'brandLabel' => 'My Company',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => [
        ['label' => 'Home', 'url' => ['/index']],
        ['label' => 'About', 'url' => ['/about']],
        ['label' => 'Contact', 'url' => ['/contact']],
        Yii::$app->user->isGuest ? (
        ['label' => 'Login', 'url' => ['/login']]
        ) : (
            '<li>'
            . Html::beginForm(['/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'
        )
    ],
]);
NavBar::end();*/

?>

 <nav id="mainNav" class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-shadow">
      <div class="navbar-wrapper">
        <div class="navbar-header">
          <ul class="nav navbar-nav">
            <li class="nav-item mobile-menu hidden-md-up float-xs-left">
              <a href="/" class="nav-link nav-menu-main menu-toggle hidden-xs"><!--<i class="ft-menu font-large-1"></i>--></a></li>
            <li class="nav-item">
              <a href="<?= Url::to('@web/') ?>" class="navbar-brand">
              <img alt="Sympel logo" src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png')?>" class="brand-logo">
            <li class="nav-item hidden-md-up float-xs-right"><a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"><i class="ft-menu font-large-1"></i></a></li>
          </ul>
        </div>
        <div class="navbar-container content">
          <div id="navbar-mobile" class="navbar-collapse collapse navbar-toggleable-sm">
              <ul class="nav navbar-nav hidden-sm-down">
                <?php if($profile) : ?>
                <li class="nav-item icon"><a href="/createdonation" class="nav-link"><i class="fa fa-plus square-icon menu light link-primary"></i><span class="menu-icon-description hidden-sm-down">Give Something</span></a></li>
                <?php endif; ?>
                <?php if($profile) : ?>
                  <?php if ($profile->profile_type_id == 1) : ?>
                <li class="nav-item icon hidden-sm-down"><a href="/requestdonation" class="nav-link"><i class="fa fa-heart square-icon menu light link-secondary"></i><span class="menu-icon-description hidden-sm-down">Need Something</span></a></li>
                 <?php endif; ?>
                <?php endif; ?>
                <li class="nav-item icon hidden-sm-down link-hiw"><a href="<?= Url::to('@web/howitworks') ?>" class="nav-link">How it Works</a></li>
                <li class="nav-item nav-search"><a href="<?= Url::to('@web/search') ?>" class="nav-link nav-link-search"><i class="ficon ft-search strong"></i></a>
                <div class="search-input open">
                  <input type="text" placeholder="Search for item, donation or church" class="input" id="search-query">
                </div>
                </li>
              </ul>
              <ul class="nav navbar-nav float-xs-right actions login-nav hidden-sm-down">
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item"><a class="nav-link nav-actions" href="/signup1">Signup</a></li>
                <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                 <?php else: ?>
                        <li class="dropdown dropdown-user nav-item">
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
                            <span class="user-name"><?= Yii::$app->user->identity->username ?></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right">
                             <?php if (Yii::$app->user->identity->admin): ?>
                                <a href="/dashboard/" class="dropdown-item"><i class="ft-monitor"></i> Dashboard</a>
                             <?php else: ?>
                                <a href="/" class="dropdown-item"><i class="ft-monitor"></i> Home</a>
                            <?php endif; ?>
                            <a href="/myprofile" class="dropdown-item"><i class="ft-edit"></i> Edit Profile</a>
                            <?php if ($profile->profile_type_id == 1) : ?>
                                <a href="/publicprofile/<?=Yii::$app->user->identity->username?>" class="dropdown-item"><i class="ft-user"></i> View Profile</a>
                            <?php endif; ?>
                            <div class="dropdown-divider"></div><a href="/logout" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                          </div>
                        </li>
                    <?php endif; ?>
            </ul>

              <ul class="nav navbar-nav hidden-md-up ">
                 <?php if($profile && $profile->profile_type_id == 1) : ?>
                    <li class="nav-item"><a href="/createdonation" class="nav-link"><span class="">Give Something</span></a></li>
                    <li class="nav-item"><a href="/requestdonation" class="nav-link"><span class="">Need Something</span></a></li>
                <?php endif; ?>
                <li class="nav-item"><a class="nav-link" href="/search">Search</a></li>
                <li class="nav-item"><a href="<?= Url::to('@web/howitworks') ?>" class="nav-link">How it Works</a></li>
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item"><a class="nav-link nav-actions" href="/signup1">Signup</a></li>
                <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                 <?php else: ?>
                  <li class="dropdown dropdown-user nav-item">
                          <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link" aria-expanded="false">
                            <?= Yii::$app->user->identity->username ?>
                          </a>
                             <div class="dropdown-menu dropdown-menu-right sub-menu">
                             <?php if (Yii::$app->user->identity->admin): ?>
                             <a href="/dashboard/" class="dropdown-item"><i class="ft-monitor"></i> Dashboard</a>
                            <?php endif; ?>
                            <a href="/myprofile" class="dropdown-item"><i class="ft-edit"></i> Edit Profile</a>
                            <a href="/publicprofile/<?=Yii::$app->user->identity->username?>" class="dropdown-item"><i class="ft-user"></i> View Profile</a>
                            <div class="dropdown-divider"></div><a href="/logout" class="dropdown-item"><i class="ft-power"></i> Logout</a>
                          </div>
                   </li>
                    <?php endif; ?>
              </ul>
          </div>
        </div>
      </div>
    </nav>
<?= $content ?>
<!-- ////////////////////////////////////////////////////////////////////////////-->

<section class="quote" id="quote">
    <div class="container-fluid">
        <div class="section-heading text-xs-center">
            <h2>GIVING IS SYMPEL</h2>
        </div>
    </div>
</section>

<!-- ////////////////////////////////////////////////////////////////////////////-->

    <footer class="hidden-md-down">
      <div class="container">
        <div class="row">
          <div class="col-md-6 text-center">
            <ul class="col-sm-12 col-md-6 col-lg-6">
              <li><h3>Company</h3></li>
              <li><a href="<?= Url::to('@web/howitworks') ?>">About Us</a></li>
              <li><a href="<?= Url::to('@web/faq') ?>">FAQ's</a></li>
              <li><a href="<?= Url::to('@web/legalstuff') ?>">Legal Stuff</a></li>
            </ul>
            <ul class="col-sm-12 col-md-6 col-lg-6">
              <li><h3>Connect</h3></li>
              <li><a href="https://www.facebook.com/itssympel/">Facebook</a></li>
              <li><a href="https://twitter.com/itssympel">Twitter</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-6">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 border-right">
                    <h3 class="text-right">Looking to grow<br> your business?</h3>
                    <p class="text-right footer-text mt-1">Check out our <br> sister company</p>
                  </div>
                   <div class="col-md-6">
                   <a href="http://www.sympelworks.com"><img src="<?= Url::to('@web/sympel-assets/img/sympel-works.png') ?>" alt="sympel works" class="img-fluid"></a>
                   <p class="footer-text mt-1">SYMPEL WORKS is a creative consulting company that helps non-profits, entreprenuers and businesses create, develop an launch their sales and marketing strategies.</p>
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
          <div class="col-md-12 footer-menu-section">
            <ul class="col-sm-12 col-md-4 col-lg-3">
              <li><h3>Company</h3></li>
              <li><a href="<?= Url::to('@web/about') ?>">About Us</a></li>
              <li><a href="<?= Url::to('@web/faq') ?>">FAQ's</a></li>
              <li><a href="<?= Url::to('@web/legalstuff') ?>">Legal Stuff</a></li>
            </ul>
            <ul class="col-sm-12 col-md-4 col-lg-2">
              <li><h3>Connect</h3></li>
              <li><a href="https://www.facebook.com/itssympel/">Facebook</a></li>
              <li><a href="https://twitter.com/itssympel">Twitter</a></li>
              <li><a href="">Contact</a></li>
            </ul>
          </div>
          <div class="col-md-12">
              <div class="container footer-company">
                <div class="row">
                  <div class="col-sm-6 border-right footer-company-text">
                    <h3>Looking to grow<br> your business?</h3>
                    <p class="footer-text mt-1">Check out our <br> sister company</p>
                  </div>
                   <div class="col-sm-6">
                    <a href="http://www.sympelworks.com"><img
                            src="<?= Url::to('@web/sympel-assets/img/sympel-works.png') ?>" alt="sympel works" class="img-fluid"></a>
                   <p class="footer-text mt-1">SYMPEL WORKS is a creative consulting company that helps non-profits, entreprenuers and businesses create, develop an launch their sales and marketing strategies.</p>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </footer>

<?php $this->endBody() ?>
<script>
  //$('.nav-link-search').click(function(e){e.preventDefault()})
     $('#search-query').keypress(function( event ) {
    if ( event.which == 13 ) {
      var query = $(this).val();
      window.location.href = "/search?DonationsSearch%5Btitle%5D="+query;
    }
  });
</script>
</body>
</html>

<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=<?php print Yii::$app->params['sharethis_id'] ?>&product=sticky-share-buttons"></script>

<?php $this->endPage() ?>
