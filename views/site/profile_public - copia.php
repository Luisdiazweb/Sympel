<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\widgets\ListView;

?>

<div class="row my-3">
    <div class="container">
    <div class="col-md-12">
        <div class="col-md-3 col-sm-12 pl-0">
            <a href="#" class="profile-image">
                 <img style="height:200px;float:right;" src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>" class="rounded-circle img-border mx-auto d-block" alt="Card image">
            </a>
        </div>
        <div class="col-md-9 col-sm-12 pr-0">
            <div class="profile-info">
                 <?php if ($profile->profile_type_id == 1): ?>
                    <h2 class="section-title mt-3"><?= $profile->non_profit_name ?></h2>
                <?php elseif($profile->profile_type_id == 2):?>
                    <h2 class="section-title mt-3"><?= $profile->company_name ?></h2>
                <?php else:?>
                    <h2 class="section-title mt-3"><?= $profile->firstname . " " . $profile->lastname ?></h2>
                <?php endif;?>
                <h3 class="profile-type">Non Profit
                <?php if ($profile->profile_type_id == 1): ?>
                    <span class="ein ml-1">EIN: #<?= $profile->registered_ein ?></span>
                <?php endif?>

                </h3>
                
                <p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    <?= $profile->city ?>, <?= $profile->state ?>
                    <span class="profile-link">
                        <i class="fa fa-globe web"></i>
                        <a href="#"><?= $profile->website ?></a>
                    </span>
                    <span class="profile-link">
                        <i class="fa fa-phone phone"></i>
                        <a class="phone" href="#"><?= $profile->phone ?></a>
                    </span>
                </p>

                <p>
                     <?php if (!empty($areas)):?>
                            <?php foreach ($areas as $area): ?>
                                <div class="tag tag-default">
                                    <a href="#"><?= $area ?></a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                </p>

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

<div class="row profile-stats">
    <div class="container-fluid">
        <div class="col-md-12 equal">
            <div class="col-xl-4 col-md-4 col-xs-12">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-center">
                            <h3 class="primary font-large-2"><i class="fa fa-heart primary mr-1"></i>0</h3>
                            <p class="">Donation Items</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-4 col-xs-12">
                <div class="card-block">
                    <div class="media">
                        <div class="media-body text-xs-center">
                            <h3 class="danger font-large-2"><i class="fa fa-inbox danger mr-1"></i>0</h3>
                            <p class="">Needs Posted</p>
                        </div>
                    </div>
                </div>
            </div> 
            <div class="col-xl-4 col-md-4 col-xs-12 profile-cta"> 
               <a href="#" class=""><i class="fa fa-send-o mr-1"></i>Send Message</a>
            </div>    
        </div>
    </div>
</div>


<div class="row mt-2">

    <div class="col-md-10 offset-md-1">
        <?= $this->render('public_profile_partials/_profile_picture', [
            'profile' => $profile,
        ]) ?>
        <?php
        if ($profile->profile_type_id == 1) {
            echo $this->render('public_profile_partials/_information_1', [
                'profile' => $profile,
            ]);
        } elseif ($profile->profile_type_id == 2) {
            echo $this->render('public_profile_partials/_information_2', [
                'profile' => $profile,
            ]);
        } else {
            echo $this->render('public_profile_partials/_information_3', [
                'profile' => $profile,
                'summaryNeeds' => $summaryNeeds,
                'summaryDonations' => $summaryDonations,
                'areas' => $areas,
            ]);
        }
        ?>
    </div>
</div>
<?php if ($profile->profile_type_id != 3): ?>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <?= $this->render('public_profile_partials/_causes_areas', [
                'profile' => $profile,
                'summaryNeeds' => $summaryNeeds,
                'summaryDonations' => $summaryDonations,
                'areas' => $areas,
            ]);
            ?>
        </div>
    </div>
<?php endif; ?>
<!-- Card headings examples section end -->


<div class="row">
    <div class="col-md-10 offset-md-1">
        <div class="card box-shadow-2">
            <div class="card-body collapse in">
                <div class="card-block">
                    <ul class="nav nav-tabs nav-linetriangle no-hover-bg nav-justified">
                        <li class="nav-item">
                            <a class="nav-link active card-title" id="active-tab3" data-toggle="tab" href="#active3"
                               aria-controls="active3" aria-expanded="true">Items for donation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link card-title" id="link-tab3" data-toggle="tab" href="#link3"
                               aria-controls="link3" aria-expanded="false">Items needed</a>
                        </li>
                    </ul>
                    <div class="tab-content px-1 pt-1">
                        <!--TAB 1-->
                        <div role="tabpanel" class="tab-pane fade active in" id="active3" aria-labelledby="active-tab3"
                             aria-expanded="true">
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
                                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                                            $layout = "<div class=\"col-xl-3 col-md-6 col-sm-12\">
                    <div class=\"card\" style=\"\">
                        <div class=\"card-body\">$img_preview
                            <div class=\"card-block product-card-body\">
                                <h4 class=\"card-title\">$model->title</h4>
                                <p class=\"card-text\">$description</p>
                                <a href=\"$details_url \" class=\"btn btn - outline - success\">Go somewhere</a>
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
                        </div> <!--END OF TAB 1-->
                        <!--TAB 2-->
                        <div class="tab-pane fade" id="link3" role="tabpanel" aria-labelledby="link-tab3"
                             aria-expanded="false">
                            <div class="card-body collapse in">
                                <div class="card-block card-dashboard">
                                    <div class="row mt-2 mb-3">
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
                                                    $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                                                    $layout = "<div class=\"col-xl-3 col-md-6 col-sm-12\">
                    <div class=\"card\" style=\"\">
                        <div class=\"card-body\">$img_preview
                            <div class=\"card-block product-card-body\">
                                <h4 class=\"card-title\">$model->title</h4>
                                <p class=\"card-text\">$description</p>
                                <a href=\"$details_url\" class=\"btn btn-outline-success\">Go somewhere</a>
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
                                </div>
                            </div>
                        </div><!--END OF TAB 2-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>