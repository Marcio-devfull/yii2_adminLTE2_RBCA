<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class LoginForm extends Model
{
    public $email;
    public $senha;
    public $rememberMe = true;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // email and senha are both required
            [['email', 'senha'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // senha is validated by validatesenha()
            ['senha', 'validatesenha'],
        ];
    }

    /**
     * Validates the senha.
     * This method serves as the inline validation for senha.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateSenha($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !$user->validatePassword($this->senha)) {
                $this->addError($attribute, 'E-mail ou senha incorretos.');
            }
        }
    }

    /**
     * Logs in a user using the provided email and senha.
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[email]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Usuario::findByEmail($this->email);
        }

        return $this->_user;
    }
}
