<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "profile_account".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $profile_type_id
 * @property string $firstname
 * @property string $lastname
 * @property string $non_profit_name
 * @property string $company_name
 * @property string $title
 * @property string $address
 * @property string $state
 * @property string $city
 * @property string $zip_code
 * @property string $phone
 * @property string $registered_ein
 * @property integer $ein_verified
 * @property string $website
 * @property string $areas_support
 * @property string $mission
 * @property string $profile_picture_url
 *
 * @property ProfileType $profileType
 * @property UsersSystem $user
 */
class ProfileAccount extends \yii\db\ActiveRecord
{
    /**
     * @var UploadedFile
     */
    public $profile_picture_upload;

    const SCENARIO_SIGNUP_STEP1 = 'step1';
    const SCENARIO_SIGNUP_STEP2 = 'step2';
    const SCENARIO_SIGNUP_STEP3_3 = 'step3_individual';
    const SCENARIO_SIGNUP_STEP3_2 = 'step3_company';
    const SCENARIO_SIGNUP_STEP3_1 = 'step3_nonprofit';

    public function scenarios()
    {
        $scenarios = [
            self::SCENARIO_SIGNUP_STEP1 => ['profile_type_id'],
            self::SCENARIO_SIGNUP_STEP2 => ['firstname', 'lastname'],
            self::SCENARIO_SIGNUP_STEP3_3 => ['state', 'city', 'zip_code', 'areas_support'],
            self::SCENARIO_SIGNUP_STEP3_2 => ['company_name', 'address', 'state', 'city', 'zip_code', 'phone', 'website', 'areas_support'],
            self::SCENARIO_SIGNUP_STEP3_1 => ['non_profit_name', 'title', 'address', 'state', 'city', 'zip_code', 'phone', 'website', 'registered_ein', 'areas_support', 'mission'],
        ];

        return array_merge(parent::scenarios(), $scenarios);
    }

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
            [['profile_type_id'], 'required', 'on' => self::SCENARIO_SIGNUP_STEP1],
            [['firstname', 'lastname'], 'required', 'on' => self::SCENARIO_SIGNUP_STEP2],
            [['state', 'city', 'zip_code'], 'required', 'on' => self::SCENARIO_SIGNUP_STEP3_3],
            [['company_name', 'address', 'state', 'city', 'zip_code', 'phone', 'website'], 'required', 'on' => self::SCENARIO_SIGNUP_STEP3_2],
            [['non_profit_name', 'title', 'address', 'state', 'city', 'zip_code', 'phone', 'website', 'registered_ein'], 'required', 'on' => self::SCENARIO_SIGNUP_STEP3_1],
            [['user_id', 'profile_type_id', 'firstname', 'lastname', 'state', 'city', 'zip_code'], 'required'],
            [['user_id', 'profile_type_id', 'ein_verified'], 'integer'],
            [['areas_support', 'mission'], 'string'],
            [['firstname', 'lastname', 'non_profit_name', 'company_name', 'title', 'address', 'state', 'city', 'zip_code', 'phone', 'registered_ein'], 'string', 'max' => 128],
            [['website'], 'string', 'max' => 256],
            [['profile_picture_url'], 'string', 'max' => 512],
            [['profile_picture_upload'], 'safe'],
            [['profile_picture_upload'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
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
            'firstname' => 'First Name',
            'lastname' => 'Last Name',
            'non_profit_name' => 'Non Profit Name',
            'company_name' => 'Company Name',
            'title' => 'Your Position or Title',
            'address' => 'Address',
            'state' => 'State',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'phone' => 'Contact Number',
            'registered_ein' => 'Registered EIN#',
            'ein_verified' => 'Ein # approval.',
            'website' => 'Website',
            'areas_support' => 'Areas Support',
            'mission' => 'Mission',
            'profile_picture_url' => 'Profile Image',
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
        return $this->hasOne(UsersSystem::className(), ['id' => 'user_id']);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->profile_picture_upload = UploadedFile::getInstance($this, 'profile_picture_upload');
        if (!empty($this->profile_picture_upload)) {

            $path = 'profiles_picture/';
            if (!is_dir($path)) {
                mkdir($path, 777);
            }

            $url_file = $path . Yii::$app->security->generateRandomString() . '.' . $this->profile_picture_upload->extension;
            if ($this->profile_picture_upload->saveAs($url_file)) {
                $this->profile_picture_url = $url_file;
            }
        }

        return true;
    }
}
