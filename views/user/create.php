<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model_user app\models\UsersSystem */

$this->title = 'Create Users';
$this->params['breadcrumbs'][] = ['label' => 'Users Systems', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-system-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model_user' => $model_user,
    ]) ?>

</div>
