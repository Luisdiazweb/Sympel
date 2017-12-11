<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;
use yii\bootstrap\Html;

?>
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="card-block">
                <div class="media">
                    <div class="media-body text-xs-left">
                        <h3 class="success">Causes & Areas</h3>
                        <?php if (!empty($areas)):?>
                            <?php foreach ($areas as $area): ?>
                                <div class="tag tag-default">
                                    <a href="#"><?= $area ?></a>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="card-block">
                <div class="media">
                    <div class="media-body text-xs-left">
                        <h3 class="primary"><?= $summaryDonations?></h3>
                        <span>Donation Items</span>
                    </div>
                    <div class="media-right media-middle">
                        <i class="fa fa-heart primary font-large-2 float-xs-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-xs-12">
    <div class="card">
        <div class="card-body">
            <div class="card-block">
                <div class="media">
                    <div class="media-body text-xs-left">
                        <h3 class="danger"><?= $summaryNeeds?></h3>
                        <span>Needs Posted</span>
                    </div>
                    <div class="media-right media-middle">
                        <i class="fa fa-inbox danger font-large-2 float-xs-right"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>