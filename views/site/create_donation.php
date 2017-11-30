<?php

use app\assets\AppAsset;
use kartik\file\FileInput;
use yii\bootstrap\Html;
use yii\web\View;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donations */
/* @var $form ActiveForm */

$this->title = "Create Donation - Sympel";

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

?>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="header-content">
                    <h1 class="content-header-title text-sm-center sympel-title" style="font-size: 70px; color:black;">
                        Create Donation</h1>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<div class="app-content content container-fluid">
    <div class="content-wrapper" style="background: #252626;">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card box-shadow-2">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <?php $form = ActiveForm::begin([
                                        'enableAjaxValidation' => true,
                                    ]); ?>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="my-2 card-title">Kind of Donation</h3>
                                            <p class="mb-2">What kind of donation is this?</p>
                                            <div class="row mb-3">
                                                <?php //var_dump($cat_donations);?>
                                                <?= $form->field($model, 'id_category')->radioList($cat_donations, [
                                                    'itemOptions' => [
                                                        'template' => '<fieldset class="col-md-4 col-sm-12 skin skin-flat">{input}<label>{label}</label></fieldset>'
                                                    ],
                                                    'item' => function ($index, $label, $name, $checked, $value) {
                                                        return '<fieldset class="col-md-4 col-sm-12 skin skin-flat">
                                                                <label>
                                                                    <input type="radio" name="' . $name . '" value="' . $value . '" />
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
                                                    ->label('Title of Post') ?>

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
                                                    ->label("Tell us about this donation") ?>
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
                                                ])->radioList($condition_items, [
//                                                    'item' => function ($index, $label, $name, $checked, $value) {
//                                                        $return = '<div class="d-inline';
//                                                        $return .= '<label class="control-label">';
//                                                        $return .= '<input type="radio" name="' . $name . '" value="' . $value . '>';
//                                                        $return .= $label . '</label>';
//                                                        $return .= '</div>';
//                                                        return $return;
//                                                    }
                                                ]); ?>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <?= $form->field($model, 'keywords')->textInput([
                                                    "data-role" => "tagsinput"
                                                ]) ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <!--                                            <p>Add images:</p>-->
                                            <!--                                            <button id="select-files" class="btn btn-primary mb-1"><i-->
                                            <!--                                                        class="icon-file2"></i> Click me to select files-->
                                            <!--                                            </button>-->
                                            <!--                                            <form action="#" class="dropzone" id="dpz-btn-select-files">-->
                                            <!--                                                <input type="file" name="file" class="btn btn-primary mb-1" />-->
                                            <!--                                            </form>-->
                                            <?= $form->field($model, 'imageFiles')->fileInput(['multiple' => true, 'accept' => 'image/*']); ?>

                                            <?php //echo $form->field($model, 'imageFiles')->widget(FileInput::classname(), [
//                                                'options' => [
//                                                    'accept' => 'image/*',
//                                                    'multiple' => true
//                                                ],
//                                                'pluginOptions' => [
//                                                    'uploadUrl' => '/site/file-upload',
//                                                    'uploadExtraData' => [
//                                                        'album_id' => 20,
//                                                        'cat_id' => 'Nature'
//                                                    ],
//                                                    'maxFileCount' => 10
//                                                ]
                                            //]); ?>
                                        </div>
                                    </div>
                                    <div class="row text-sm-center my-3">
                                        <?= Html::submitButton('PREVIEW POST', ['class' => 'btn btn-primary']) ?>
                                        <button type="button" class="btn btn-outline-danger">CANCEL</button>
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