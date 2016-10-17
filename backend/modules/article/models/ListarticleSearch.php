<?php

namespace backend\modules\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\article\models\Listarticle;

/**
 * ListarticleSearch represents the model behind the search form about `backend\modules\article\models\Listarticle`.
 */
class ListarticleSearch extends Listarticle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['playlist_id', 'article_id'], 'integer'],
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
        $query = Listarticle::find();

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
            'article_id' => $this->article_id,
            'datetime' => $this->datetime,
        ]);

        return $dataProvider;
    }
}
