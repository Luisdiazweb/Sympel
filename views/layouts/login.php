<?php

use app\assets\AppAsset;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this \yii\web\View */

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
<body data-open="click" data-menu="vertical-menu" data-col="1-column"
      class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page">
<?php $this->beginBody() ?>
<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <section class="flexbox-container" style="background: #252626">
                <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header no-border">
                            <div class="card-title text-xs-center">
                                <div class="p-1"><img src="<?= Url::to('@web/app-assets/images/logo/sympel-logo.png')?>" alt="branding logo">
                                </div>
                            </div>
                        </div>
                        <?= $content ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $this->endBody() ?>

</body>
</html>
<?php $this->endPage() ?>
