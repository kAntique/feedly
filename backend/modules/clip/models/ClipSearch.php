<?php

namespace backend\modules\clip\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\clip\models\Clip;

/**
 * ClipSearch represents the model behind the search form about `backend\modules\clip\models\Clip`.
 */
class ClipSearch extends Clip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cover_img_id', 'rate_id', 'status_id', 'catagory_id'], 'integer'],
            [['title', 'subtitle', 'year', 'ep', 'description', 'tags', 'link', 'date_time', 'IPaddress'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Clip::find();

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
            'date_time' => $this->date_time,
            'cover_img_id' => $this->cover_img_id,
            'rate_id' => $this->rate_id,
            'status_id' => $this->status_id,
            'catagory_id' => $this->catagory_id,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'subtitle', $this->subtitle])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'ep', $this->ep])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'tags', $this->tags])
            ->andFilterWhere(['like', 'link', $this->link])
            ->andFilterWhere(['like', 'IPaddress', $this->IPaddress]);

        return $dataProvider;
    }
}
