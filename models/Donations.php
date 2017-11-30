<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "donations".
 *
 * @property integer $id
 * @property string $id_public
 * @property integer $id_category
 * @property integer $id_type
 * @property string $title
 * @property string $city
 * @property string $zip_code
 * @property string $description
 * @property string $why_need
 * @property string $images_url
 * @property string $keywords
 * @property integer $condition_new
 * @property integer $checked
 * @property string $created_at
 *
 * @property DonationsCategory $idCategory
 * @property DonationType $idType
 */
class Donations extends \yii\db\ActiveRecord
{

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'donations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['condition_new', 'title', 'city', 'zip_code'], 'required'],
            [['id_category', 'id_type', 'condition_new', 'checked'], 'integer'],
            [['description', 'why_need', 'images_url', 'keywords'], 'string'],
            [['id_public'], 'string', 'max' => 8],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['title', 'city', 'zip_code'], 'string', 'max' => 256],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => DonationsCategory::className(), 'targetAttribute' => ['id_category' => 'id']],
            [['id_type'], 'exist', 'skipOnError' => true, 'targetClass' => DonationType::className(), 'targetAttribute' => ['id_type' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_public' => 'Id Public',
            'id_category' => 'Category',
            'id_type' => 'Type',
            'title' => 'Title',
            'city' => 'City',
            'zip_code' => 'Zip Code',
            'description' => 'Description',
            'why_need' => 'Why Need',
            'images_url' => 'Images',
            'keywords' => 'Keywords',
            'condition_new' => 'Condition',
            'checked' => 'Checked',
            'imageFiles'=> 'Add images'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategory()
    {
        return $this->hasOne(DonationsCategory::className(), ['id' => 'id_category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdType()
    {
        return $this->hasOne(DonationType::className(), ['id' => 'id_type']);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }
        $this->id_public = Yii::$app->security->generateRandomString(8);
        $this->imageFiles = UploadedFile::getInstances($this, 'imageFiles');
        if (!empty($this->imageFiles)) {
            $array_iamges = [];
            /** @var UploadedFile $file */
            $path = 'donation_images/';
            if (!is_dir($path)) {
                mkdir($path, 0777);
            }

            foreach ($this->imageFiles as $file) {
                $url_file = $path . Yii::$app->security->generateRandomString() . '.' . $file->extension;
                if ($file->saveAs($url_file)) {
                    $array_iamges[] = $url_file;
                }
            }
            $this->images_url  = json_encode($array_iamges);
        }
        return true;
    }
}
