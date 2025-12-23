<?php

namespace common\models;
/**
 * Team: NoDDL,NKU
 * Coding by wanghaoran 2311089
 */
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Museums;

/**
 * MuseumsSearch represents the model behind the search form of `common\models\Museums`.
 */
class MuseumsSearch extends Museums
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'address', 'opening_hours', 'introduction', 'photos', 'website_url'], 'safe'],
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
        $query = Museums::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'opening_hours', $this->opening_hours])
            ->andFilterWhere(['like', 'introduction', $this->introduction])
            ->andFilterWhere(['like', 'photos', $this->photos])
            ->andFilterWhere(['like', 'website_url', $this->website_url]);

        return $dataProvider;
    }
}
