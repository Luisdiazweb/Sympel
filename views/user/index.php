<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users Systems';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-system-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Users System', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'username',
            'email:email',
            [
                'label' => 'Profile',
                'value' => function ($model) {
                    $profile_model = \app\models\ProfileAccount::findOne(['user_id'=> $model->id]);
                    $profile_id = $profile_model->id;

                return Html::a('View Profile', Url::to(['profile/view', 'id' => $profile_id]));
                },
                'format' => 'raw'
            ],
//             'admin',
//             'verified_account',
//             'authKey',
//             'accessToken',
//             'created_at',
//             'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
