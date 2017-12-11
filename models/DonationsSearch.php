<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donations;

/**
 * DonationsSearch represents the model behind the search form about `app\models\Donations`.
 */
class DonationsSearch extends Donations
{
    const FROMHOME = 'home';
    const FROMPROFILEPUBLIC_DONATION = 'publicprofile_donation';
    const FROMPROFILEPUBLIC_NEEDED = 'publicprofile_needed';
    const FROMMYPROFILE = 'myprofile';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_type', 'id_user', 'condition_new', 'checked'], 'integer'],
            [['id_public', 'title', 'city', 'zip_code', 'description', 'why_need', 'images_url', 'keywords', 'created_at', 'updated_at'], 'safe'],
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
     * @param bool $isAdmin
     * @return ActiveDataProvider
     */
    public function search($params, $isAdmin = true, $from = FALSE)
    {
        $query = Donations::find();

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

        $query->andFilterWhere([
//            'checked' => $this->checked,
            'checked' => 1,
        ]);

        if ($from === self::FROMHOME) {
            $query->limit(4);
        } elseif (($from === self::FROMPROFILEPUBLIC_DONATION) || ($from === self::FROMPROFILEPUBLIC_NEEDED) || ($from === self::FROMMYPROFILE)) {
            $query->andFilterWhere(['id_user' => $this->id_user]);
            if ($from === self::FROMPROFILEPUBLIC_DONATION) {
                $query->andFilterWhere(['id_type' => 2]);
            } elseif ($from === self::FROMPROFILEPUBLIC_NEEDED) {
                $query->andFilterWhere(['id_type' => 1]);
            }
        } else {

            // grid filtering conditions
            $query->andFilterWhere([
                'id' => $this->id,
                'id_category' => $this->id_category,
                'id_type' => $this->id_type,
                'id_user' => $this->id_user,
                'condition_new' => $this->condition_new,
            ]);


            if ($isAdmin) {
                $query->andFilterWhere(['like', 'city', $this->city])
                    ->andFilterWhere(['like', 'zip_code', $this->zip_code])
                    ->andFilterWhere(['like', 'title', $this->title])
                    ->andFilterWhere(['like', 'description', $this->description]);
            } else {
                $query->andFilterWhere([
                    'or',
                    ['like', 'title', $this->title],
                    ['like', 'description', $this->title],
                ]);

                $query->andFilterWhere([
                    'or',
                    ['like', 'city', $this->city],
                    ['like', 'zip_code', $this->city],
                ]);
            }


            if (isset($this->created_at) && $this->created_at != '') {
                $date_explode = explode("TO", $this->date);
                $date1 = trim($date_explode[0]);
                $date2 = trim($date_explode[1]);
                $query->andFilterWhere(['between', 'date', $date1, $date2]);
            }
            if (isset($this->updated_at) && $this->updated_at != '') {
                $date_explode = explode("TO", $this->date);
                $date1 = trim($date_explode[0]);
                $date2 = trim($date_explode[1]);
                $query->andFilterWhere(['between', 'date', $date1, $date2]);
            }

            $query->andFilterWhere(['like', 'id_public', $this->id_public])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'why_need', $this->why_need])
//            ->andFilterWhere(['like', 'images_url', $this->images_url])
                ->andFilterWhere(['like', 'keywords', $this->keywords]);
        }

        return $dataProvider;
    }
}
