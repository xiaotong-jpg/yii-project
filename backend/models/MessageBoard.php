<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "message_board".
 *
 * @property int $id
 * @property string $username 留言人昵称
 * @property string $content 留言内容
 * @property int|null $is_approved 审核状态:0未审,1通过
 * @property int|null $created_at
 */
class MessageBoard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'message_board';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'content'], 'required'],
            [['content'], 'string'],
            [['is_approved', 'created_at'], 'integer'],
            [['username'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'content' => 'Content',
            'is_approved' => 'Is Approved',
            'created_at' => 'Created At',
        ];
    }
}
