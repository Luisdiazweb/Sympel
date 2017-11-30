<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donations_category".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Donations[] $donations
 */
class DonationsCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donations_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 256],
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
        return $this->hasMany(Donations::className(), ['id_category' => 'id']);
    }
}
