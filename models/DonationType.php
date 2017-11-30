<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donation_type".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Donations[] $donations
 */
class DonationType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donation_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 128],
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDonations()
    {
        return $this->hasMany(Donations::className(), ['id_type' => 'id']);
    }
}
