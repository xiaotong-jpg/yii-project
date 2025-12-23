<?php
/**
 * 文件用途：邮箱验证码模型
 * 
 * 主要功能：
 * - 生成6位数字验证码
 * - 验证码哈希存储和验证
 * - 验证码过期检查
 * - 验证码使用标记
 * - 防重复发送控制
 * 
 * @author 贾双双2313936
 */
namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * OTP email verification code record.
 *
 * Table: email_verify_code
 *
 * @property int $id
 * @property string $email
 * @property string $code_hash
 * @property int $expires_at
 * @property int $attempt_count
 * @property int $send_count
 * @property int|null $last_sent_at
 * @property int $created_at
 * @property int|null $used_at
 * @property string|null $ip
 */
class EmailVerifyCode extends ActiveRecord
{
    public const PURPOSE_SIGNUP = 'signup';

    public static function tableName()
    {
        return 'email_verify_code';
    }

    public function rules()
    {
        return [
            [['email', 'code_hash', 'expires_at', 'created_at'], 'required'],
            [['expires_at', 'attempt_count', 'send_count', 'last_sent_at', 'created_at', 'used_at'], 'integer'],
            [['email'], 'string', 'max' => 255],
            [['code_hash'], 'string', 'max' => 255],
            [['ip'], 'string', 'max' => 45],
            [['email'], 'email'],
        ];
    }

    public static function findByEmail(string $email): ?self
    {
        return static::findOne(['email' => $email]);
    }

    public function isExpired(int $now): bool
    {
        return $this->expires_at < $now;
    }

    public function isUsed(): bool
    {
        return !empty($this->used_at);
    }

    public function canSend(int $now, int $cooldownSeconds = 60): bool
    {
        if (!empty($this->last_sent_at) && ($now - (int)$this->last_sent_at) < $cooldownSeconds) {
            return false;
        }
        return true;
    }

    /**
     * Generates a 6-digit OTP code (string).
     */
    public static function generateCode(): string
    {
        return str_pad((string)random_int(0, 999999), 6, '0', STR_PAD_LEFT);
    }

    /**
     * Creates or updates an email code record and returns the plain OTP code.
     */
    public static function issue(string $email, ?string $ip, int $ttlSeconds = 600): array
    {
        $now = time();
        $email = trim($email);

        $record = static::findByEmail($email);
        if ($record === null) {
            $record = new static();
            $record->email = $email;
            $record->created_at = $now;
            $record->send_count = 0;
            $record->attempt_count = 0;
        }

        if (!$record->canSend($now)) {
            return ['ok' => false, 'message' => '发送过于频繁，请稍后再试。'];
        }

        $code = static::generateCode();
        $record->code_hash = Yii::$app->security->generatePasswordHash($code);
        $record->expires_at = $now + $ttlSeconds;
        $record->attempt_count = 0;
        $record->send_count = (int)$record->send_count + 1;
        $record->last_sent_at = $now;
        $record->used_at = null;
        $record->ip = $ip;

        if (!$record->save(false)) {
            return ['ok' => false, 'message' => '验证码生成失败，请稍后重试。'];
        }

        return ['ok' => true, 'code' => $code, 'expires_at' => $record->expires_at];
    }

    /**
     * Validates a user-provided code. On failure increments attempt_count.
     */
    public function validateCode(string $code, int $maxAttempts = 5): bool
    {
        $now = time();
        if ($this->isUsed() || $this->isExpired($now)) {
            return false;
        }
        if ((int)$this->attempt_count >= $maxAttempts) {
            return false;
        }

        $ok = Yii::$app->security->validatePassword($code, $this->code_hash);
        if (!$ok) {
            $this->attempt_count = (int)$this->attempt_count + 1;
            $this->save(false, ['attempt_count']);
        }
        return $ok;
    }

    public function markUsed(): void
    {
        $this->used_at = time();
        $this->save(false, ['used_at']);
    }
}


