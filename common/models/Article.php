<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $cover_image
 * @property string|null $content
 * @property string|null $author
 * @property string|null $publish_date
 * @property string|null $source_url
 * @property int|null $status
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'string'],
            [['publish_date'], 'safe'],
            [['status'], 'integer'],
            [['title', 'cover_image', 'author'], 'string', 'max' => 255],
            [['source_url'], 'string', 'max' => 500],
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
            'content' => 'Content',
            'author' => 'Author',
            'publish_date' => 'Publish Date',
            'source_url' => 'Source Url',
            'status' => 'Status',
        ];
    }
}
