<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileAccount */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-account-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model->user, 'username')->textInput() ?>

    <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model->profileType, 'name')->textInput()->label('Profile type') ?>

    <?php if ($model->profile_type_id == 1): ?><?= $form->field($model, 'non_profit_name')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1): ?><?= $form->field($model, 'company_name')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1): ?><?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1 || $model->profile_type_id == 2): ?><?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?php if ($model->profile_type_id == 1 || $model->profile_type_id == 2): ?><?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1): ?><?= $form->field($model, 'registered_ein')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1 || $model->profile_type_id == 2): ?><?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?><?php endif; ?>

    <?php if ($model->profile_type_id == 1 || $model->profile_type_id == 2): ?><?= $form->field($model, 'mission')->textarea(['rows' => 6]) ?><?php endif; ?>

    <?php
    $areas_list = json_decode($model->areas_support, true);
    $model->areas_support = $areas_list;
    ?>
    <?= $form->field($model, 'areas_support')->checkboxList($areas_suport
        , [
            'itemOptions' => [
                'template' => '<fieldset class="col-md-4 col-sm-12 skin skin-flat">{input}<label>{label}</label></fieldset>'
            ],
            'item' => function ($index, $label, $name, $checked, $value) {
                $check = $checked ? 'checked=true' : '';
                return '<fieldset class="col-md-4 col-sm-12 skin skin-flat">
                                                                <label>
                                                                    <input type="checkbox" name="' . $name . '" value="' . $value . '" ' . $check . '/>
                                                                    ' . $label . '
                                                                </label>
                                                            </fieldset>';
            }
        ]
    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
