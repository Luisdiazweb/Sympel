<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileAccount */

$this->title = $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Profile', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-account-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?php //= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'firstname',
            'lastname',
            [
                'attribute' => 'profile_type_id',
                'value' => function ($model) {
                    $type = \app\models\ProfileType::findOne($model->profile_type_id);
                    return $type->name;
                },
                'label' => 'Profile type'
            ],
            'non_profit_name',
            'title',
            'address',
            'state',
            'city',
            'zip_code',
            'phone',
            'registered_ein',
            'website',
//            'areas_support:ntext',
        ],
    ]) ?>

    <?= Html::a('Go Back', Yii::$app->request->referrer ?: '/dashboard', ['class' => 'btn btn-warning']) ?>

</div>
