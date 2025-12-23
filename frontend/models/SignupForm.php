<?php
/**
 * 文件用途：用户注册表单模型
 * 
 * 主要功能：
 * - 用户注册表单验证
 * - 邮箱验证码验证逻辑
 * - 用户创建和激活
 * 
 * @author 贾双双2313936
 */
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $email_code;

    private $_codeRecord;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required', 'message' => '用户名不能为空。'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => '该用户名已被占用，请换一个。'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => '邮箱不能为空。'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => '该邮箱已被注册，请直接登录或更换邮箱。'],

            ['password', 'required', 'message' => '密码不能为空。'],
            ['password', 'string', 'min' => 6, 'tooShort' => '密码至少需要6位。'],

            ['email_code', 'trim'],
            ['email_code', 'required', 'message' => '验证码不能为空。'],
            ['email_code', 'match', 'pattern' => '/^\d{6}$/', 'message' => '请输入6位数字验证码。'],
            ['email_code', 'validateEmailCode'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'email_code' => '邮箱验证码',
        ];
    }

    public function validateEmailCode($attribute)
    {
        if ($this->hasErrors()) {
            return;
        }
        $record = \common\models\EmailVerifyCode::findByEmail($this->email);
        if (!$record) {
            $this->addError($attribute, '请先获取邮箱验证码。');
            return;
        }
        if ($record->isUsed() || $record->isExpired(time())) {
            $this->addError($attribute, '验证码已过期或已使用，请重新获取。');
            return;
        }
        if (!$record->validateCode((string)$this->email_code, 5)) {
            $this->addError($attribute, '验证码不正确。');
            return;
        }
        $this->_codeRecord = $record;
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        // OTP verified -> activate immediately
        $user->status = User::STATUS_ACTIVE;
        $user->verification_token = null;

        $ok = $user->save();
        if ($ok && $this->_codeRecord) {
            $this->_codeRecord->markUsed();
        }
        return $ok;

    }
}
