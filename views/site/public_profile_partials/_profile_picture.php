<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;
use yii\bootstrap\Html;

?>

<div class="col-md-3 col-sm-12 pl-0">
    <div class="card box-shadow-1">
        <div class="card-block">
            <div class="">
                <a href="#" class="profile-image">
                <img src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>"
                                 class="rounded-circle img-border height-100 mx-auto d-block" alt="Card image">
                </a>
            </div>
            <?php if ($profile->profile_type_id == 1): ?>
            <h4 class="card-title text-xs-center mt-1"><?= $profile->non_profit_name ?></h4>
            <?php elseif($profile->profile_type_id == 2):?>
            <h4 class="card-title text-xs-center mt-1"><?= $profile->company_name ?></h4>
            <?php else:?>
            <h4 class="card-title text-xs-center mt-1"><?= $profile->firstname . " " . $profile->lastname ?></h4>
            <?php endif;?>
            <?php if ($profile->profile_type_id != 3): ?>
                <p class="card-text text-xs-center"><?= $profile->city ?> / <?= $profile->state ?> / <?= $profile->zip_code ?> </p>
                <?php if ($profile->profile_type_id == 1): ?>
                    <p class="card-text text-xs-center">EIN: #<?= $profile->registered_ein ?></p>
                <?php endif?>
            <?php endif?>
        </div>
    </div>
</div>