<?php

namespace terabyte\checktime\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * HorariosSearch represents the model behind the search form about `frontend\models\Horarios`.
 */
class HorariosSearch extends Horarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'safe'],
            [['nombre', 'tipo'], 'safe'],
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
        $query = Horarios::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        if ($this->id) {
            $ids = explode(',', $this->id);
            $query->andFilterWhere(['id' => $ids]);
        }

        $query->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'tipo', $this->tipo]);

        return $dataProvider;
    }
}
