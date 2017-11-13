<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\Url;

?>
<div class="row mt-2">
    <div class="col-md-10 offset-md-1">
        <div class="col-md-3 col-sm-12 pl-0">
            <div class="card box-shadow-1">
                <div class="card-block">
                    <div class="">
                        <a href="#" class="profile-image">
                            <img src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>"
                                 class="rounded-circle img-border height-100 mx-auto d-block" alt="Card image">
                        </a>
                    </div>
                    <h4 class="card-title text-xs-center mt-1"><?= $profile->firstname . " " . $profile->lastname ?></h4>
                    <p class="card-text text-xs-center"><?= $profile->profileType->public_name ?></p>
                    <?php if ($profile->profile_type_id != 3): ?>
                        <p class="card-text text-xs-center"><a href="<?= $profile->website ?>"
                                                               class=""><?= $profile->website ?></a></p>
                    <?php endif; ?>

                </div>
            </div>
        </div>
        <div class="col-md-9 col-sm-12 pr-0">
            <?php if ($profile->profile_type_id != 3): ?>
                <div class="card">
                    <div class="card-block">
                        <!--<h4 class="card-title">Mission</h4>-->
                        <blockquote class="blockquote blockquote-reverse">
                            <p class="mb-0"><?= $profile->mission ?></p>
                            <div class="blockquote-footer">This is the <cite title="Source Title">Mission</cite></div>
                        </blockquote>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="primary">215</h3>
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
                                        <h3 class="danger">15</h3>
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
                <div class="col-xl-4 col-lg-6 col-xs-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-block">
                                <div class="media">
                                    <div class="media-body text-xs-left">
                                        <h3 class="success">Causes & Areas</h3>
                                        <div class="tag tag-default">
                                            <a href="#">Link Tag</a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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