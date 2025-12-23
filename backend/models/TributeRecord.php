<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * ActiveRecord model for the `tribute_record` table, storing tribute events.
 */
namespace backend\models;

use Yii;

/**
 * This is the model class for table "tribute_record".
 *
 * @property int $id
 * @property int $type 1=献花, 2=点烛, 3=敬酒
 * @property string|null $ip_address 用户IP
 * @property int $created_at 时间戳
 */
class TributeRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tribute_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'created_at'], 'required'],
            [['type', 'created_at'], 'integer'],
            [['ip_address'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'ip_address' => 'Ip Address',
            'created_at' => 'Created At',
        ];
    }
}
