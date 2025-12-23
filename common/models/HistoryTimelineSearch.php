<?php
/**
 * 文件用途：历史大事搜索模型
 * 
 * 主要功能：
 * - 历史事件列表搜索
 * - 数据筛选和分页
 * 
 * @author 贾双双2313936
 */
namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HistoryTimelineSearch represents the model behind the search form of `common\models\HistoryTimeline`.
 */
class HistoryTimelineSearch extends HistoryTimeline
{
    public function rules()
    {
        return [
            [['id', 'event_year'], 'integer'],
            [['event_month_day', 'title', 'summary', 'content', 'image', 'image_source_url'], 'safe'],
        ];
    }

    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = HistoryTimeline::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'event_year' => SORT_ASC,
                    'event_month_day' => SORT_ASC,
                    'id' => SORT_ASC,
                ],
            ],
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'event_year' => $this->event_year,
        ]);

        $query->andFilterWhere(['like', 'event_month_day', $this->event_month_day])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'image_source_url', $this->image_source_url]);

        return $dataProvider;
    }
}


