<?php
/** @var Donations $model */

use app\models\Donations;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

?>

<div class="container">
    <div class="row my-3">
    <div class="col-md-12 equal">
        <div class="col-md-6 col-sm-12 pl-0 profile-image-container">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="../../../app-assets/images/carousel/02.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../app-assets/images/carousel/03.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="../../../app-assets/images/carousel/01.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="icon-prev" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="icon-next" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 pr-0" style="display: flex;justify-content: center;">
            <div class="donation-info">
                <h6 class="mt-2" style="color: #00b5b8;
    font-weight: 600;text-transform: uppercase;"><?= $model->idCategory->name ?></h6>
                <h2 class="section-title"><?= $model->title ?></h2>
            
                <h5 class="profile-type">Condition: <span style="color: #f05256;
    font-weight: 600;
    text-transform: uppercase;"><?= boolval($model->condition_new) ? 'new' : 'used'; ?></span></h5>
                
                <p class="profile-links-container">
                    <i class="fa fa-map-marker map"></i>
                    <?= $model->city ?>
                </p>

                <a href="#" class="btn-primary btn-lg float-md-right">Contact</a>

            </div>
        </div>
      </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="form-section-heading my-2"><i class="fa fa-th-list"></i>Description</h3>
            <p><?= $model->description ?></p>
        </div>
    </div>
</div>




<div class="app-content content container-fluid mt-3">
    <div class="content-wrapper">
        <div class="content-body">
            <!-- Form wizard with number tabs section start -->
            <!-- Form wizard with step validation section start -->
            <section id="validation">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
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
                                                return empty($model->id_category) ? '' : $model->idCategory->name;
                                            }
                                        ],
                                        [
                                            'attribute' => 'id_type',
                                            'value' => function ($model) {
                                                return empty($model->id_type) ? '' : $model->idType->name;
                                            }
                                        ],
                                        'description:ntext',
//                                                    'why_need:ntext',
                                        [
                                            'attribute' => 'images_url',
                                            'value' => function ($model) {
                                                if (!empty($model->images_url)) {
                                                    $model->images_url = json_decode($model->images_url);
                                                    if (is_array($model->images_url)) {
                                                        $imgs = '';
                                                        foreach ($model->images_url as $img) {
                                                            $imgs .= Html::img($img, [
                                                                'class' => 'col-xs-3 img-responsive',
//                                                                            'width' => '200px',
                                                            ]);
                                                        }
                                                        return $imgs;
                                                    }
                                                }
                                            },
                                            'format' => 'raw'
                                        ],
                                        'keywords:ntext',
                                        [
                                            'attribute' => 'condition_new',
                                            'value' => function ($model) {
                                                return boolval($model->condition_new) ? 'new' : 'used';
                                            }
                                        ],

                                        'created_at',
                                    ],
                                ]) ?>
                                <?php $form = ActiveForm::begin(); ?>
                                <?= $form->field($model, 'checked')
                                    ->hiddenInput(['value' => 1])
                                    ->label(false) ?>
                                <div class="row text-sm-center my-3">
                                    <?= Html::a('Edit', Url::to(['createdonation', 'id' => $model->id_public]), ['class' => 'btn btn-warning']) ?>
                                    <?= Html::submitButton('Publish', ['class' => 'btn btn-primary']) ?>
                                </div>
                                <?php ActiveForm::end(); ?>
                            </div>
                        </div>                      
                    </div>
                </div>
            </section>
            <!-- Form wizard with step validation section end -->
        </div>
    </div>
</div>

