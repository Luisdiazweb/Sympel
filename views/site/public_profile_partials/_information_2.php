<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;
use yii\bootstrap\Html;

?>
<div class="col-md-9 col-sm-12 pr-0">
                <div class="card">
                    <div class="card-block">
                        <!--<h4 class="card-title">Mission</h4>-->
                        <blockquote class="blockquote blockquote-reverse">
                            <p class="mb-0" style="max-height:50px; overflow-y: scroll;"><?= $profile->mission ?></p>
                            <div class="blockquote-footer">This is the <cite title="Source Title">Mission</cite></div>
                        </blockquote>
                    </div>
                </div>
            </div>
            <!-- Contact Button -->
            <!-- Contact Button -->
            <div class="col-xl-8 col-lg-3 col-xs-12 text-xl-center">
                <div class="media">
                <?= Html::mailto('Contact us', $profile->user->email, [
                    'class' => 'btn btn-success btn-doc-header',
                    'style' => 'width:50%;'
                ]) ?>
                </div>
            </div>