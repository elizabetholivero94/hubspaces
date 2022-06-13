<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bookings".
 *
 * @property int $bookingId
 * @property string $bookingStartDate
 * @property string $bookingEndDate
 * @property string $bookingStartTime
 * @property string $bookingEndTime
 * @property string|null $createdAt
 * @property int|null $createdBy
 * @property string|null $updatedAt
 * @property int|null $updatedBy
 * @property int|null $flag
 * @property int|null $status
 * @property int $userId
 * @property int $spaceId
 * @property int $equipmentId
 * @property string|null $uuid
 *
 * @property Equipments $equipment
 * @property Spaces $space
 * @property Users $user
 */
class Bookings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bookings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookingStartDate', 'bookingEndDate', 'bookingStartTime', 'bookingEndTime', 'userId', 'spaceId', 'equipmentId'], 'required'],
            [['bookingStartDate', 'bookingEndDate', 'bookingStartTime', 'bookingEndTime', 'createdAt', 'updatedAt'], 'safe'],
            [['createdBy', 'updatedBy', 'flag', 'status', 'userId', 'spaceId', 'equipmentId'], 'integer'],
            [['uuid'], 'string', 'max' => 1],
            [['equipmentId'], 'exist', 'skipOnError' => true, 'targetClass' => Equipments::className(), 'targetAttribute' => ['equipmentId' => 'equipmentId']],
            [['spaceId'], 'exist', 'skipOnError' => true, 'targetClass' => Spaces::className(), 'targetAttribute' => ['spaceId' => 'spaceId']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['userId' => 'userId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'bookingId' => Yii::t('app', 'Booking ID'),
            'bookingStartDate' => Yii::t('app', 'Booking Start Date'),
            'bookingEndDate' => Yii::t('app', 'Booking End Date'),
            'bookingStartTime' => Yii::t('app', 'Booking Start Time'),
            'bookingEndTime' => Yii::t('app', 'Booking End Time'),
            'createdAt' => Yii::t('app', 'Created At'),
            'createdBy' => Yii::t('app', 'Created By'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'flag' => Yii::t('app', 'Flag'),
            'status' => Yii::t('app', 'Status'),
            'userId' => Yii::t('app', 'User ID'),
            'spaceId' => Yii::t('app', 'Space ID'),
            'equipmentId' => Yii::t('app', 'Equipment ID'),
            'uuid' => Yii::t('app', 'Uuid'),
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipments::className(), ['equipmentId' => 'equipmentId']);
    }

    /**
     * Gets query for [[Space]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpace()
    {
        return $this->hasOne(Spaces::className(), ['spaceId' => 'spaceId']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['userId' => 'userId']);
    }
}
