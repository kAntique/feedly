<?php

namespace backend\modules\playlist\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\playlist\models\Playlist;

/**
 * PlaylistSearch represents the model behind the search form about `backend\modules\playlist\models\Playlist`.
 */
class PlaylistSearch extends Playlist
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cover_img_id', 'category_id'], 'integer'],
            [['name', 'date', 'description'], 'safe'],
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
        $query = Playlist::find();

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
            'date' => $this->date,
            'cover_img_id' => $this->cover_img_id,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
