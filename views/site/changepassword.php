<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="container-fluid">

    <?php
    $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
        ]
    ); ?>

    <fieldset>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($user, 'password_hash', [
                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                    ])->passwordInput(); ?>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($user, 'password_repeat', [
                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                    ])->passwordInput()->label('Re-type Password'); ?>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </fieldset>
    <?php ActiveForm::end() ?>
</div>
