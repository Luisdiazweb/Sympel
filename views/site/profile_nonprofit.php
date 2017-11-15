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
                <?= $form->field($profile, 'non_profit_name', [
                        'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                    ]
                ); ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($profile, 'title', [
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

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <?= $form->field($profile, 'registered_ein', [
                    'template' => '<label>{label}<span class="danger">*</span></label>{input}<span class="danger">{error}</span>'
                ])->textInput([
                    'data' => [
                        'toggle' => "tooltip",
                        'trigger' => "hover",
                        'placement' => "top",
                        'title' => "To make changes, please submit your request to support",
                        'disabled' => true
                    ]
                ]); ?>
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
                <label for="projectinput8">Your Mission:</label>
                <textarea id="projectinput8" rows="5" class="form-control" name="comment" placeholder=""></textarea>
            </div>
        </div>
    </div>

    <h3 class="my-2 card-title">Causes & areas of interest</h3>
    <p class="mb-2">Select the causes and support areas that interest you most. We will only use this information to
        improve
        your ability to being found by those interested in your cause.</p>
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
                        $check = $checked ? 'checked=true' : '' ;
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
    <h3 class="my-2 card-title">Donation items & categories of interest</h3>
    <p class="mb-2">Select the types of goods you are looking for. Many donors will find non-profits at the time they
        create
        a donation. If you are interested in certain categories to support you cause, select them here. You can always
        update this at anytime.</p>
    <div class="row mb-3">
        <div class="col-md-4 col-sm-12 skin skin-flat">
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Office equipment</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Furniture</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Clothing</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Books</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Toys</label>
            </fieldset>

        </div>
        <div class="col-md-4 col-sm-12 skin skin-flat">
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Automobiles</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Tools</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Sporting Goods</label>
            </fieldset>
            <fieldset>
                <input type="checkbox" id="input-11">
                <label for="input-11">Musical Instruments</label>
            </fieldset>
            <fieldset>
                <fieldset>
                    <input type="checkbox" id="input-11">
                    <label for="input-11">General Equipment</label>
                </fieldset>

        </div>

        <div class="col-md-4 col-sm-12 skin skin-flat">

        </div>
    </div> <!--END OF CHECKBOX AREA-->
    <div class="row text-sm-center my-3">
        <?= Html::submitButton('SAVE CHANGES', ['class' => 'btn btn-primary']) ?>
    </div>
<?php ActiveForm::end() ?>