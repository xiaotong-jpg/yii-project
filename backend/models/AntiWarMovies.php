<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "anti_war_movies".
 *
 * @property int $id
 * @property string $title 电影名称
 * @property string|null $cover_image 电影海报
 * @property string|null $director 导演
 * @property string|null $actors 主演
 * @property string|null $description 剧情简介
 * @property string|null $release_date 上映年份/时间
 */
class AntiWarMovies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'anti_war_movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['title', 'cover_image', 'actors'], 'string', 'max' => 255],
            [['director'], 'string', 'max' => 100],
            [['release_date'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'cover_image' => 'Cover Image',
            'director' => 'Director',
            'actors' => 'Actors',
            'description' => 'Description',
            'release_date' => 'Release Date',
        ];
    }
}
