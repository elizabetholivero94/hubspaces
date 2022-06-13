<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $userId
 * @property string $userFirstName
 * @property string $userLastName
 * @property string|null $userFullName
 * @property string $userIdentityType
 * @property int $userIdentityNumber
 * @property string $userBirthDate
 * @property int $userContactNumber
 * @property string $userEmail
 * @property int $userPassword
 * @property string|null $createdAt
 * @property int|null $createdBy
 * @property string|null $updatedAt
 * @property int|null $updatedBy
 * @property int|null $flag
 * @property int|null $status
 * @property int $userTypeId
 *
 * @property Bookings[] $bookings
 * @property UserTypes $userType
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userFirstName', 'userLastName', 'userIdentityType', 'userIdentityNumber', 'userBirthDate', 'userContactNumber', 'userEmail', 'userPassword', 'userTypeId'], 'required'],
            [['userIdentityNumber', 'userContactNumber', 'userPassword', 'createdBy', 'updatedBy', 'flag', 'status', 'userTypeId'], 'integer'],
            [['userBirthDate', 'createdAt', 'updatedAt'], 'safe'],
            [['userFirstName', 'userLastName', 'userFullName', 'userIdentityType', 'userEmail'], 'string', 'max' => 45],
            [['userTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => UserTypes::className(), 'targetAttribute' => ['userTypeId' => 'userTypeId']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'userId' => Yii::t('app', 'User ID'),
            'userFirstName' => Yii::t('app', 'User First Name'),
            'userLastName' => Yii::t('app', 'User Last Name'),
            'userFullName' => Yii::t('app', 'User Full Name'),
            'userIdentityType' => Yii::t('app', 'User Identity Type'),
            'userIdentityNumber' => Yii::t('app', 'User Identity Number'),
            'userBirthDate' => Yii::t('app', 'User Birth Date'),
            'userContactNumber' => Yii::t('app', 'User Contact Number'),
            'userEmail' => Yii::t('app', 'User Email'),
            'userPassword' => Yii::t('app', 'User Password'),
            'createdAt' => Yii::t('app', 'Created At'),
            'createdBy' => Yii::t('app', 'Created By'),
            'updatedAt' => Yii::t('app', 'Updated At'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'flag' => Yii::t('app', 'Flag'),
            'status' => Yii::t('app', 'Status'),
            'userTypeId' => Yii::t('app', 'User Type ID'),
        ];
    }

    /**
     * Gets query for [[Bookings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Bookings::className(), ['userId' => 'userId']);
    }

    /**
     * Gets query for [[UserType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserTypes::className(), ['userTypeId' => 'userTypeId']);
    }
}
