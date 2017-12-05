<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\base\Security;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $userid
 * @property string $username
 * @property string $firstname
 * @property string $lastname
 * @property string $password
 * @property string $email
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{

    public $authKey;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'firstname', 'lastname', 'password', 'email'], 'required'],
            [['username', 'firstname', 'lastname', 'password', 'email'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'userid' => 'Userid',
            'username' => 'Username',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'password' => 'Password',
            'email' => 'Email',
        ];
    }

    public function validatePassword($password)
    {   
        if ($this->password == $password)
            return true;
        else
            return false;
    }   

    public static function findIdentityByAccessToken($token, $type = null)
    {   
        throw new NotSupportedException('FindIdentityByAccessToken is not implemented.');
    }   

    public static function findIdentity($id)
    {   
        return static::findOne($id);
    }   

    public static function findByUsername($username)
    {   
        return static::findOne(['username' => $username]);
    }   

    public function getId()
    {   
        return $this->userid;
    }   

    public function getAuthKey()
    {   
        return null;
    }   

    public function validateAuthKey($authKey)
    {   
        return $this->authKey === $authKey;
    }
}
