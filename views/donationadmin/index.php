<?php

use app\models\DonationsCategory;
use kartik\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DonationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donations';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donations-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_public',
            'title',
            [
                'attribute' => 'id_category',
                'value' => function ($model) {
                    return $model->idCategory->name;
                },
                'filter'=>ArrayHelper::map(DonationsCategory::find()->orderBy('name')->asArray()->all(), 'id', 'name'),
                'filterType' => GridView::FILTER_SELECT2,
                'filterWidgetOptions'=>[
                    'pluginOptions'=>['allowClear'=>true],
                ],
                'filterInputOptions'=>['placeholder'=>'Select Category'],
                'format'=>'html',
            ],
//            'id_type',
                [
                    'attribute' => 'id_user',
                    'value' => function ($model) {
                        return Html::a('View user', Url::to(['user/view', 'id' => $model->id_user]));
                    },
                    'format' => 'raw'
                ],
//             'city',
//             'zip_code',
            // 'description:ntext',
            // 'why_need:ntext',
            // 'images_url:ntext',
            // 'keywords:ntext',
            // 'condition_new',
//            'checked'
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'filterType' => GridView::FILTER_DATE_RANGE,
                'filterWidgetOptions' => [
                    'presetDropdown' => true,
                    'pluginOptions' => [
                        'format' => 'YYYY-MM-DD',
                        'separator' => ' TO ',
                        'opens' => 'left',
                    ],
                    'pluginEvents' => [
                        "apply.daterangepicker" => "function() { apply_filter('created_at') }",
                    ]
                ],
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'date',
                'filterType' => GridView::FILTER_DATE_RANGE,
                'filterWidgetOptions' => [
                    'presetDropdown' => true,
                    'pluginOptions' => [
                        'format' => 'YYYY-MM-DD',
                        'separator' => ' TO ',
                        'opens' => 'left',
                    ],
                    'pluginEvents' => [
                        "apply.daterangepicker" => "function() { apply_filter('updated_at') }",
                    ]
                ],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
<script type="text/javascript">
    function apply_filter() {

        $('.grid-view').yiiGridView('applyFilter');

    }
</script>