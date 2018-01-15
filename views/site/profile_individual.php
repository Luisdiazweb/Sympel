<?php
/* @var $profile \app\models\ProfileAccount */

/* @var $user \app\models\UsersSystem */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin(
    [
        'enableAjaxValidation' => true,
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]
) ?>
    <div class="row mt-3 mb-1">
        <div class="col-md-12">
            <h3 class="form-section-heading mt-3 mb-1"><i class="fa fa-user"></i>Account Owner Information</h3>
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

   <div class="row mt-3 mb-1">
        <div class="col-md-12">
            <h3 class="form-section-heading my-2"><i class="fa fa-user"></i>Profile Information</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-2">
            <fieldset class="form-group  profile-image">
                <img src="<?= empty($profile->profile_picture_url) ? Url::to('@web/app-assets/images/portrait/small/avatar-s-8.png') : Url::to('@web/' . $profile->profile_picture_url) ?>"
                     class="rounded-circle img-border height-100 mx-auto d-block" alt="Card image">
                <br>
                <?= $form->field($profile, 'profile_picture_upload')->fileInput(['multiple' => false, 'accept' => 'image/*'])->label(false); ?>
            </fieldset>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <?= $form->field($profile, 'state', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
                <?= $form->field($profile, 'city', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>


        <div class="col-md-4">
            <div class="form-group">
                <?= $form->field($profile, 'zip_code', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ]); ?>
            </div>
        </div>
    </div>

    <h3 class="form-section-heading mt-3 mb-1"><i class="fa fa-heart"></i>Areas of Support</h3>
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