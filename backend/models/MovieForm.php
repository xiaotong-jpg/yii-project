<?php
/**
 * Team: NoDDL,NKU
 * Coding by Qu Wenmeng 2312358
 * This model defines the form fields and validation rules for movie records.
 */
namespace backend\models;

use yii\base\Model;

class MovieForm extends Model
{
    public $id;
    public $title;
    public $cover_image;
    public $director;
    public $actors;
    public $description;
    public $release_date;

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

    public function attributeLabels()
    {
        return [
            'title' => 'Title',
            'cover_image' => 'Cover Image URL',
            'director' => 'Director',
            'actors' => 'Actors',
            'description' => 'Description',
            'release_date' => 'Release Date',
        ];
    }
}
