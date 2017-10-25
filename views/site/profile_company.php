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
<p class="mb-2">Select the causes and support areas that interest you most. We will only use this information to improve
    your searching experience.</p>
<div class="row mb-3">
    <div class="col-md-4 col-sm-12 skin skin-flat">
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Advocacy and Human Rights</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Animals</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Art's & Culture</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Board Development</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Children & Youth</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Comunity</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Computers & Technology</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Crisis Support</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Seniors</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Women</label>
        </fieldset>
    </div>
    <div class="col-md-4 col-sm-12 skin skin-flat">
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Disaster Relief</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Education & Literacy</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Emergency & Safety</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Employment</label>
        </fieldset>
        <fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Environment</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Faith Based</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Health & Medicine</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Homeless & Housing</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Sports & Recreation</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Health & Fitness</label>
            </fieldset>
    </div>

    <div class="col-md-4 col-sm-12 skin skin-flat">
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Hunger</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Immigrants & Refugees</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">International</label>
        </fieldset>
        <fieldset>
            <input type="checkbox" id="input-11">
            <label for="input-11">Justice & Legal</label>
        </fieldset>
        <fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">LGBT</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Media & Broadcasting</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Politics</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Race & Ethnicity</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Veterans & Military</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Civil Rights & Support</label>
            </fieldset>
    </div>
</div> <!--END OF CHECKBOX AREA-->
    <div class="row text-sm-center my-3">
        <?= Html::submitButton('SAVE CHANGES', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>