<?php
/** @var Donations $model */

use app\models\Donations;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

<div class="container">
    <div class="row my-3">
    <div class="col-md-12 mt-3 equal donation-head">
        <div class="col-md-6 col-sm-12 pl-0 profile-image-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner carousel-donation" role="listbox">
                                <?php 
                                    $images = json_decode($model->images_url);
                                    if ($images != ""){
                                        $flag = 0;
                                         foreach ($images as $img){
                                            if($flag == 0){
                                                echo'<div class="carousel-item active"><img src="'.$img.'" alt="slide"></div>';
                                                $flag = 1;
                                            }
                                            else{
                                                echo'<div class="carousel-item"><img src="'.$img.'" alt="slide"></div>';
                                            }
                                            
                                        }
                                    }
                                ?>
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
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 pr-0 post-details-container">
            <div class="post-info">
                
                <h2 class="section-title mb-2"><?= $model->title ?></h2>
            
                <h5 class="profile-type">
                    Condition: <span class="post-condition"><?= boolval($model->condition_new) ? 'new' : 'used'; ?></span>
                    <span class="profile-links-landmark mb-3"><i class="fa fa-map-marker map"></i><?= $model->city ?></span>
                </h5>
                <h3 class="donation-description-title my-2"><i class="fa fa-th-list"></i>Description</h3>
                <p><?= $model->description ?></p>
            <h6 class="mt-2 post-category"><?= $model->idCategory->name ?></h6>
                

            </div>
        </div>
      </div>
    </div>
</div>

<!--<div class="container mb-3">
    <div class="row">
        <div class="col-md-12">
            <h3 class="donation-description-title my-2"><i class="fa fa-th-list"></i>Description</h3>
            <p><?= $model->description ?></p>
        </div>
    </div>
</div>-->
<div class="container">
    <hr>
</div>

<div class="container">
    <h1 class="mt-2">Posted By</h1>
    <div class="row my-3">
    <div class="col-md-12 equal">
        <div class="col-md-3 col-sm-12 pl-0 donation-image-profile">
            <a href="#" class="donation-cta-image">
                 <img class="float-xs-right rounded-circle img-border height-100 mx-auto d-block" src="/app-assets/images/carousel/05.jpg" alt="Card image">
            </a>
        </div>
        <div class="col-md-5 col-sm-12 pr-0">
            <div class="profile-info">
                <h2 class="section-title">Nonprofit</h2>
                <h3 class="profile-type mb-3">Non Profit</h3>
                                
                <p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    lala, lala                    <span class="profile-link">
                        <i class="fa fa-globe web"></i>
                        <a href="http://sadf" target="_blank">sadf</a>
                    </span>
                    <span class="profile-link">
                        <i class="fa fa-phone phone"></i>
                        <a class="phone" href="tel:123123">123123</a>
                    </span>
                </p>

                <p>
                </p><div class="tag tag-default">
                <a href="#">Advocacy and Human Rights</a>
                 </div>
                <p></p>
            </div>
        </div>

        <div class="col-md-4 cta-donation"> 
               <a href="#" class="profile-cta"><i class="fa fa-send-o mr-1"></i>Send Message</a>
        </div>
      </div>
    </div>
</div>


<?php if($model->why_need != ""){ ?>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-12">
                <h3 class="form-section-heading my-2"><i class="fa fa-question"></i>Why we need it</h3>
                <p><?= $model->why_need ?></p>
            </div>
        </div>
    </div>
<?php } ?>

