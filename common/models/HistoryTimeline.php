<?php
/**
 * 文件用途：历史大事数据模型
 * 
 * 主要功能：
 * - 历史事件数据表映射
 * - 数据验证规则
 * 
 * @author 贾双双2313936
 */
namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "history_timeline".
 *
 * @property int $id
 * @property int|null $event_year
 * @property string|null $event_month_day
 * @property string|null $title
 * @property string|null $summary
 * @property string|null $content
 * @property string|null $image
 * @property string|null $image_source_url
 */
class HistoryTimeline extends ActiveRecord
{
    public static function tableName()
    {
        return 'history_timeline';
    }

    public function rules()
    {
        return [
            [['event_year'], 'integer'],
            [['content'], 'string'],
            [['event_month_day'], 'string', 'max' => 10],
            [['title'], 'string', 'max' => 255],
            [['image'], 'string', 'max' => 255],
            [['summary'], 'string', 'max' => 255],
            [['image_source_url'], 'string', 'max' => 500],
        ];
    }
}


