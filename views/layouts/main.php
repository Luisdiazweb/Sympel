
  <?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$profile = \app\models\ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);

AppAsset::register($this);
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
    <link rel="apple-touch-icon" href="<?= Url::to('@web/app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/app-assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">

    <?php $this->head() ?>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column ">
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
                <li class="nav-item icon hidden-sm-down link-hiw"><a href="#" class="nav-link">How it Works</a></li>
                <li class="nav-item nav-search"><a href="#" class="nav-link nav-link-search"><i class="ficon ft-search strong"></i></a>
                <div class="search-input">
                  <input type="text" placeholder="Search..." class="input">
                </div>
                </li>
              </ul>
              <ul class="nav navbar-nav float-xs-right actions login-nav">
                <?php if (Yii::$app->user->isGuest): ?>
                <li class="nav-item"><a class="nav-link nav-actions" href="/signup1">Signup</a></li>
                <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                 <?php else: ?>
                        <?php if (Yii::$app->user->identity->admin): ?>
                            <li class="nav-item"><a class="nav-link nav-actions" href="/dashboard/">Dashboard</a></li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link nav-actions" href="/publicprofile/<?=Yii::$app->user->identity->username?>">
                                <?php
                                $img = $profile->profile_picture_url;
                                ?>
                                <img src="<?= empty($img) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $img) ?>"
                                     class="rounded-circle img-border" style="height: 25px;margin-right: 10px;">
                                <?= Yii::$app->user->identity->username ?>
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link nav-actions" href="/logout"> Logout</a></li>
                    <?php endif; ?>
            </ul>
          </div>
        </div>
      </div>
    </nav>
<?php //=Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
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
<script>
    $(window).scroll(function () {
        if ($("#mainNav").offset().top > 100) {
            $("#mainNav").addClass("navbar-shrink");
        } else {
            $("#mainNav").removeClass("navbar-shrink");
        }
    });
</script>
</body>
</html>
<?php $this->endPage() ?>

