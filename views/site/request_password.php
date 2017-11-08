<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>

<div class="container-fluid">

    <?php
    $form = ActiveForm::begin([
            'enableAjaxValidation' => true,
            'options' => [
                'class' => 'steps-validation wizard-circle'
            ]
        ]
    ); ?>

    <fieldset>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <?= $form->field($user, 'email', [
                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                    ])?>
                </div>
            </div>
        </div>
    </fieldset>
    <fieldset>
        <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
    </fieldset>
    <?php ActiveForm::end() ?>
</div>
