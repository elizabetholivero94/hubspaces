<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Bookings */

$this->title = $model->bookingId;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bookings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="bookings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'bookingId' => $model->bookingId], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'bookingId' => $model->bookingId], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'bookingId',
            'bookingStartDate',
            'bookingEndDate',
            'bookingStartTime',
            'bookingEndTime',
            'createdAt',
            'createdBy',
            'updatedAt',
            'updatedBy',
            'flag',
            'status',
            'userId',
            'spaceId',
            'equipmentId',
            'uuid',
        ],
    ]) ?>

</div>
