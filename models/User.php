<?php

namespace app\models;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
   

    /**
     * {@inheritdoc}
     *  метод получает пользователя по ID
     */
    public static function findIdentity($id)
    {
       return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
      
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * метод – findByUsername() – возвращает пользователя по его логину
     */
    public static function findByUsername($username)
    {
       return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
       // return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        //return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * при валидации пароля мы должны его также шифровать, чтобы сравнить полученный хэш с тем, который записан в БД    
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password);
    }
}
