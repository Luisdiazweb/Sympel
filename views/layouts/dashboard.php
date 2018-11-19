<?php

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

/* @var $this \yii\web\View */

$profile = \app\models\ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);
AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>" data-textdirection="ltr" class="loading">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
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

    <body data-open="click" data-menu="vertical-menu" data-col="2-columns"
          class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">
    <?php $this->beginBody() ?>
    <!-- - var navbarShadow = true-->
    <!-- navbar-fixed-top-->
    <nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-light bg-gradient-x-grey-blue">
        <div class="navbar-wrapper">
            <div class="navbar-header">
                <ul class="nav navbar-nav">
                    <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                        <a href="#"
                           class="nav-link nav-menu-main menu-toggle hidden-xs">
                            <i class="ft-menu font-large-1"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="navbar-brand">
                            <img alt="stack admin logo" src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png') ?>"class="brand-logo">
                            <!--                            <h2 class="brand-text">Stack</h2>-->
                        </a>
                    </li>
                    <li class="nav-item hidden-md-up float-xs-right">
                        <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container"> <i class="fa fa-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down">
                            <a href="#" class="nav-link nav-menu-main menu-toggle hidden-xs"><i class="ft-menu"></i></a>
                        </li>
                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand">
                            <i class="ficon ft-maximize"></i></a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav float-xs-right">
                        <li class="dropdown dropdown-user nav-item user-nav">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
	                        	<!--<span class="avatar">
	                        		<img src="<?= Url::to('@web/admin/images/portrait/small/avatar-s-1.png') ?>" alt="avatar">
	                        		<i></i>
	                        	</span>-->
                                <span class=""><?= Yii::$app->user->identity->username ?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?= Url::to(['profile/update', 'id' => Yii::$app->session->get('profile_id')]) ?>"
                                   class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
                                <div class="dropdown-divider"></div>
                                <a href="<?= Url::to('/logout') ?>" class="dropdown-item"><i class="ft-power"></i>
                                    Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div data-scroll-to-active="true" class="main-menu menu-fixed menu-light menu-accordion menu-shadow">
        <div class="main-menu-content">
            <ul id="main-menu-navigation" data-menu="menu-navigation" class="navigation navigation-main">
                <li class=" navigation-header"><span>General</span><i data-toggle="tooltip" data-placement="right"
                                                                      data-original-title="General"
                                                                      class=" ft-minus"></i>
                </li>
                <li class=" nav-item">
                    <a href="<?= Url::to(['dashboard']) ?>">
                        <i class="ft-home"></i>
                        <span data-i18n="" class="menu-title">Dashboard</span>
                        <!--<span class="tag tag tag-primary tag-pill float-xs-right mr-2">1</span>-->
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/user/" class="menu-item"><i class="fa fa-users"></i>Users</a>
                        </li>
                        <li class="nav-item has-sub"><a href="#">
                                <i class="fa fa-pencil"></i>
                                <span data-i18n="" class="menu-title">Donations</span></a>
                            <ul class="menu-content" style="">
                                <li class=""><a href="/donationadmin/?DonationsSearch[id_type]=2" class="menu-item">Creations</a>
                                </li>
                                <li class=""><a href="/donationadmin/?DonationsSearch[id_type]=1" class="menu-item">Donations</a>
                                </li>
                            </ul>
                        </li>
                        <!--                        <li class="active"><a href="dashboard-analytics.html" class="menu-item">Analytics</a>-->
                        <!--                        </li>-->
                        <!--                        <li><a href="dashboard-fitness.html" class="menu-item">Fitness</a>-->
                        <!--                        </li>-->
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="app-content content container-fluid">
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <?php //echo Breadcrumbs::widget([
                //                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                //]) ?>

                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-dark navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                    class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a
                        href="http://sympel.com" target="_blank"
                        class="text-bold-800 grey darken-2">Sympel </a>, All rights reserved. </span></p>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>