<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "hero_person".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $life_span
 * @property string|null $avatar
 * @property string|null $biography
 * @property string|null $hometown
 */
class HeroPerson extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hero_person';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biography'], 'string'],
            [['name', 'avatar', 'hometown'], 'string', 'max' => 255],
            [['life_span'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'life_span' => 'Life Span',
            'avatar' => 'Avatar',
            'biography' => 'Biography',
            'hometown' => 'Hometown',
        ];
    }
}
