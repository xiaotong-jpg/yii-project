<?php

namespace common\models;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
use Yii;

/**
 * This is the model class for table "museums".
 *
 * @property int $id
 * @property string $name 纪念馆名称
 * @property string|null $address 地址
 * @property string|null $opening_hours 开放时间
 * @property string|null $introduction 简介
 * @property string|null $photos 照片路径
 * @property string|null $website_url 官方网址
 */
class Museums extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'museums';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['introduction'], 'string'],
            [['name', 'address', 'photos', 'website_url'], 'string', 'max' => 255],
            [['opening_hours'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '纪念馆名称',
            'address' => '地址',
            'opening_hours' => '开放时间',
            'introduction' => '简介',
            'photos' => '照片路径',
            'website_url' => '官方网址',
        ];
    }
}
