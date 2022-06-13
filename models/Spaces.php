<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "spaces".
 *
 * @property int $spaceId
 * @property string $spaceName
 * @property int $spaceCapacity
 * @property string|null $spaceAvailability
 * @property string|null $createdAt
 * @property int|null $createdBy
 * @property string|null $updatedAt
 * @property int|null $updatedBy
 * @property int|null $flag
 * @property int|null $status
 * @property int $spaceTypeiId
 * @property int $bookingStatusId
 * @property int $cellId
 *
 * @property BookingStatus $bookingStatus
 * @property Bookings[] $bookings
 * @property Cells $cell
 * @property SpaceResources[] $spaceResources
 * @property SpaceTypes $spaceTypei
 */
class Spaces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'spaces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['spaceName', 'spaceCapacity', 'spaceTypeiId', 'bookingStatusId', 'cellId'], 'required'],
            [['spaceCapacity', 'createdBy', 'updatedBy', 'flag', 'status', 'spaceTypeiId', 'bookingStatusId', 'cellId'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['spaceName', 'spaceAvailability'], 'string', 'max' => 45],
            [['bookingStatusId'], 'exist', 'skipOnError' => true, 'targetClass' => BookingStatus::className(), 'targetAttribute' => ['bookingStatusId' => 'bookingStatusId']],
            [['cellId'], 'exist', 'skipOnError' => true, 'targetClass' => Cells::className(), 'targetAttribute' => ['cellId' => 'cellId']],
            [['spaceTypeiId'], 'exist', 'skipOnError' => true, 'targetClass' => SpaceTypes::className(), 'targetAttribute' => ['spaceTypeiId' => 'spaceTypeiId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'spaceId' => Yii::t('app', 'Space ID'),
            'spaceName' => Yii::t('app', 'Space Name'),
            'spaceCapacity' => Yii::t('app', 'Space Capacity'),
            'spaceAvailability' => Yii::t('app', 'Space Availability'),
            'createdAt' => Yii::t('app', 'Created At'),
            'createdBy' => Yii::t('app', 'Created By'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'flag' => Yii::t('app', 'Flag'),
            'status' => Yii::t('app', 'Status'),
            'spaceTypeiId' => Yii::t('app', 'Space Typei ID'),
            'bookingStatusId' => Yii::t('app', 'Booking Status ID'),
            'cellId' => Yii::t('app', 'Cell ID'),
        ];
    }

    /**
     * Gets query for [[BookingStatus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookingStatus()
    {
        return $this->hasOne(BookingStatus::className(), ['bookingStatusId' => 'bookingStatusId']);
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['spaceId' => 'spaceId']);
    }

    /**
     * Gets query for [[Cell]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCell()
    {
        return $this->hasOne(Cells::className(), ['cellId' => 'cellId']);
    }

    /**
     * Gets query for [[SpaceResources]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpaceResources()
    {
        return $this->hasMany(SpaceResources::className(), ['spaceId' => 'spaceId']);
    }

    /**
     * Gets query for [[SpaceTypei]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpaceTypei()
    {
        return $this->hasOne(SpaceTypes::className(), ['spaceTypeiId' => 'spaceTypeiId']);
    }
}
