<?php

use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */

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
        <link rel="apple-touch-icon" href="<?= Url::to('@web/admin/images/ico/apple-icon-120.png') ?>">
        <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/admin/images/ico/favicon.ico') ?>">
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
                            <img alt="stack admin logo"
                                 src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png') ?>"
                                 class="brand-logo">
<!--                            <h2 class="brand-text">Stack</h2>-->
                        </a>
                    </li>
                    <li class="nav-item hidden-md-up float-xs-right">
                        <a data-toggle="collapse"
                           data-target="#navbar-mobile"
                           class="nav-link open-navbar-container">
                            <i class="fa fa-ellipsis-v"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="navbar-container content container-fluid">
                <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                    <ul class="nav navbar-nav">
                        <li class="nav-item hidden-sm-down"><a href="#"
                                                               class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                        class="ft-menu"></i></a></li>
                        <li class="nav-item hidden-sm-down"><a href="#" class="nav-link nav-link-expand"><i
                                        class="ficon ft-maximize"></i></a></li>
                        <!-- <li class="nav-item nav-search"><a href="#" class="nav-link nav-link-search"><i class="ficon ft-search"></i></a>
                            <div class="search-input">
                                <input type="text" placeholder="Explore Stack..." class="input">
                            </div>
                        </li> -->
                    </ul>
                    <ul class="nav navbar-nav float-xs-right">
                        <li class="dropdown dropdown-notification nav-item"><a href="#" data-toggle="dropdown"
                                                                               class="nav-link nav-link-label"><i
                                        class="ficon ft-bell"></i><span
                                        class="tag tag-pill tag-default tag-danger tag-default tag-up">5</span></a>
                            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right">
                                <li class="dropdown-menu-header">
                                    <h6 class="dropdown-header m-0"><span
                                                class="grey darken-2">Notifications</span><span
                                                class="notification-tag tag tag-default tag-danger float-xs-right m-0">5 New</span>
                                    </h6>
                                </li>
                                <li class="list-group scrollable-container">
                                    <a href="javascript:void(0)" class="list-group-item">
                                        <div class="media">
                                            <div class="media-left valign-middle"><i
                                                        class="ft-plus-square icon-bg-circle bg-cyan"></i></div>
                                            <div class="media-body">
                                                <h6 class="media-heading">You have new order!</h6>
                                                <p class="notification-text font-small-3 text-muted">Lorem ipsum dolor
                                                    sit
                                                    amet, consectetuer elit.</p>
                                                <small>
                                                    <time datetime="2015-06-11T18:29:20+08:00"
                                                          class="media-meta text-muted">30 minutes ago
                                                    </time>
                                                </small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-menu-footer"><a href="javascript:void(0)"
                                                                    class="dropdown-item text-muted text-xs-center">Read
                                        all
                                        notifications</a></li>
                            </ul>
                        </li>
                        <li class="dropdown dropdown-user nav-item">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link dropdown-user-link">
	                        	<span class="avatar avatar-online">
	                        		<img src="<?= Url::to('@web/admin/images/portrait/small/avatar-s-1.png') ?>" alt="avatar">
	                        		<i></i>
	                        	</span>
                                <span class="user-name"><?= Yii::$app->user->identity->username?></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="<?=Url::to(['profile/update', 'id'=> Yii::$app->session->get('profile_id')])?>" class="dropdown-item"><i class="ft-user"></i> Edit Profile</a>
<!--                                <a href="#" class="dropdown-item"><i class="ft-mail"></i> My Inbox</a>-->
<!--                                <a href="#" class="dropdown-item"><i class="ft-check-square"></i> Task</a>-->
<!--                                <a href="#" class="dropdown-item"><i class="ft-message-square"></i> Chats</a>-->
                                <div class="dropdown-divider"></div>
                                <a href="<?= Url::to('/logout')?>" class="dropdown-item"><i class="ft-power"></i> Logout</a>
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
                    <a href="<?= Url::to('dashboard')?>">
                        <i class="ft-home"></i>
                        <span data-i18n="" class="menu-title">Dashboard</span>
                        <span class="tag tag tag-primary tag-pill float-xs-right mr-2">1</span>
                    </a>
                    <ul class="menu-content">
                        <li>
                            <a href="/user/" class="menu-item">Users</a>
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
                <?= $content ?>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <footer class="footer footer-static footer-dark navbar-border">
        <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                    class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a
                        href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank"
                        class="text-bold-800 grey darken-2">PIXINVENT </a>, All rights reserved. </span><span
                    class="float-md-right d-xs-block d-md-inline-block hidden-md-down">Hand-crafted & Made with <i
                        class="ft-heart pink"></i></span></p>
    </footer>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>