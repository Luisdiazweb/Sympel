<?php

use yii\helpers\Html;
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
            'id',
            'username',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            'admin',
            'verified_account',
//            'authKey',
//            'accessToken',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
