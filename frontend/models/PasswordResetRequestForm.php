<?php
/**
 * 文件用途：密码重置请求表单模型
 * 
 * 主要功能：
 * - 发送密码重置邮件
 * 
 * @author 贾双双2313936
 */
namespace frontend\models;

use Yii;
use yii\base\Model;
use common\models\User;
class PasswordResetRequestForm extends Model
{
    public $email;

    public function attributeLabels()
    {
        return [
            'email' => '邮箱',
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => '该邮箱未注册或账号未启用。'
            ],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return bool whether the email was send
     */
    public function sendEmail()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['senderEmail'] => Yii::$app->params['senderName']])
            ->setTo($this->email)
            ->setSubject('密码重置（' . Yii::$app->name . '）')
            ->send();
    }
}
