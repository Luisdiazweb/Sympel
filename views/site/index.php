<?php

/* @var $this yii\web\View */

use app\assets\AppAsset;

$this->title = 'Giving is Sympel - Sympel';

$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
]);
$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
]);
$this->registerCssFile("app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
]);
$this->registerJsFile("app-assets/js/scripts/forms/checkbox-radio.js",
[
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
]);


?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-10">
                <div class="header-content">
                    <p class="main-quote"><span>Make your donations count</span></p>
                    <p class="main-quote"><span>by giving where it's needed</span></p>
                    <p class="quote-paragraph">sympel offers a new way to give to the need by connecting
                        <br>items for donations with churches, non-profits and
                        <br>charitable organizations.</p>
                </div>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-outline-header square btn-min-width mr-1 mb-1">How it works</button>
            </div>
        </div>
    </div>
</header>
<section class="search">
    <div class="container">
        <p>Quick Search</p>
        <div class="row equal center">
            <div class="col-xs-5">
                <fieldset class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control square form-control-xl input-xl" id="iconLeft"
                           placeholder="Search for item or donation">
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-1">
                <p class="form-text">near</p>
            </div>
            <div class="col-xs-4">
                <fieldset class="form-group position-relative has-icon-left">
                    <input type="text" class="form-control square form-control-xl input-xl" id="iconLeft"
                           placeholder="City, State or Zip">
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-2">
                <input class="btn btn-primary btn-block square btn-lg mr-1 mb-1" type="button" value="Search">
            </div>
        </div>
        <div class="skin skin-flat mt-2">
            <div class="d-inline mr-3">
                <input type="checkbox" id="input-11">
                <label for="input-11">Show donations posts</label>
            </div>
            <div class="d-inline">
                <input type="checkbox" id="input-12">
                <label for="input-12">Show requested posts</label>
            </div>
        </div>
    </div>
</section>
<section class="donations-list">
    <div class="container-fluid">
        <div class="row match-height">
            <div class="col-xl-12">
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <div class="card-body">
                            <img class="card-img-top img-fluid" src="<?= \yii\helpers\Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                 alt="Card image cap">
                            <div class="card-block product-card-body">
                                <h4 class="card-title">Name of need</h4>
                                <p class="card-text">Name of Organization</p>
                                <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i class="fa fa-eye"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-comment-o"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <div class="card-body">
                            <img class="card-img-top img-fluid" src="<?= \yii\helpers\Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                 alt="Card image cap">
                            <div class="card-block product-card-body">
                                <h4 class="card-title">Name of need</h4>
                                <p class="card-text">Name of Organization</p>
                                <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i class="fa fa-eye"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-comment-o"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <div class="card-body">
                            <img class="card-img-top img-fluid" src="<?= \yii\helpers\Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                 alt="Card image cap">
                            <div class="card-block product-card-body">
                                <h4 class="card-title">Name of need</h4>
                                <p class="card-text">Name of Organization</p>
                                <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i class="fa fa-eye"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-comment-o"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-sm-12">
                    <div class="card" style="">
                        <div class="card-body">
                            <img class="card-img-top img-fluid" src="<?= \yii\helpers\Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                 alt="Card image cap">
                            <div class="card-block product-card-body">
                                <h4 class="card-title">Name of need</h4>
                                <p class="card-text">Name of Organization</p>
                                <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i class="fa fa-eye"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-comment-o"></i></a>
                                <a href="#" style="font-size: 20px; margin-left:10px;"><i
                                            class="fa fa-share-square"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
