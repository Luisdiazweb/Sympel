<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model_user app\models\UsersSystem */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="users-system-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model_user, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model_user, 'admin')->dropDownList([
        0 => 'No Administrator',
        1 => 'Administrator'
    ]) ?>

    <?= $form->field($model_user, 'verified_account')->dropDownList([
            0 => 'Not Verified',
            1 => 'Verified'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model_user->isNewRecord ? 'Create' : 'Update', ['class' => $model_user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
