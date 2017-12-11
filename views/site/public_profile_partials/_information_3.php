<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;
use yii\bootstrap\Html;
?>
<div class="col-md-9 col-sm-12 pr-0">
    <div class="row">
        <?= $this->render('_causes_areas', [
            'profile' => $profile,
            'summaryNeeds' => $summaryNeeds,
            'summaryDonations' => $summaryDonations,
            'areas' => $areas,
        ]) ?>
        <!-- Contact Button -->
        <div class="col-xl-12 col-lg-3 col-xs-12 text-xl-center">
            <div class="media">
                <?= Html::mailto('Contact us', $profile->user->email, [
                    'class' => 'btn btn-success btn-doc-header',
                    'style' => 'width:50%;'
                ]) ?>
            </div>
        </div>
    </div>
</div>