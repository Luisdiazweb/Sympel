<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profile_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $public_name
 * @property string $created_at
 *
 * @property ProfileAccount[] $profileAccounts
 */
class ProfileType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at'], 'safe'],
            [['name', 'public_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'public_name' => 'Public Name',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfileAccounts()
    {
        return $this->hasMany(ProfileAccount::className(), ['profile_type_id' => 'id']);
    }
}
