<?php

use app\models\DonationsCategory;
use kartik\file\FileInput;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Donations */
/* @var $form yii\widgets\ActiveForm */

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

<div class="donations-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->dropDownList(ArrayHelper::map(DonationsCategory::find()->orderBy('name')->asArray()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?php if ($model->idType == 'request') {
        echo $form->field($model, 'why_need')->textarea(['rows' => 6]);
    }
    ?>

    <?= $form->field($model, 'keywords')->textInput([
        "data-role" => "tagsinput",
        'class' => 'JS_tagsinput'
    ]) ?>

    <?php
    $condition_items = [1 => 'New', 0 => "Used"];
    echo $form->field($model, 'condition_new', [
        'template' => '{label}<div class="skin skin-flat">{input}{error}{hint}</div>'
    ])->radioList($condition_items); ?>

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
    echo $form->field($model, 'imageFiles[]')->widget(FileInput::classname(), [
        'options' => [
            'accept' => 'image/*',
            'multiple' => true
        ],
        'pluginOptions' => [
            'initialPreview' => $preview,
            'initialPreviewAsData' => true,
            'showUpload' => false,
            'showRemove' => false,
            'initialPreviewShowDelete' => false,
            'maxFileCount' => 8
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
