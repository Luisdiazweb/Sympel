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
        <div class="col-md-6 col-sm-12 col-xs-12 pl-0 profile-image-container">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-sm-10 offset-md-1 offset-sm-1">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner carousel-donation" role="listbox">
                                <?php 
                                    $images = json_decode($model->images_url);
                                    if ($images != ""){
                                        $flag = 0;
                                         foreach ($images as $img){
                                            if($flag == 0){
                                                echo'<div class="carousel-item active" style="background:url('.$img.')"></div>';
                                                $flag = 1;
                                            }
                                            else{
                                                echo'<div class="carousel-item" style="background:url('.$img.')"></div>';
                                            }
                                            
                                        }
                                    }

                                    else{

                                        //code to add a placeholder as thumbnail
                                        if($model->id_type == 1){
                                            echo'<div class="carousel-item active" style="background:url(sympel-assets/img/placeholder-needs.png)"></div>';
                                        }else{
                                            echo'<div class="carousel-item active" style="background:url(sympel-assets/img/placeholder-donations.png)"></div>';
                                        }
                                        
                                        //code to hide the carousel controls
                                        echo '<style>.carousel-control{display:none;}</style>';
                                         
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
        <div class="col-md-6 col-sm-12 col-xs-12 post-details-container">
            <div class="post-info">
                
                <h2 class="section-title mb-2"><?= $model->title ?></h2>
            
                <h5 class="profile-type">
                    Condition: <span class="post-condition"><?= boolval($model->condition_new) ? 'new' : 'used'; ?></span>
                    <span class="profile-links-landmark mb-3"><i class="fa fa-map-marker map"></i><?= $model->city ?>, <?= $model->state ?></span>
                </h5>
                <h3 class="donation-description-title my-2"><i class="fa fa-th-list"></i>Description</h3>
                <p><?= $model->description ?></p>
                <?php if($model->why_need != ""){ ?>
                    <h3 class="form-section-heading my-2"><i class="fa fa-question-circle"></i>Why we need it</h3>
                    <p><?= $model->why_need ?></p>
                <?php } ?>

                <h6 class="mt-2 post-category"><?= $model->idCategory->name ?></h6>

            </div>
        </div>
      </div>
    </div>
</div>

<div class="container">
    <hr>
</div>


<div class="container posted-by-user">
    <h1 class="mt-2">Posted By</h1>
    <div class="row my-3">
    <div class="col-md-12 equal">
        <div class="col-md-2 col-sm-12 col-xs-12 pl-0 donation-image-profile">
            <a href="/publicprofile/<?= $model->user->username?>" class="donation-cta-image">
                 <img class="float-xs-right rounded-circle img-border height-100 mx-auto d-block" src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>" alt="Card image">
            </a>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 pr-0 profile-info-block">
            <div class="profile-info">
               <?php if ($profile->profile_type_id == 1): ?>
                    <h2 class="section-title"> <a href="/publicprofile/<?= $model->user->username?>" class=""><?= $profile->non_profit_name ?></a></h2>
                    <h3 class="profile-type mb-2">Non Profit<span class="ein ml-1">EIN: #<?= $profile->registered_ein ?></span></h3>
                <?php elseif($profile->profile_type_id == 2):?>
                     <h2 class="section-title"><a href="/publicprofile/<?= $model->user->username?>" class=""><?= $profile->company_name ?></a></h2>
                     <h3 class="profile-type mb-2">Company</h3>
                <?php else:?>
                    <h2 class="section-title"><a href="/publicprofile/<?= $model->user->username?>" class=""><?= $profile->firstname . " " . $profile->lastname ?></a></h2>
                    <h3 class="profile-type mb-2">Giver</h3>
                <?php endif;?>
                                
                <p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    <?= $profile->state ?> , <?= $profile->city ?>                 
                    <span class="profile-link">
                       <?php if($profile->website): ?>
                        <i class="fa fa-globe web"></i>
                        <a href="http://<?= $profile->website ?>" target="_blank"><?= $profile->website ?></a>
                        <?php endif;?>
                    </span>
                     <?php if($show_phone == true || $profile->profile_type_id == 1): ?>
                    <span class="profile-link phone">
                        <i class="fa fa-phone phone"></i>
                        <a class="phone" href="tel:<?= $profile->phone ?>"><?= $profile->phone ?></a>
                    </span>
                    <?php endif;?>
                </p>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 col-xs-12 cta-donation"> 
               <a href="mailto:<?= $profile->user->email ?>" class="profile-cta"><i class="fa fa-send-o mr-1"></i>Send Message</a>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=<?php print Yii::$app->params['sharethis_id'] ?>&product=sticky-share-buttons"></script>

