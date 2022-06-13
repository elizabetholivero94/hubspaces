<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "equipments".
 *
 * @property int $equipmentId
 * @property string $equipmentName
 * @property string $equipmentAccessory
 * @property string|null $createdAt
 * @property int|null $createdBy
 * @property string|null $updatedAt
 * @property int|null $updatedBy
 * @property int|null $flag
 * @property int|null $status
 * @property int $equipmentTypeId
 *
 * @property Bookings[] $bookings
 * @property EquipmentTypes $equipmentType
 */
class Equipments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipmentId', 'equipmentName', 'equipmentAccessory'], 'required'],
            [['equipmentId', 'createdBy', 'updatedBy', 'flag', 'status'], 'integer'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['equipmentName', 'equipmentAccessory'], 'string', 'max' => 45],
            [['equipmentId'], 'unique'],
            [['equipmentTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => EquipmentTypes::className(), 'targetAttribute' => ['equipmentTypeId' => 'equipmentTypeId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'equipmentId' => Yii::t('app', 'Equipment ID'),
            'equipmentName' => Yii::t('app', 'Equipment Name'),
            'equipmentAccessory' => Yii::t('app', 'Equipment Accessory'),
            'createdAt' => Yii::t('app', 'Created At'),
            'createdBy' => Yii::t('app', 'Created By'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'flag' => Yii::t('app', 'Flag'),
            'status' => Yii::t('app', 'Status'),
            'equipmentTypeId' => Yii::t('app', 'Equipment Type ID'),
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['equipmentId' => 'equipmentId']);
    }

    /**
     * Gets query for [[EquipmentType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipmentType()
    {
        return $this->hasOne(EquipmentTypes::className(), ['equipmentTypeId' => 'equipmentTypeId']);
    }
}
