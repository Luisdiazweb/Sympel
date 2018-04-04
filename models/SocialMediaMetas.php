<?php

namespace app\models;

use Yii;
use app\models\SocialMediaMetas;

/**
 * This is the model class for table "donations".
 *
 * @property integer $id
 * @property string $id_public
 * @property integer $id_category
 * @property integer $id_type
 * @property integer $id_user
 * @property string $title
 * @property string $city
 * @property string $state
 * @property string $zip_code
 * @property string $description
 * @property string $why_need
 * @property string $images_url
 * @property string $keywords
 * @property integer $condition_new
 * @property integer $checked
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DonationsCategory $idCategory
 * @property DonationType $idType
 * @property UsersSystem $idUser
 */

class SocialMediaMetas extends models
{

  public function headermetas()
    {
        $metatags= '<meta property="og:title" content="European Travel Destinations">';
        return $metatags;
    }

}
