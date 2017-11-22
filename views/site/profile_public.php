<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;
use yii\bootstrap\Html;

?>
<div class="row mt-2">
    <div class="col-md-10 offset-md-1">
        <?= $this->render('public_profile_partials/_profile_picture', [
            'profile' => $profile,
        ]) ?>
        <?php 
        if ($profile->profile_type_id == 1){
            echo $this->render('public_profile_partials/_information_1', [
                'profile' => $profile,
            ]);
        }elseif($profile->profile_type_id == 2){
            echo $this->render('public_profile_partials/_information_2', [
                'profile' => $profile,
            ]);
        }else{
            echo $this->render('public_profile_partials/_information_3', [
                'profile' => $profile,
            ]);
        }
        ?>
    </div>
</div>
<?php if ($profile->profile_type_id != 3):?>
    <div class="row">
        <div class="col-md-10 offset-md-1">
            <?= $this->render('public_profile_partials/_causes_areas', [
                    'profile' => $profile,
                ]);
            ?>
        </div>
</div>
<?php endif;?>
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
                                    <div class="col-xl-3 col-md-6 col-sm-12">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid"
                                                     src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>" alt="Card image cap">
                                                <div class="card-block product-card-body">
                                                    <h4 class="card-title">Name of need</h4>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid"
                                                     src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>" alt="Card image cap">
                                                <div class="card-block product-card-body">
                                                    <h4 class="card-title">Name of need</h4>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid"
                                                     src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>" alt="Card image cap">
                                                <div class="card-block product-card-body">
                                                    <h4 class="card-title">Name of need</h4>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-6 col-sm-12">
                                        <div class="card" style="">
                                            <div class="card-body">
                                                <img class="card-img-top img-fluid"
                                                     src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>" alt="Card image cap">
                                                <div class="card-block product-card-body">
                                                    <h4 class="card-title">Name of need</h4>
                                                    <p class="card-text">Some quick example text to build on the card
                                                        title and make up the bulk of the card's content.</p>
                                                    <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                            <div class="col-xl-3 col-md-6 col-sm-12">
                                                <div class="card" style="">
                                                    <div class="card-body">
                                                        <img class="card-img-top img-fluid"
                                                             src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                                             alt="Card image cap">
                                                        <div class="card-block product-card-body">
                                                            <h4 class="card-title">Name of need</h4>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of the card's
                                                                content.</p>
                                                            <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-sm-12">
                                                <div class="card" style="">
                                                    <div class="card-body">
                                                        <img class="card-img-top img-fluid"
                                                             src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                                             alt="Card image cap">
                                                        <div class="card-block product-card-body">
                                                            <h4 class="card-title">Name of need</h4>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of the card's
                                                                content.</p>
                                                            <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-sm-12">
                                                <div class="card" style="">
                                                    <div class="card-body">
                                                        <img class="card-img-top img-fluid"
                                                             src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                                             alt="Card image cap">
                                                        <div class="card-block product-card-body">
                                                            <h4 class="card-title">Name of need</h4>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of the card's
                                                                content.</p>
                                                            <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-md-6 col-sm-12">
                                                <div class="card" style="">
                                                    <div class="card-body">
                                                        <img class="card-img-top img-fluid"
                                                             src="<?= Url::to('@web/app-assets/images/carousel/05.jpg')?>"
                                                             alt="Card image cap">
                                                        <div class="card-block product-card-body">
                                                            <h4 class="card-title">Name of need</h4>
                                                            <p class="card-text">Some quick example text to build on the
                                                                card title and make up the bulk of the card's
                                                                content.</p>
                                                            <a href="#" class="btn btn-outline-success">Go somewhere</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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