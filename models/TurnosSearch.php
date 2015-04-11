<?php

namespace terabyte\checktime\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Turnos;

/**
 * TurnosSearch represents the model behind the search form about `backend\models\Turnos`.
 */
class TurnosSearch extends Turnos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'horarios_id', 'turnos010', 'turnos011'], 'integer'],
            [['turnos003', 'turnos004', 'turnos005', 'turnos006', 'turnos007', 'turnos008', 'turnos009', 'turnos012', 'turnos013', 'turnos014', 'turnos015'], 'safe'],
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

        $query = Turnos::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        var_dump($this->turnos004);

        $query->andFilterWhere([
            'id' => $this->id,
            'horarios_id' => $this->horarios_id,
            'turnos004' => $this->turnos004,
            'turnos005' => $this->turnos005,
            'turnos006' => $this->turnos006,
            'turnos007' => $this->turnos007,
            'turnos008' => $this->turnos008,
            'turnos009' => $this->turnos009,
            'turnos010' => $this->turnos010,
            'turnos011' => $this->turnos011,
            'turnos012' => $this->turnos012,
            'turnos013' => $this->turnos013,
            'turnos014' => $this->turnos014,
            'turnos015' => $this->turnos015,
        ]);

        $query->andFilterWhere(['like', 'turnos003', $this->turnos003]);

        return $dataProvider;
    }
}
