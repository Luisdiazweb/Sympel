<?php 
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;
use app\assets\AppAsset;

$params = Yii::$app->request->queryParams;
?>

<?php $this->registerJs('
$("document").ready(function(){

    $("#search_form").on("pjax:end", function(){
        $.pjax.reload({container:"#search_content"});
        $(".skin-flat input").iCheck({
            checkboxClass: "icheckbox_flat-green",
            radioClass: "iradio_flat-green"
        });
        $(".checkbox_submit").change(function(){
            alert();
            $("#w0").trigger("click");
            
        })
    });
    
})
');

?>

<?php Pjax::begin(['id' => 'search_form']) ?>

<section class="search" id="search_form">
    <div class="container">
        <p>Quick Search</p>

        <?php $form = ActiveForm::begin([
            'action' => ['search'],
            'options' => ['data-pjax' => true],
            'method' => 'get',
            'fieldConfig' => [
                'options' => [
                    'tag' => false,
                    ],
            ],
        ]); ?>

        <div class="row equal">
            <div class="col-md-5 col-xs-12">
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
            <div class="col-md-12 col-xs-12 donation-category">
                <select name="DonationsSearch[id_category]">
                    <?php foreach($donations_categories as $category) :?>
                        <option value="<?php print $category->id; ?>" <?php print (isset($params['DonationsSearch']['id_category']) && $params['DonationsSearch']['id_category'] == $category->id) ? "selected" : "" ?>><?php print $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2 col-xs-12">
                <?= Html::submitButton('Search', ['class' => 'btn btn-primary btn-block square mr-1 mb-1']) ?>
            </div>
        </div>
        

        <div class="skin skin-flat mt-2">
            <div class="d-inline">
                <input type="checkbox" class="checkbox_submit" name="DonationsSearch[id_type1]" id="DonationsSearch[id_type][1]"
                    value="1" <?= isset($params['DonationsSearch']['id_type1']) ? "checked" : "" ?>>
                <label class="search-radio-label"  for="DonationsSearch[id_type][1]">Show Needed items only</label>
            </div>
            <div class="d-inline">
                <input type="checkbox" class="checkbox_submit" name="DonationsSearch[id_type2]" id="DonationsSearch[id_type][2]"
                    value="2" <?= isset($params['DonationsSearch']['id_type2']) ? "checked" : "" ?>>
                <label class="search-radio-label" for="DonationsSearch[id_type][2]">Show Items for Donation only</label>
            </div>
        </div>
    
        <?php ActiveForm::end(); ?>
    </div>
</section>
<?php Pjax::end() ?>


