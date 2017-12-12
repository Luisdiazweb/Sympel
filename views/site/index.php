<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $modelSearchDonation app\models\DonationsSearch */

use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->title = 'Giving is Sympel - Sympel';

$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile("@web/app-assets/js/scripts/forms/checkbox-radio.js",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);


?>

<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-10">
                <div class="header-content">
                    <p class="main-quote"><span>Make your donations count</span></p>
                    <p class="main-quote"><span>by giving where it's needed</span></p>
                    <p class="quote-paragraph">sympel offers a new way to give to the need by connecting
                        <br>items for donations with churches, non-profits and
                        <br>charitable organizations.</p>
                </div>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-outline-header square btn-min-width mr-1 mb-1">How it works</button>
            </div>
        </div>
    </div>
</header>
<section class="search">
    <div class="container">
        <p>Quick Search</p>
        <?php $form = ActiveForm::begin([
            'action' => ['search'],
            'method' => 'get',
            'fieldConfig' => [
                'options' => [
                    'tag' => false,
                ],
            ],
        ]); ?>
        <div class="row equal center">
            <div class="col-xs-5">
                <fieldset class="form-group position-relative has-icon-left">
                    <?= $form->field($modelSearchDonation, 'title', [
                        'template' => '{input}'
                    ])->textInput([
                        'class' => 'form-control square form-control-xl input-xl',
                        'placeholder' => 'Search for item or donation'
                    ]) ?>
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-1">
                <p class="form-text">near</p>
            </div>
            <div class="col-xs-4">
                <fieldset class="form-group position-relative has-icon-left">
                    <?= $form->field($modelSearchDonation, 'city', [
                        'template' => '{input}'
                    ])->textInput([
                        'class' => 'form-control square form-control-xl input-xl',
                        'placeholder' => 'City or Zip'
                    ]) ?>
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
            <div class="col-xs-2">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block square btn-lg mr-1 mb-1']) ?>
            </div>
        </div>
        <div class="skin skin-flat mt-2">
            <div class="d-inline mr-3">
                <input type="checkbox" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][1]"
                       value="1" <?= $modelSearchDonation->id_type == 1 ? "checked" : "" ?>>
                <label for="input-11">Show donations posts</label>
            </div>
            <div class="d-inline">
                <input type="checkbox" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][2]"
                       value="2" <?= $modelSearchDonation->id_type == 2 ? "checked" : "" ?>>
                <label for="input-12">Show requested posts</label>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>
<section class="donations-list">
    <div class="container-fluid">
        <div class="row match-height">
            <div class="col-xl-12">
                <?php Pjax::begin(); ?>
                <?= ListView::widget([
                    'dataProvider' => $dataProvider,
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
                                <a href=\"$details_url \" class=\"btn btn-outline-success\">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>";
                        return $layout;
                    },
                    'summary' => '',
                ]) ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</section>
