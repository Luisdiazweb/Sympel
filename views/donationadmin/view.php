<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Donations */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Donations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donations-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'id_public',
            'title',
            [
                'attribute' => 'id_category',
                'value' => function ($model) {
                    return $model->idCategory->name;
                },
            ],
//            'id_type',
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    return Html::a('View user', Url::to(['user/view', 'id' => $model->id_user]));
                },
                'format' => 'raw'
            ],
            'city',
            'zip_code',
            'description:ntext',
//            'why_need:ntext',
            [
                'attribute' => 'images_url',
                'value' => function ($model) {
                    if (!empty($model->images_url)) {
                        $model->images_url = json_decode($model->images_url);
                        if (is_array($model->images_url)) {
                            $imgs = '';
                            foreach ($model->images_url as $img) {
                                $imgs .= Html::img(Url::to([$img]), [
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
//            'checked',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
