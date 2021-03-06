<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\widgets\ListView;

?>

<div class="container">
    <div class="row my-3">
    <div class="col-md-12 equal">
        <div class="col-md-3 col-sm-12 col-xs-12 pl-0 profile-image-container">
            <a href="#" class="profile-image">
                 <img class="float-xs-right rounded-circle img-border height-100 mx-auto d-block" src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>" class="rounded-circle img-border mx-auto d-block" alt="Card image">
            </a>
        </div>
        <div class="col-md-9 col-sm-12 pr-0">
            <div class="profile-info">
                 <?php if ($profile->profile_type_id == 1): ?>
                    <h2 class="section-title mt-3"><?= $profile->non_profit_name ?></h2>
                    <h3 class="profile-type mb-2">Non Profit<span class="ein ml-1">EIN: #<?= $profile->registered_ein ?></span></h3>
                <?php elseif($profile->profile_type_id == 2):?>
                    <h2 class="section-title mt-3"><?= $profile->company_name ?></h2>
                     <h3 class="profile-type mb-2">Company</h3>
                <?php else:?>
                    <h2 class="section-title mt-3"><?= $profile->firstname . " " . $profile->lastname ?></h2>
                    <h3 class="profile-type mb-2">Giver</h3>
                <?php endif;?>
               
                <?php if ($profile->profile_type_id == 1): ?>
                <blockquote class="profile-mission">
                    <p><?=$profile->mission?></p>
                </blockquote>
                <?php endif?>
                
                <!--<p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    <?= $profile->city ?>, <?= $profile->state ?>
                    <span class="profile-link">
                        <i class="fa fa-globe web"></i>
                        <a href="http://<?= $profile->website ?>" target="_blank"><?= $profile->website ?></a>
                    </span>
                    <span class="profile-link">
                        <i class="fa fa-phone phone"></i>
                        <a class="phone" href="tel:<?= $profile->phone ?>"><?= $profile->phone ?></a>
                    </span>
                </p>-->

                <div class="profile-links-container">
                    <span class="profile-link">
                        <i class="fa fa-map-marker map"></i>
                        <?= $profile->city ?>, <?= $profile->state ?>
                    </span>
                    <span class="profile-link">
                        <?php if($profile->website): ?>
                        <i class="fa fa-globe web"></i>
                        <a href="http://<?= $profile->website ?>" target="_blank"><?= $profile->website ?></a>
                        <?php endif;?>
                    </span>
                    <?php if($show_phone == true || $profile->profile_type_id == 1): ?>
                    <span class="profile-link">
                        <i class="fa fa-phone phone"></i>
                        <a class="phone" href="tel:<?= $profile->phone ?>"><?= $profile->phone ?></a>
                    </span>
                    <?php endif;?>
                </div>
                
                <?php if ($profile->profile_type_id != 3): ?>
                <p>
                    <?php if (!empty($areas)):?>
                        <?php foreach ($areas as $area): ?>
                            <div class="tag tag-default">
                                <a href="<?= Url::to('@web/search?tag='.$area) ?>"><?= $area ?></a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </p>
                <?php endif; ?>

                <!--<a href="#" class="btn-primary btn float-xs-right"><i class="fa fa-send-o" style="margin-right: 5px;"></i> Send Message</a> 
                <div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Advocacy and Human Rights</a></div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Children & Youth</a></div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Environment</a></div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Computers & Technology</a></div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Employment</a></div>
                    <div style="font-size: 14px;margin: 5px;" class="tag tag-primary"><a href="#">Disaster Relief</a></div>
                </div>  --> 
            </div>
        </div>
      </div>
    </div>
</div>

<?php if ($profile->profile_type_id == 1): ?>
<div class="container-fluid">
    <div class="row profile-stats">
        <div class="col-md-12 equal">
            <div class="col-xl-4 col-md-4 col-sm-4 col-xs-12">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-center">
                            <h3 class="primary font-large-2"><i class="fa fa-heart primary mr-1"></i><?= $summaryNeeds?></h3>
                            <p class="primary">Needs</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-sm-4 col-xs-12">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-center">
                            <h3 class="danger primary font-large-2"><i class="fa fa-plus danger square-icon"></i>  <?= $summaryDonations?></h3>
                            <p class="danger">Donations</p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-4 col-md-4 col-sm-4 col-xs-12 profile-cta"> 
               <a href="mailto:<?= $profile->user->email ?>" class=""><i class="fa fa-send-o mr-1"></i>Send Message</a>
            </div>    
        </div>
    </div>
</div>
<?php endif; ?>

<?php if ($profile->profile_type_id == 1): ?>
 <div class="container-fluid">
    <div class="row recent-container">
        <div class="col-md-10 offset-md-1">
            <h3 class="section-title icon"><i class="fa fa-heart square-icon heading-category light link-secondary"></i>Items in Needs</h3>
             <div class="row mt-3">
                <div class="col-md-12">
                    <?= ListView::widget([
                        'dataProvider' => $dataNeeded,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'sympel-assets/img/placeholder-needs.png');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                              //Path for URL's
                          $path_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";


                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                            $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;
                            $layout = "<div class=\"col-xl-4 col-md-6 col-sm-6 list-item\">
                            <div class=\"card\" style=\"\">
                                <i class=\"fa fa-heart square-icon list-tag light link-secondary\"></i>
                                <div class=\"card-body\">
                                    <figure style=\"\">
                                    $img_preview</figure>
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">".$model->city.", ".$model->state."</p>
                                        <a href='/search?cat=".$model->idCategory->id."' class=\"card-link\">".$model->idCategory->name."</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"$details_url\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"mailto:".$model->user->email."\" class=\"card-icon\"><i class=\"fa fa-envelope-o\"></i></a>
                                             <a href=\"mailto:hello@sympel.com?subject=Report of inapropiate content&body=Hi, I found an inapropiate content and I want to report it.  ".$path_url.$details_url."\" class=\"card-icon\"><i class=\"fa fa-flag\" aria-hidden=\"true\"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                            return $layout;
                        },
                        'summary' => '',
                    ]) ?>
                   
                </div>

            </div>
      <div class="text-xs-center mt-3">
        <a href="<?= Url::to('@web/search?type=1&user='.$profile->user_id) ?>" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Needs</a>
      </div>  
    </div>
  </div>
<?php endif; ?>
<?php if ($profile->profile_type_id != 3): ?>
<div class="container-fluid">
    <div class="row recent-container">
    <div class="col-md-10 offset-md-1">
        <h3 class="section-title icon"><i class="fa fa-plus square-icon heading-category light link-primary"></i>Items for Donation</h3>
       <div class="row mt-3">
                <div class="col-md-12">
    
                    <?= ListView::widget([
                        'dataProvider' => $dataDonation,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'sympel-assets/img/placeholder-donations.png');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);


                              //Path for URL's
                          $path_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                            $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;
                            $layout = "<div class=\"col-xl-4 col-md-6 col-sm-6 list-item\">
                            <div class=\"card\" style=\"\">
                                <i class=\"fa fa-plus square-icon list-tag light link-primary\"></i>
                                <div class=\"card-body\">
                                    $img_preview
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">".$model->city.", ".$model->state."</p>
                                        <a href='/search?cat=".$model->idCategory->id."' class=\"card-link\">".$model->idCategory->name."</a>
                                        <div class=\"card-icon-container\">
                                           <a href=\"$details_url\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"mailto:".$model->user->email."\" class=\"card-icon\"><i class=\"fa fa-envelope-o\"></i></a>
                                             <a href=\"mailto:hello@sympel.com?subject=Report of inapropiate content&body=Hi, I found an inapropiate content and I want to report it.  ".$path_url.$details_url."\" class=\"card-icon\"><i class=\"fa fa-flag\" aria-hidden=\"true\"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                            return $layout;
                        },
                        'summary' => '',
                    ]) ?>
    
                </div>

      </div>
      <div class="text-xs-center mt-3"><a href="<?= Url::to('@web/search?type=2&user='.$profile->user_id) ?>" class="btn mr-1 mb-1 btn-secondary btn-lg">View All Donations</a></div>
    </div>  
  </div>
  </div>
  <?php endif; ?>