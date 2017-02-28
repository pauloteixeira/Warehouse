<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\components\StringUtils;
use app\models\User;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {

        if (!$this->hasErrors()) {
            $user = $this->getLogin();

            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            $userLogin = $this->getLogin();

            // if user is not active
            if( $userLogin == false ){
              return false;
            }

            if( Yii::$app->user->login( $userLogin, $this->rememberMe ? 3600*24*30 : 0 ) ) {
                return true;
            }
        }

        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getLogin()
    {
        if ($this->_user === false)
        {
            $this->_user = User::findByUsername($this->username);

            if( $this->_user == null )
            {
                return false;
            }

            // verify if the user is active
            return ( !$this->_user->is_active ) ? false : $this->_user;
        }

        return $this->_user;
    }
}
