<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\BookingsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Bookings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bookings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Bookings'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'bookingId',
            'bookingStartDate',
            'bookingEndDate',
            'bookingStartTime',
            'bookingEndTime',
            //'createdAt',
            //'createdBy',
            //'updatedAt',
            //'updatedBy',
            //'flag',
            //'status',
            //'userId',
            //'spaceId',
            //'equipmentId',
            //'uuid',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Bookings $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'bookingId' => $model->bookingId]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
