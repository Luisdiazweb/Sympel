<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\base\Security;
use yii\db\ActiveRecord;
use yii\helpers\Url;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $admin
 * @property integer $verified_account
 * @property string $authKey
 * @property string $accessToken
 * @property string $created_at
 * @property string $updated_at
 *
 * @property ProfileAccount[] $profileAccounts
 */
class UsersSystem extends ActiveRecord implements IdentityInterface
{
    public $password_repeat;
    const SCENARIO_SIGNUP = 'register';
    const SCENARIO_PASSWORD = 'recovery_pass';
    const SCENARIO_REQUEST_PASS = 'request_change_password';
    const SCENARIO_ADMIN = 'admin_form';

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    public function scenarios()
    {
        $scenarios = [
            self::SCENARIO_SIGNUP => ['username', 'password_hash', 'password_repeat', 'email'],
            self::SCENARIO_PASSWORD => ['password_hash', 'password_repeat'],
            self::SCENARIO_REQUEST_PASS => ['email'],
            self::SCENARIO_ADMIN => ['email', 'username', 'admin', 'verified_account'],
        ];

        return array_merge(parent::scenarios(), $scenarios);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password_hash', 'password_repeat', 'email'], 'required', 'on' => self::SCENARIO_SIGNUP],
            [['username', 'email'], 'required', 'on' => self::SCENARIO_ADMIN],
            [['email'], 'required', 'on' => self::SCENARIO_REQUEST_PASS],
            [['password_hash', 'password_repeat'], 'required', 'on' => self::SCENARIO_PASSWORD],
            [['admin', 'verified_account'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['username', 'password_hash', 'password_reset_token'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 100],
            ['email', 'email'],
            ['password_hash', 'match', 'pattern' => "/^.{6,16}$/", 'message' => 'Password must be of minimum 6 characters length'],
            [['authKey', 'accessToken'], 'string', 'max' => 250],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password_hash']
        ];
    }

    public static function primaryKey()
    {
        return ['id'];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password_hash' => 'Password',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->authKey;
    }

    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

    public function validatePassword($hash, $password)
    {
        return Yii::$app->getSecurity()->validatePassword($password, $hash);
    }

    public function getUrlVerifiedUser()
    {
        $id = urlencode($this->username);
        $auth = urlencode($this->authKey);
        return Url::toRoute([
            "verified-account",
            'id' => $id,
            'auth' => $auth
        ], true);
    }

    public function getUrlChangePassword()
    {
        $id = urlencode($this->password_reset_token);
        $auth = urlencode($this->authKey);
        return Url::toRoute([
            "changepassword",
            'id' => $id,
            'auth' => $auth
        ], true);
    }
}
