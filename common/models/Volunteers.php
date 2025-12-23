<?php

namespace common\models;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
use Yii;

/**
 * This is the model class for table "volunteers".
 *
 * @property int $id
 * @property string $title 标题/志愿者活动
 * @property string|null $photo_url 活动照片/头像
 * @property string|null $summary 简介
 * @property string|null $publish_date 发布时间
 * @property string|null $detail_url 原文链接
 */
class Volunteers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'volunteers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['summary'], 'string'],
            [['publish_date'], 'safe'],
            [['title', 'photo_url', 'detail_url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => '标题/志愿者活动',
            'photo_url' => '活动照片/头像',
            'summary' => '简介',
            'publish_date' => '发布时间',
            'detail_url' => '原文链接',
        ];
    }
}
