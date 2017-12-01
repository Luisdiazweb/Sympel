<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSystem */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-system-view">

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
            'username',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            [
                'label' => 'Profile',
                'value' => function ($model) {
                    $profile_model = \app\models\ProfileAccount::findOne(['user_id' => $model->id]);
                    if($profile_model){
                        $profile_id = $profile_model->id;

                        return Html::a('View Profile', Url::to(['profile/view', 'id' => $profile_id]));
                    }else{
                        return "User have not profile";
                    }
                },
                'format' => 'raw'
            ],
            [
                'attribute' => 'admin',
                'value' => function ($model) {
                    return $model->admin? 'Yes': 'No';
                }
            ],
            [
                'attribute' => 'verified_account',
                'value' => function ($model) {
                    return $model->verified_account? 'Yes': 'No';
                }
            ],
//            'authKey',
//            'accessToken',
            'created_at',
            'updated_at',
        ],
    ]) ?>
    <?= Html::a('Go Back', Yii::$app->request->referrer ?: '/dashboard', ['class' => 'btn btn-warning']) ?>

</div>
