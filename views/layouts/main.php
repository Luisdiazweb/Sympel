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
<nav id="mainNav" class="header-navbar navbar navbar-with-menu navbar-fixed-top ">
    <div class="navbar-wrapper">
        <div class="navbar-header">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a href="/" class="nav-link nav-menu-main menu-toggle hidden-xs">
                        <i class="ft-menu font-large-1"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a href=""<?= Url::to('@web/') ?>"" class="navbar-brand">
                        <img alt="Sympel logo" src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png') ?>"
                             class="brand-logo">
                <li class="nav-item hidden-md-up float-xs-right">
                    <a data-toggle="collapse" data-target="#navbar-mobile" class="nav-link open-navbar-container">
                        <i class="fa fa-ellipsis-v"></i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div id="navbar-mobile" class="collapse navbar-toggleable-sm">
                <ul class="nav navbar-nav">
                    <li class="nav-item icon hidden-sm-down"><a href="create-donation.html" class="nav-link"><i
                                    class="fa fa-pencil square-icon menu link-primary"></i>Post an Item</a></li>
                    <li class="nav-item icon hidden-sm-down"><a href="request-donation.html" class="nav-link"><i
                                    class="fa fa-heart square-icon menu link-secondary"></i>Ask for an Item</a></li>
                </ul>
                <ul class="nav navbar-nav float-xs-right actions">
                    <?=
                    Yii::$app->user->isGuest ? ('
                    <li class="nav-item"><a class="nav-link nav-actions" href="/signup">Signup</a></li>
                    <li class="nav-item"><a class="nav-link nav-actions" href="/login">Login</a></li>
                    '
                    ) : (Yii::$app->user->identity->admin? '<li class="nav-item"><a class="nav-link nav-actions" href="/dashboard/index">Dashboard</a></li>': '') . (
                        '<li class="nav-item">
                            <a class="nav-link nav-actions" href="/profile">
                                ' . Yii::$app->user->identity->username . '
                            </a>
                        </li>
                        <li class="nav-item"><a class="nav-link nav-actions" href="/logout">Logout</a></li>
                        ')
                    ?>
                </ul>
            </div>
        </div>
    </div>
</nav>
<?php //=Breadcrumbs::widget([
//            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
//        ]) ?>
<?= $content ?>
<section class="quote" id="quote">
    <div class="container-fluid">
        <div class="section-heading text-xs-center">
            <h2>GIVING IS SYMPEL</h2>
        </div>
    </div>
</section>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer>
    <div class="row">
        <div class="container">
            <ul class="col-sm-12 col-md-4 col-lg-3">
                <li>
                    <h3>Company</h3></li>
                <li><a href="">About Us</a></li>
                <li><a href="">Press</a></li>
                <li><a href="">Jobs</a></li>
                <li><a href="">FAQ's</a></li>
            </ul>
            <ul class="col-sm-12 col-md-4 col-lg-2">
                <li>
                    <h3>Connect</h3></li>
                <li><a href="">Facebook</a></li>
                <li><a href="">Twitter</a></li>
                <li><a href="">Contact</a></li>
            </ul>
            <ul class="col-sm-12 col-md-4 col-lg-4">
                <form action="">
                    <h4 class="form-section"><i class="ft-mail square-icon"></i> Get our newsletter!</h4>
                    <fieldset class="form-group position-relative has-icon-left">
                        <input type="text" class="form-control form-control-md input-md" id="iconLeft"
                               placeholder="Enter your Email">
                        <div class="form-control-position">
                            <i class="ft-search danger font-medium-4"></i>
                        </div>
                    </fieldset>
                    <button class="btn btn-danger">Subscribe</button>
                </form>
            </ul>
            <ul class="col-sm-12 col-lg-3">
                <a href="http://www.sympelworks.com"><img
                            src="<?= Url::to('@web/sympel-assets/img/sympel-works.png') ?>" alt="sympel works"></a>
                <p class="footer mt-1">SYMPEL WORKS is a creative consulting company that helps non-profits,
                    entreprenuers and businesses create, develop an launch their sales and marketing strategies.</p>
            </ul>
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
