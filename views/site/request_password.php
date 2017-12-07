<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $user app\models\LoginForm */


use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use app\assets\AppAsset;
use yii\web\View;

?>
<div class="card-body collapse in">
    <div class="card-block">

        <?php
        $form = ActiveForm::begin([
//                'enableAjaxValidation' => true,
            ]
        ); ?>

        <fieldset>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <?= $form->field($user, 'email', [
                            'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                        ])->input('email') ?>
                    </div>
                </div>
            </div>
        </fieldset>
        <fieldset>
            <?= Html::submitButton('<i class="ft-unlock"></i>&nbsp;' . $submit_text, ['class' => 'btn btn-primary btn-md btn-block', 'name' => 'login-button']) ?>
            <?= Html::a('Go Back', Yii::$app->request->referrer ? Yii::$app->request->referrer : '/', ['class' => 'btn btn-warning btn-md btn-block']) ?>
        </fieldset>
        <?php ActiveForm::end() ?>
    </div>
</div>
