<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bookings */

$this->title = Yii::t('app', 'Update Bookings: {name}', [
    'name' => $model->bookingId,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Bookings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->bookingId, 'url' => ['view', 'bookingId' => $model->bookingId]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="bookings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
