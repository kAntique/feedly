<?php

namespace backend\modules\article\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\article\models\Article;

/**
 * ArticleSearch represents the model behind the search form about `backend\modules\article\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'rate_id', 'cover_img_id', 'category_id'], 'integer'],
            [['headline', 'content', 'date_time', 'IPaddress', 'tags'], 'safe'],
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
        $query = Article::find();

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
            'rate_id' => $this->rate_id,
            'cover_img_id' => $this->cover_img_id,

            'category_id' => $this->category_id,
        
        ]);

        $query->andFilterWhere(['like', 'headline', $this->headline])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'IPaddress', $this->IPaddress])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
