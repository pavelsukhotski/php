<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stgencost;

/**
 * StgencostSearch represents the model behind the search form of `app\models\Stgencost`.
 */
class StgencostSearch extends Stgencost
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['workingpress_idworkingpress', 'modellist_idmodellist', 'stgencost'], 'integer'],
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
        $query = Stgencost::find();

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
            'workingpress_idworkingpress' => $this->workingpress_idworkingpress,
            'modellist_idmodellist' => $this->modellist_idmodellist,
            'stgencost' => $this->stgencost,
        ]);

        return $dataProvider;
    }
}
