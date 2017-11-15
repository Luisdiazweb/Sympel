<?php
/* @var $this View */
/* @var $profile \app\models\ProfileAccount */

/* @var $user \app\models\UsersSystem */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\web\View;

?>

<?php $form = ActiveForm::begin([
        'enableAjaxValidation' => true,
        'options' => [
            'class' => 'steps-validation wizard-circle'
        ]
    ]
); ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <h3 class="my-2 card-title">Account Owner Information</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($profile, 'firstname', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($profile, 'lastname', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($user, 'email', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($user, 'username', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">
            <h3 class="my-2 card-title">Profile Information</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <fieldset class="form-group">
                <label for="file">Profile Image</label>
                <label class="custom-file center-block block">
                    <input type="file" id="file" class="custom-file-input">
                    <span class="custom-file-control"></span>
                </label>
            </fieldset>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="company-name">
                    Company Name :
                    <span class="danger">*</span>
                </label>
                <input type="text" class="form-control " id="company-name" name="company-name">
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($profile, 'website', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <?= $form->field($profile, 'address', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($profile, 'state', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($profile, 'city', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>


        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($profile, 'zip_code', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <?= $form->field($profile, 'phone', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>
    </div>


    <h3 class="my-2 card-title">Causes & areas of interest</h3>
    <p class="mb-2">Select the causes and support areas that interest you most. We will only use this information to
        improve
        your searching experience.</p>
    <div class="row mb-3">
        <div class="col-md-12">
            <?php
            $areas_list = json_decode($profile->areas_support, true);
            $profile->areas_support = $areas_list;
            ?>
            <?= $form->field($profile, 'areas_support')->checkboxList($areas_suport
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
            )->label(false); ?>
        </div>
    </div> <!--END OF CHECKBOX AREA-->
    <div class="row text-sm-center my-3">
        <?= Html::submitButton('SAVE CHANGES', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>