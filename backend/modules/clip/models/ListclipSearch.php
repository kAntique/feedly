<?php

namespace backend\modules\clip\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\clip\models\Listclip;

/**
 * ListclipSearch represents the model behind the search form about `backend\modules\clip\models\Listclip`.
 */
class ListclipSearch extends Listclip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['playlist_id', 'clip_id'], 'integer'],
            [['datetime'], 'safe'],
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
        $query = Listclip::find();

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
            'playlist_id' => $this->playlist_id,
            'clip_id' => $this->clip_id,
            'datetime' => $this->datetime,
        ]);

        return $dataProvider;
    }
}
