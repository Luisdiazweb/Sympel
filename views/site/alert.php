<div class="container-fluid">
    <?php

    use kartik\alert\Alert;
    use yii\bootstrap\Html;

    $count = count($alerts);
    if ($count) {
        foreach ($alerts as $alert) {
            echo Alert::widget($alert);
        }
    }
    ?>
    <p>
        <?= Html::a('Go Back', Yii::$app->request->referrer ?: Yii::$app->homeUrl, ['class' => 'btn btn-warning']) ?>
    </p>
</div>

