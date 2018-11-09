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
<?php print $this->render('search_form', ['model' => $model]) ;?>

<section class="search-list">
    <div class="container-fluid">
            <div class="row">
            <div class="col-md-10 offset-md-1">
                <?php Pjax::begin(['id' => 'search_content']); ?>
                    <?= ListView::widget([
                        'dataProvider' => $dataProvider,
                        'itemOptions' => ['class' => 'item'],
                        'itemView' => function ($model, $key, $index, $widget) {
                            $images = empty($model->images_url) ? null : json_decode($model->images_url);
                            $img = ArrayHelper::getValue($images, 0, 'placeholder');

                            //Code to change the thumbnail to a placeholder.
                            if($img == 'placeholder'){
                                 if($model->id_type == 1){
                                $img = "sympel-assets/img/placeholder-needs.png";
                                 }else{
                                $img = "sympel-assets/img/placeholder-donations.png";
                                }
                            }


                            $img_preview = Html::img(Url::to([$img]), [
                                'class' => 'card-img-top img-fluid',
                            ]);

                            $details_url = Url::to(['itemdetails', 'id' => $model->id_public]);

                            $description = count($model->description) < 100 ? $model->description : substr($model->description, 100);
                          

                           $nameOrganization = ($model->profile_account->non_profit_name == "") ? $model->profile_account->company_name : $model->profile_account->non_profit_name ;
                         
                          //In case it's an individual
                           if($model->profile_account->profile_type_id == "3"){ $nameOrganization =  $model->profile_account->firstname . ' ' . $model->profile_account->lastname; } else {}



                            if($model->id_type == 1){
                                $icon = "<i class=\"fa fa-heart square-icon list-tag light link-secondary\"></i>";
                            }else{
                                $icon = "<i class=\"fa fa-plus square-icon list-tag light link-primary\"></i>";
                            }


                              //Path for URL's
                          $path_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";


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
                                             <a href=\"mailto:hello@sympel.com?subject=Report of inapropiate content&body=Hi, I found an inapropiate content and I want to report it.  ".$path_url.$details_url."\" class=\"card-icon\"><i class=\"fa fa-flag\" aria-hidden=\"true\"></i></a>
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