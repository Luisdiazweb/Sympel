<?php

use kartik\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-system-index">

    <h1><?= Html::encode($this->title) ?></h1>

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
                    $profile_model = \app\models\ProfileAccount::findOne(['user_id' => $model->id]);
                    if($profile_model){
                        $profile_id = $profile_model->id;

                        $options = Html::a('View', Url::to(['profile/view', 'id' => $profile_id]));
                        $options .= ' | ';
                        $options .= Html::a('Update', Url::to(['profile/update', 'id' => $profile_id]));
                        $options .= ' | ';
                        $options .= Html::a('Delete', Url::to(['profile/delete', 'id' => $profile_id]));

                        return $options;
                    }else{
                        return "User have not profile";
                    }
                },
                'format' => 'raw'
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?></div>
