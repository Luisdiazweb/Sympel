<?php

use app\assets\AppAsset;
use kartik\file\FileInput;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donations */
/* @var $form ActiveForm */

$this->title = "Request Donation - Sympel";

$this->registerCssFile('@web/app-assets/css/core/menu/menu-types/vertical-menu.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/core/menu/menu-types/vertical-overlay-menu.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/plugins/forms/wizard.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/css/plugins/forms/checkboxes-radios.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/fonts/flag-icon-css/css/flag-icon.min.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/vendors/css/extensions/pace.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile('@web/app-assets/vendors/css/bootstrap-tagsinput.css',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/checkbox-radio.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
$this->registerJsFile('@web/app-assets/vendors/js/bootstrap-tagsinput.min.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);

$this->registerJs("$(function() {
        $('.JS_tagsinput').tagsinput({
            confirmKeys: [13, 188]
        });

        $('.JS_tagsinput input').on('keypress', function(e) {
            if (e.keyCode == 13) {
                e.keyCode = 188;
                e.preventDefault();
            };
        });
    });", View::POS_END);

?>

?>

<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid form-content">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <?php $form = ActiveForm::begin([
                                        'enableAjaxValidation' => true,
                                        'options' => [
                                            'enctype' => 'multipart/form-data'
                                        ]
                                    ]); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="section-title my-3">Request a Donation </h3>
                                            <p class="mb-2">What are you in need of?</p>
                                            <div class="row mb-3">
                                                <?= $form->field($model, 'id_category')->radioList($cat_donations, [
                                                    'itemOptions' => [
                                                        'template' => '<fieldset class="col-md-4 col-sm-12 skin skin-flat">{input}<label>{label}</label></fieldset>'
                                                    ],
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        $check = $checked ? 'checked=true' : '';
                                                        return '<fieldset class="col-md-4 col-sm-12 skin skin-flat">
                                                                <label>
                                                                    <input type="radio" name="' . $name . '" value="' . $value . '" ' . $check . '/>
                                                                    ' . $label . '
                                                                </label>
                                                            </fieldset>';
                                                    }
                                                ])->label(false); ?>
                                            </div>
                                            <!--END OF CHECKBOX AREA-->
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'title')
                                                    ->textInput(['maxlength' => true])
                                                    ->label('Title of Need') ?>

                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'description')
                                                    ->textarea(['rows' => 5])
                                                    ->label("Tell us about you are in need of") ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <?= $form->field($model, 'why_need')
                                                    ->textarea(['rows' => 5])
                                                    ->label("Why? (tell us about how this will help your organization or why it would help):") ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?php
                                                $condition_items = [1 => 'New', 0 => "Used"];
                                                echo $form->field($model, 'condition_new', [
                                                    'template' => '{label}<div class="skin skin-flat">{input}{error}{hint}</div>'
                                                ])->radioList($condition_items)->label('Condition Requirement'); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'keywords')->textInput([
                                                    "data-role" => "tagsinput",
                                                    'class' => 'JS_tagsinput'
                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <?php
                                            $preview = false;
                                            if (!empty($model->images_url)) {
                                                $preview = [];
                                                foreach (json_decode($model->images_url, true) as $img) {
                                                    $preview[] = Url::toRoute([
                                                        $img
                                                    ], true);
                                                };
                                            }
                                            ?>
                                            <?php echo $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
                                                'options' => [
                                                    'accept' => 'image/*',
                                                    'multiple' => true
                                                ],
                                                'pluginOptions' => [
                                                    'initialPreview' => $preview,
                                                    'initialPreviewAsData'=>true,
                                                    'showUpload' => false,
                                                    'showRemove' => false,
                                                    'initialPreviewShowDelete' => false,
//                                                    'uploadUrl' => '/site/file-upload',
//                                                    'uploadExtraData' => [
//                                                        'album_id' => 20,
//                                                        'cat_id' => 'Nature'
//                                                    ],
                                                    'maxFileCount' => 8
                                                ]
                                            ]); ?>
                                        </div>
                                    </div>
                                    <div class="row text-sm-center my-3">
                                        <?= Html::submitButton($model->isNewRecord ? 'Preview Request' : 'Update', ['class' => 'btn btn-primary btn-lg']) ?>
                                        <?= Html::a('Cancel', Yii::$app->request->referrer ?: '/', ['class' => 'btn btn-outline-danger btn-lg']) ?>
                                    </div>
                                    <?php ActiveForm::end(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
</div>