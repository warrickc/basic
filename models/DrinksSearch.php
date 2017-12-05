<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Drinks;

/**
 * DrinksSearch represents the model behind the search form about `app\models\Drinks`.
 */
class DrinksSearch extends Drinks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['drinkid'], 'integer'],
            [['drinkname', 'instructions'], 'safe'],
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
        $query = Drinks::find();

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
            'drinkid' => $this->drinkid,
        ]);

        $query->andFilterWhere(['like', 'drinkname', $this->drinkname])
            ->andFilterWhere(['like', 'instructions', $this->instructions]);

        return $dataProvider;
    }
}
