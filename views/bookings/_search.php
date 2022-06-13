<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BookingsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bookings-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'bookingId') ?>

    <?= $form->field($model, 'bookingStartDate') ?>

    <?= $form->field($model, 'bookingEndDate') ?>

    <?= $form->field($model, 'bookingStartTime') ?>

    <?= $form->field($model, 'bookingEndTime') ?>

    <?php // echo $form->field($model, 'createdAt') ?>

    <?php // echo $form->field($model, 'createdBy') ?>

    <?php // echo $form->field($model, 'updatedAt') ?>

    <?php // echo $form->field($model, 'updatedBy') ?>

    <?php // echo $form->field($model, 'flag') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'userId') ?>

    <?php // echo $form->field($model, 'spaceId') ?>

    <?php // echo $form->field($model, 'equipmentId') ?>

    <?php // echo $form->field($model, 'uuid') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
