<?php
/** @var Donations $model */

use app\models\Donations;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

<div class="container-fluid">
    <div class="row my-3">
    <div class="col-md-12 equal">
        <div class="col-md-6 col-sm-12 pl-0 profile-image-container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="../../../app-assets/images/carousel/02.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../app-assets/images/carousel/03.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../app-assets/images/carousel/01.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 pr-0 post-details-container">
            <div class="post-info">
                <h6 class="mt-2 post-category"><?= $model->idCategory->name ?></h6>
                <h2 class="section-title"><?= $model->title ?></h2>
            
                <h5 class="profile-type">Condition: <span class="post-condition"><?= boolval($model->condition_new) ? 'new' : 'used'; ?></span></h5>
                
                <p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    <?= $model->city ?>
                </p>

                <a href="#" class="btn-primary btn-lg float-md-right">Contact</a>

            </div>
        </div>
      </div>
    </div>
</div>

<div class="container mb-3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="form-section-heading my-2"><i class="fa fa-th-list"></i>Description</h3>
            <p><?= $model->description ?></p>
        </div>
    </div>
</div>

