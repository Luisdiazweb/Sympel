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
                [
                    'attribute' => 'id_user',
                    'value' => function ($model) {
                        return Html::a('View user', Url::to(['user/view', 'id' => $model->id_user]));
                    },
                    'format' => 'raw'
                ],
            [
                'attribute' => 'created_at',
                'format' => 'date',
                'filterType' => GridView::FILTER_DATE_RANGE,
                'filterWidgetOptions' => [
                    'presetDropdown' => true,
                    'pluginOptions' => [
                        'format' => 'YYYY-MM-DD',
                        'separator' => ' - ',
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
                        'separator' => ' - ',
                        'opens' => 'left',
                    ],
                    'pluginEvents' => [
                        "apply.daterangepicker" => "function() { apply_filter('updated_at') }",
                    ]
                ],
            ],
            [
                'label' => 'Actions',
                'value' => function ($model) {
                    $options = Html::a('Update', Url::to(['donationadmin/update', 'id' => $model->id]), ['class' => 'btn btn-primary']);
                    $options .= Html::a('Delete', Url::to(['donationadmin/delete', 'id' => $model->id]), ['class' => 'btn btn-danger']);
                    return $options;
                },
                'format' => 'raw'
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