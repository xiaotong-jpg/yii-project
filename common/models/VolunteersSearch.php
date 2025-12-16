<?php

namespace common\models;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Volunteers;

/**
 * VolunteersSearch represents the model behind the search form of `common\models\Volunteers`.
 */
class VolunteersSearch extends Volunteers
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['title', 'photo_url', 'summary', 'publish_date', 'detail_url'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Volunteers::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'publish_date' => $this->publish_date,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'photo_url', $this->photo_url])
            ->andFilterWhere(['like', 'summary', $this->summary])
            ->andFilterWhere(['like', 'detail_url', $this->detail_url]);

        return $dataProvider;
    }
}
