<?php

namespace app\models;
use app\components\StringUtils;

class User extends base\Users implements \yii\web\IdentityInterface
{
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return String
     */
    public function getAuthKey()
    {
        return;
    }

    /**
     * @return boolean
     */
    public function validateAuthKey($authKey)
    {
        return;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public static function findByUsername($username) {
      return self::find()->where(['username'=>$username])->one();
    }

    /**
     * @return boolean
     */
    public function validatePassword($password) {
      $result = $this->password == StringUtils::hash($password);

      return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser($id)
    {
        return self::findOne($id);
    }
}
