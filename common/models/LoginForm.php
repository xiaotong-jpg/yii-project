<?php
/**
 * 文件用途：用户登录表单模型
 * 
 * 主要功能：
 * - 支持邮箱或用户名登录
 * - 密码验证
 * - 账号状态检查（激活/禁用）
 * - 记住我功能
 * 
 * @author 贾双双2313936
 */
namespace common\models;

use Yii;
use yii\base\Model;
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;
    private $_userAnyStatus;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => '{attribute}不能为空。'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '邮箱或用户名',
            'password' => '密码',
            'rememberMe' => '记住我',
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
            $user = $this->getUserAnyStatus();
            if ($user && (int)$user->status !== User::STATUS_ACTIVE) {
                $this->addError($attribute, '账号未激活或已禁用，请先完成邮箱验证或联系管理员。');
                return;
            }
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, '用户名/邮箱或密码不正确。');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $input = trim((string)$this->username);
            if ($input !== '' && filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $this->_user = User::findOne(['email' => $input, 'status' => User::STATUS_ACTIVE]);
            } else {
                $this->_user = User::findOne(['username' => $input, 'status' => User::STATUS_ACTIVE]);
            }
        }

        return $this->_user;
    }

    /**
     * Used for better error messages (inactive account vs wrong password).
     */
    protected function getUserAnyStatus()
    {
        if ($this->_userAnyStatus === null) {
            $input = trim((string)$this->username);
            if ($input !== '' && filter_var($input, FILTER_VALIDATE_EMAIL)) {
                $this->_userAnyStatus = User::findOne(['email' => $input]);
            } else {
                $this->_userAnyStatus = User::findOne(['username' => $input]);
            }
        }
        return $this->_userAnyStatus;
    }
}
