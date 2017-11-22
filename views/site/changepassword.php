<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $user app\models\LoginForm */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

?>
<div class="card-body collapse in">
    <div class="card-block">

        <?php
        $form = ActiveForm::begin([
                'enableAjaxValidation' => true,
                // 'class' => 'form-horizontal form-simple',
                // 'layout' => 'horizontal',
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
</div>