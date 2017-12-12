<?php
/** @var \app\models\ProfileAccount $profile */

use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\bootstrap\Html;
use yii\widgets\ListView;

?>
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
                                            $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/05.jpg');
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
                                                    $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/05.jpg');
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