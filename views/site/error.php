<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div class="site-error container-fluid">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>

    <p>
        The above error occurred while the Web server was processing your request.
    </p>
    <p>
        Please contact us if you think this is a server error.
    </p>
    <p>
        <?= Html::a('Go Back', Yii::$app->request->referrer ?: Yii::$app->homeUrl, ['class' => 'btn btn-warning'])?>
    </p>

</div>
