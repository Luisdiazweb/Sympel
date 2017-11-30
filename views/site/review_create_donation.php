<?php
/** @var Donations $model */

use app\models\Donations;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>
<header class="masthead">
    <div class="container h-100">
        <div class="row h-100">
            <div class="col-lg-12">
                <div class="header-content">
                    <h1 class="content-header-title text-sm-center sympel-title" style="font-size: 70px; color:black;">
                        Review Donation</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="app-content content container-fluid">
    <div class="content-wrapper" style="background: #252626;">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="card box-shadow-2">
                            <div class="card-body collapse in">
                                <div class="card-block">
                                    <?php //$form = ActiveForm::begin([
                                    //                                        'enableAjaxValidation' => true,
                                    //]); ?>
                                    <div class="row">
                                        <div class="col-md-12">
<?php
//                                            echo Html::tag('p', $model->title), Html::tag('p', $model->created_at), Html::tag('p', $model->city), Html::tag('p', $model->description), Html::tag('p', $model->keywords),;
//                                            $model->images_url = json_decode($model->idType);
//                                            foreach ($model->images_url as $img) {
//                                                Html::img(Url::to([$img]));
//                                            }
//                                            ?>
                                            <?= DetailView::widget([
                                                'model' => $model,
                                                'attributes' => [
                                                    'title',
                                                    'city',
                                                    'zip_code',
                                                    [
                                                        'attribute' => 'id_category',
                                                        'value' => function ($model) {
                                                            return $model->idCategory->name;
                                                        }
                                                    ],
                                                    [
                                                        'attribute' => 'id_type',
                                                        'value' => function ($model) {
                                                            return $model->idType->name;
                                                        }
                                                    ],
                                                    'description:ntext',
//                                                    'why_need:ntext',
                                                    'images_url:ntext',
                                                    'keywords:ntext',
                                                    [
                                                        'attribute' => 'condition_new',
                                                        'value' => function ($model) {
                                                            return  boolval($model->condition_new) ? 'new' : 'used';
                                                        }
                                                    ],

                                                    'created_at',
                                                ],
                                            ]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
</div>

