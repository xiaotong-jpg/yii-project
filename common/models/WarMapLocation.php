<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "war_map_location".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $battle_name
 * @property string|null $longitude
 * @property string|null $latitude
 * @property string|null $intro
 */
class WarMapLocation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'war_map_location';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['intro'], 'string'],
            [['name', 'battle_name'], 'string', 'max' => 255],
            [['longitude', 'latitude'], 'string', 'max' => 20],
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
            'battle_name' => 'Battle Name',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'intro' => 'Intro',
        ];
    }
}
