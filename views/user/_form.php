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

    <?= $form->field($model_user, 'admin')->checkbox() ?>

    <?= $form->field($model_user, 'verified_account')->textInput() ?>

    <?= $form->field($model_user, 'created_at')->textInput() ?>

    <?= $form->field($model_user, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model_user->isNewRecord ? 'Create' : 'Update', ['class' => $model_user->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
