<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\LoginForm */

use app\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\View;

$this->title = 'Login Page - Stack Responsive Bootstrap 4 Admin Template';

$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-overlay-menu.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-menu.css", [
    'depends' => AppAsset::className(),
    'position' => View::POS_HEAD
]);
$this->registerCssFile("app-assets/css/core/menu/menu-types/vertical-overlay-menu.css", [
    'depends' => AppAsset::className(),
    'position' => View::POS_HEAD
]);
$this->registerCssFile("app-assets/css/core/colors/palette-gradient.css", [
    'depends' => AppAsset::className(),
    'position' => View::POS_HEAD
]);
$this->registerCssFile("app-assets/css/pages/login-register.css", [
    'depends' => AppAsset::className(),
    'position' => View::POS_HEAD
]);

$this->registerJsFile("app-assets/vendors/js/forms/validation/jqBootstrapValidation.js", [
    'depends' => AppAsset::className(),
    'position' => View::POS_END
]);

$this->registerJsFile("app-assets/js/scripts/forms/form-login-register.js", [
    'depends' => AppAsset::className(),
    'position' => View::POS_END
]);
?>
<div class="card-body collapse in">
    <div class="card-block">
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'class' => 'form-horizontal form-simple',
            'layout' => 'horizontal',

            'fieldConfig' => [
                'template' => "{input}\n<div class=\"col-lg-8 text-danger\">{error}</div>",
                'labelOptions' => ['class' => 'col-lg-1 control-label'],
            ],
        ]); ?>
        <fieldset class="form-group position-relative has-icon-left mb-0">
            <?= $form->field($model, 'username', [
                'inputOptions' => [
                    'autofocus' => true,
                    'class' => 'form-control form-control-lg input-lg'
                ]
            ])->textInput()->input('text', ['placeholder' => "Your Username"])->label(false); ?>
            <div class="form-control-position">
                <i class="ft-user"></i>
            </div>
        </fieldset>
        <fieldset class="form-group position-relative has-icon-left">
            <?= $form->field($model, 'password', [
                'inputOptions' => [
                    'class' => 'form-control form-control-lg input-lg',
                    'placeholder' => "Enter Password"
                ]
            ])->passwordInput() ?>
            <div class="form-control-position">
                <i class="fa fa-key"></i>
            </div>

        </fieldset>
        <fieldset class="form-group row">
            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                <fieldset>
                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "{input}{label}\n<div class=\"col-lg-8\">{error}</div>",
                        'class' => 'chk-remember'
                    ]) ?>
                </fieldset>
            </div>
            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html"
                                                                            class="card-link">Forgot Password?</a></div>
        </fieldset>
        <?= Html::submitButton('<i class="ft-unlock"></i> Login', ['class' => 'btn btn-primary btn-lg btn-block', 'name' => 'login-button']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>
<div class="card-footer">
    <div class="">
        <p class="float-sm-left text-xs-center m-0"><a href="recover-password.html"
                                                       class="card-link">Recover password</a>
        </p>
        <p class="float-sm-right text-xs-center m-0">New to Sympel? <a
                    href="register-simple.html" class="card-link">Sign Up</a></p>
    </div>
</div>