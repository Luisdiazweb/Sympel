<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile_account".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $profile_type_id
 * @property string $firstname
 * @property string $lastname
 * @property string $non_profit_name
 * @property string $title
 * @property string $address
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $phone
 * @property string $registered_ein
 * @property string $website
 * @property string $areas_support
 *
 * @property ProfileType $profileType
 * @property User $user
 */
class ProfileAccount extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_account';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'profile_type_id', 'firstname', 'lastname'], 'required'],
            [['user_id', 'profile_type_id'], 'integer'],
            [['areas_support'], 'string'],
            [['firstname', 'lastname', 'non_profit_name', 'title', 'address', 'state', 'city', 'zip_code', 'phone', 'registered_ein'], 'string', 'max' => 128],
            [['website'], 'string', 'max' => 256],
            [['profile_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfileType::className(), 'targetAttribute' => ['profile_type_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => UsersSystem::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'profile_type_id' => 'Profile Type ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'non_profit_name' => 'Non Profit Name',
            'title' => 'Title',
            'address' => 'Address',
            'state' => 'State',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'phone' => 'Phone',
            'registered_ein' => 'Registered Ein',
            'website' => 'Website',
            'areas_support' => 'Areas Support',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileType()
    {
        return $this->hasOne(ProfileType::className(), ['id' => 'profile_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
