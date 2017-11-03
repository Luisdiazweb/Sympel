<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsersSystem */

$this->title = 'Update Users System: ' . $model_user->username;
$this->params['breadcrumbs'][] = ['label' => 'Users Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model_user->id, 'url' => ['view', 'id' => $model_user->username]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="users-system-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model_user' => $model_user,
    ]) ?>

</div>
