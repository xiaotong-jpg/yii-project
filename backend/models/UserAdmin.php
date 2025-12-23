<?php
/**
 * 文件用途：后端用户管理模型
 * 
 * 主要功能：
 * - 继承 User 模型
 * - 处理明文密码到哈希密码的转换
 * - 创建和更新用户时的密码处理
 * 
 * @author 贾双双2313936
 */
namespace backend\models;

use common\models\User;
class UserAdmin extends User
{
    /** @var string|null plain password (backend only) */
    public $password;

    public function rules()
    {
        return array_merge(parent::rules(), [
            [['username', 'email'], 'trim'],
            [['username', 'email'], 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['username', 'unique'],
            ['email', 'unique'],

            // create requires password; update can be empty (no change)
            ['password', 'required', 'on' => 'create'],
            ['password', 'string', 'min' => 6],
        ]);
    }

    public function attributeLabels()
    {
        return array_merge(parent::attributeLabels(), [
            'password' => '密码',
        ]);
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert && empty($this->auth_key)) {
            $this->generateAuthKey();
        }

        if (!empty($this->password)) {
            $this->setPassword($this->password);
        }

        return true;
    }
}


