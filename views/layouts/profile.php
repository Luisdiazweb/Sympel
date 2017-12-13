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
use yii\widgets\ListView;
use yii\widgets\Pjax;

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
    <link rel="apple-touch-icon" href="<?= Url::to('@web/app-assets/images/ico/apple-icon-120.png') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::to('@web/app-assets/images/ico/favicon.ico') ?>">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i"
          rel="stylesheet">

    <?php $this->head() ?>
</head>
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column   menu-expanded fixed-navbar">
<?php $this->beginBody() ?>

<!-- navbar-fixed-top-->
<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-light navbar-border">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a href="#"
                       class="nav-link nav-menu-main menu-toggle hidden-xs"><i
                                class="ft-menu font-large-1"></i></a></li>
                <li class="nav-item"><a href="<?= Url::to('@web/') ?>" class="navbar-brand">
                        <img alt="Sympel logo"
                             src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png') ?>"
                             class="brand-logo">
                <li class="nav-item hidden-md-up float-xs-right">
                    <a data-toggle="collapse" data-target="#navbar-mobile"
                       class="nav-link open-navbar-container"><i
                                class="fa fa-ellipsis-v"></i></a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <ul class="nav navbar-nav">
                <li class="nav-item icon hidden-sm-down"><a href="/createdonation" class="nav-link"><i
                                class="fa fa-pencil square-icon menu link-primary"></i>Post an Item</a></li>
                <?php
                $profile = \app\models\ProfileAccount::findOne(['user_id' => Yii::$app->user->getId()]);
                if ($profile->profile_type_id == 1) :
                    ?>
                    <li class="nav-item icon hidden-sm-down"><a href="/requestdonation" class="nav-link"><i
                                    class="fa fa-heart square-icon menu link-secondary"></i>Ask for an Item</a></li>
                <?php endif; ?>

            </ul>
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav float-xs-right actions">
                    <!--                    <li class="nav-item"><a class="nav-link nav-actions" href="signup.html">Signup</a></li>-->
                    <li class="nav-item"><a class="nav-link nav-actions" href="/logout">Logout</a></li>
                </ul>

            </div>
        </div>
    </div>
</nav>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-12 col-xs-12 my-3">
                <h1 class="content-header-title text-sm-center sympel-title">Profile Settings</h1>
            </div>
        </div>
        <div class="content-body"><!-- Form wizard with number tabs section start -->

            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card box-shadow-2">
                            <div class="card-body collapse in">
                                <div class="card-block">
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
                                                            <h3 class="my-2 card-title">Items for Donation</h3>
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
                                                                $status = $modelDonations->checked ? "Checked" : "Pending";
                                                                $date = Yii::$app->formatter->format($modelDonations->created_at, 'date');
                                                                $category = $modelDonations->idCategory->name;
                                                                $layout = "<td>$img_preview</td>
                                                                            <td>$modelDonations->id_public</td>
                                                                            <td>$status</td>
                                                                            <td>$date</td>
                                                                            <td>$modelDonations->title</td>
                                                                            <td>$category</td>";
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
<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span
                class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017 <a
                    href="https://themeforest.net/user/pixinvent/portfolio?ref=pixinvent" target="_blank"
                    class="text-bold-800 grey darken-2">SYMPEL </a>, All rights reserved. </span><span
                class="float-md-right d-xs-block d-md-inline-block hidden-md-down">Hand-crafted & Made with <i
                    class="ft-heart pink"></i></span></p>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
