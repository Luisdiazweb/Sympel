<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\DonationsSearch */


use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/checkbox-radio.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
?>

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

            <?php // echo $form->field($model, 'id') ?>

            <?php // echo $form->field($model, 'id_public') ?>

            <?php // echo $form->field($model, 'id_category') ?>

            <?php // echo $form->field($model, 'id_type') ?>

            <?php // echo $form->field($model, 'id_user') ?>



            <?php // echo $form->field($model, 'city') ?>

            <?php // echo $form->field($model, 'zip_code') ?>

            <?php // echo $form->field($model, 'description') ?>

            <?php // echo $form->field($model, 'why_need') ?>

            <?php // echo $form->field($model, 'images_url') ?>

            <?php // echo $form->field($model, 'keywords') ?>

            <?php // echo $form->field($model, 'condition_new') ?>

            <?php // echo $form->field($model, 'checked') ?>

            <?php // echo $form->field($model, 'created_at') ?>

            <?php // echo $form->field($model, 'updated_at') ?>
            <div class="col-xs-5">
                <fieldset class="form-group position-relative has-icon-left">
                    <?= $form->field($model, 'title', [
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
                    <?= $form->field($model, 'city', [
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
                       value="1" <?= $model->id_type == 1 ? "checked" : "" ?>>
                <label for="DonationsSearch[id_type][1]">Show Needed items only</label>
            </div>
            <div class="d-inline">
                <input type="checkbox" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][2]"
                       value="2" <?= $model->id_type == 2 ? "checked" : "" ?>>
                <label for="DonationsSearch[id_type][2]">Show Items for Donation only</label>
            </div>
            <?php
            //            $id_type = [1 => ' Show Needed items only', 2 => "Show Items for Donation only"];
            //            echo $form->field($model, 'id_type', [
            //                'template' => '{input}{label}'
            //            ])->radioList($id_type, [
            //                'item' => function ($index, $label, $name, $checked, $value) {
            //                    $check = $checked ? 'checked=true' : '';
            //                    return '<div class="d-inline mr-3">
            //                                <input type="radio" name="' . $name . '" value="' . $value . '" ' . $check . '/>
            //                                <label for="' . $name . '">' . $label . '</label>
            //                            </div>';
            //                }
            //            ])->label(false);
            ?>

        </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>

<section class="search-list">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2">
                <form action="" class="hidden">
                    <button class="btn btn-primary btn-block square btn-lg" type="button">Show Me</button>
                    <h4 class="mt-3 mb-1 form-section">List By</h4>
                    <div class="skin skin-flat">
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Recently Listed</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Request End Date</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Most Viewed</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Least Viewed</label>
                        </fieldset>
                    </div>

                    <h4 class="mt-3 mb-1 form-section">Distance from me</h4>
                    <div class="skin skin-flat">
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Closest</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">0 - 25 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">0 - 50 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">50 - 100 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">100+ Miles</label>
                        </fieldset>
                    </div>
            </div>
            </form>
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
                                <a href=\"$details_url\" class=\"btn btn-outline-success\">Go somewhere</a>
                            </div>
                        </div>
                    </div>
                </div>";
                        return $layout;
                    },
                    'summaryOptions' => [
                        'class' => 'col-xs-12',
                        'style' => 'margin-bottom: 20px;',
                    ],
                ]) ?>
                <?php Pjax::end(); ?>
            </div>

        </div>
    </div>
</section>