<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileAccountSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profile Accounts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-account-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profile Account', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'profile_type_id',
            'firstname',
            'lastname',
            // 'non_profit_name',
            // 'title',
            // 'address',
            // 'state',
            // 'city',
            // 'zip_code',
            // 'phone',
            // 'registered_ein',
            // 'website',
            // 'areas_support:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
