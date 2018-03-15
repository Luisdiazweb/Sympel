<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */

/* @var $model app\models\DonationsSearch */


use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

$this->registerCssFile("@web/app-assets/css/plugins/forms/checkboxes-radios.css",
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_HEAD
    ]);
$this->registerJsFile('@web/app-assets/js/scripts/forms/checkbox-radio.js',
    [
        'depends' => [AppAsset::className()],
        'position' => \yii\web\View::POS_END
    ]);
?>

<section class="search">
    <div class="container">
        <p>Quick Search</p>
        <?php $form = ActiveForm::begin([
            'action' => ['search'],
            'method' => 'get',
            'fieldConfig' => [
                'options' => [
                    'tag' => false,
                ],
            ],
        ]); ?>
        <div class="row equal">

            <div class="col-md-6 col-xs-12">
                <fieldset class="form-group position-relative has-icon-left">
                    <?= $form->field($model, 'title', [
                        'template' => '{input}'
                    ])->textInput([
                        'class' => 'form-control square form-control-md input-md',
                        'placeholder' => 'Search for item or donation'
                    ]) ?>
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
           <!-- <div class="col-md-1 col-xs-12 hidden-sm-down">
                <p class="form-text">near</p>
            </div> -->
            <div class="col-md-6 col-xs-12">
                <fieldset class="form-group position-relative has-icon-left">
                    <?= $form->field($model, 'city', [
                        'template' => '{input}'
                    ])->textInput([
                        'class' => 'form-control square form-control-md input-md',
                        'placeholder' => 'City or Zip'
                    ]) ?>
                    <div class="form-control-position">
                        <i class="ft-search danger font-medium-4"></i>
                    </div>
                </fieldset>
            </div>
            <!-- <div class="col-md-2 col-xs-12">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block square mr-1 mb-1']) ?>
            </div> -->
        </div>
        <div class="row">
                        <div class="col-md-6">
                <?= $form->field($model, 'id')->dropDownList($areas_support, ['prompt' => 'All areas' ]); ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'id')->dropDownList($donations_category, ['prompt' => 'All categories' ]); ?>
            </div>
        </div>
        <div class="skin skin-flat mt-2">
            <div class="d-inline hidden-sm-down mr-3">
                <input type="checkbox" class="checkbox_submit" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][1]"
                       value="1" <?= $model->id_type == 1 ? "checked" : "" ?>>
                <label class="search-radio-label"  for="DonationsSearch[id_type][1]">Show Needed items only</label>
            </div>
            <div class="hidden-md-up mr-3">
                <input type="checkbox" class="checkbox_submit" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][1]"
                       value="1" <?= $model->id_type == 1 ? "checked" : "" ?>>
                <label class="search-radio-label"  for="DonationsSearch[id_type][1]">Show Needed items only</label>
            </div>
            <div class="d-inline">
                <input type="checkbox" class="checkbox_submit" name="DonationsSearch[id_type]" id="DonationsSearch[id_type][2]"
                       value="2" <?= $model->id_type == 2 ? "checked" : "" ?>>
                <label class="search-radio-label for="DonationsSearch[id_type][2]">Show Items for Donation only</label>
            </div>

        </div>
        <div class="col-md-12 col-xs-12">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-lg square mr-1 mb-1 float-xs-right']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>
</section>

<section class="search-list">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-2">
                <form action="" class="hidden">
                    <button class="btn btn-primary btn-block square btn-lg" type="button">Show Me</button>
                    <h4 class="mt-3 mb-1 form-section">List By</h4>
                    <div class="skin skin-flat">
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Recently Listed</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Request End Date</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Most Viewed</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Least Viewed</label>
                        </fieldset>
                    </div>

                    <h4 class="mt-3 mb-1 form-section">Distance from me</h4>
                    <div class="skin skin-flat">
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">Closest</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">0 - 25 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">0 - 50 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">50 - 100 Miles</label>
                        </fieldset>
                        <fieldset>
                            <input type="checkbox" id="input-11">
                            <label for="input-11">100+ Miles</label>
                        </fieldset>
                    </div>
            </div>
            </form>
            <div class="col-md-10 offset-md-1">
                <?php Pjax::begin(); ?>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'app-assets/images/carousel/05.jpg');
                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                            $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->firstname . ' ' . $model->profile_account->lastname : $model->profile_account->non_profit_name ;
                            if($model->id_type == 1){
                                $icon = "<i class=\"fa fa-heart square-icon list-tag light link-secondary\"></i>";
                            }else{
                                $icon = "<i class=\"fa fa-plus square-icon list-tag light link-primary\"></i>";
                            }
                            $layout = "<div class=\"col-xl-4 col-md-6 col-sm-6 list-item\">
                            <div class=\"card\" style=\"\">
                                $icon
                                <div class=\"card-body\">
                                    $img_preview
                                    <div class=\"card-block product-card-body\">
                                        <h4 class=\"card-title\"><a href=\"$details_url\">$model->title</a></h4>
                                        <p class=\"card-text\"><a href='/publicprofile/".$model->user->username."'>$nameOrganization</a></p>
                                        <p class=\"card-text\">".$model->city.", ".$model->state."</p>
                                        <a href=\"#\" class=\"card-link\">".$model->idCategory->name."</a>
                                        <div class=\"card-icon-container\">
                                            <a href=\"$details_url\" class=\"card-icon\"><i class=\"fa fa-eye\"></i></a>
                                            <a href=\"mailto:".$model->user->email."\" class=\"card-icon\"><i class=\"fa fa-envelope-o\"></i></a>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>";
                            return $layout;
                        },
                        'summaryOptions' => [
                        'class' => 'col-xs-12',
                        'style' => 'margin-bottom: 20px;',
                    ],
                    ]) ?>
                    <?php Pjax::end(); ?>
                
            </div>

        </div>
    </div>
</section>