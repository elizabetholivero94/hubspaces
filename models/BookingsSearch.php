<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Bookings;

/**
 * BookingsSearch represents the model behind the search form of `app\models\Bookings`.
 */
class BookingsSearch extends Bookings
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bookingId', 'createdBy', 'updatedBy', 'flag', 'status', 'userId', 'spaceId', 'equipmentId'], 'integer'],
            [['bookingStartDate', 'bookingEndDate', 'bookingStartTime', 'bookingEndTime', 'createdAt', 'updatedAt', 'uuid'], 'safe'],
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
        $query = Bookings::find();

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
            'bookingId' => $this->bookingId,
            'bookingStartDate' => $this->bookingStartDate,
            'bookingEndDate' => $this->bookingEndDate,
            'bookingStartTime' => $this->bookingStartTime,
            'bookingEndTime' => $this->bookingEndTime,
            'createdAt' => $this->createdAt,
            'createdBy' => $this->createdBy,
            'updatedAt' => $this->updatedAt,
            'updatedBy' => $this->updatedBy,
            'flag' => $this->flag,
            'status' => $this->status,
            'userId' => $this->userId,
            'spaceId' => $this->spaceId,
            'equipmentId' => $this->equipmentId,
        ]);

        $query->andFilterWhere(['like', 'uuid', $this->uuid]);

        return $dataProvider;
    }
}
