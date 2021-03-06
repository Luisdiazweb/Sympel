<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProfileAccount */

$this->title = 'Update Profile: ' . $model->user->username;
$this->params['breadcrumbs'][] = ['label' => 'Profile Accounts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="profile-account-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'areas_suport' => $areas_suport
    ]) ?>

</div>
