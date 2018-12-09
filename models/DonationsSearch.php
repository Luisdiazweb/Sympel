<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Donations;
use app\models\User;

/**
 * DonationsSearch represents the model behind the search form about `app\models\Donations`.
 */
class DonationsSearch extends Donations
{
    const FROMHOME = 'home';
    const FROMPROFILEPUBLIC_DONATION = 'publicprofile_donation';
    const FROMPROFILEPUBLIC_NEEDED = 'publicprofile_needed';
    const FROMMYPROFILE_DONATION = 'myprofile_donation';
    const FROMMYPROFILE_NEED = 'myprofile_need';

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_category', 'id_type','condition_new', 'checked'], 'integer'],
            [['id_public', 'title', 'city', 'id_user', 'zip_code', 'description', 'why_need', 'images_url', 'keywords', 'created_at', 'updated_at'], 'safe'],
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

        $query->joinWith('profile_account');
        $query->joinWith('user');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);


        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'checked' => 1,
        ]);

        if ($from === self::FROMHOME) {
            $query->limit(4);
        } else {
            if ($from === self::FROMPROFILEPUBLIC_DONATION) {
                $query->andFilterWhere([
                    'id' => $this->id,
                    'id_category' => $this->id_category,
                    'id_type' => 2,
                    'condition_new' => $this->condition_new,
                    'id_user' => $this->id_user
                ]);
            } else if ($from === self::FROMPROFILEPUBLIC_NEEDED) {
                $query->andFilterWhere([
                    'id' => $this->id,
                    'id_category' => $this->id_category,
                    'id_type' => 1,
                    'condition_new' => $this->condition_new,
                    'id_user' => $this->id_user
                ]);
             } else if($from === self::FROMMYPROFILE_DONATION){
                $query->andFilterWhere([
                    'id' => $this->id,
                    'id_category' => $this->id_category,
                    'id_type' => 2,
                    'condition_new' => $this->condition_new,
                    'id_user' => $this->id_user
                ]);
             } else if($from === self::FROMMYPROFILE_NEED){
                $query->andFilterWhere([
                    'id' => $this->id,
                    'id_category' => $this->id_category,
                    'id_type' => 1,
                    'condition_new' => $this->condition_new,
                    'id_user' => $this->id_user
                ]);
             }



            if ($isAdmin) {
                $query->andFilterWhere(['like', 'donations.city', $this->city])
                    ->andFilterWhere(['like', 'donations.zip_code', $this->zip_code])
                    ->andFilterWhere(['like', 'donations.title', $this->title])
                    ->andFilterWhere(['like', 'description', $this->description]);

                $query->andFilterWhere(['or', ['like' , 'profile_account.firstname', $this->id_user],
                    ['like', 'profile_account.lastname', $this->id_user] ]);

            } else {
                $query->andFilterWhere([
                    'or',
                    ['like', 'donations.title', $this->title],
                    ['like', 'description', $this->title],
                    ['like', 'user.username', $this->title],
                    ['like', 'profile_account.firstname', $this->title],
                    ['like', 'profile_account.lastname', $this->title]
                ]);

                $query->andFilterWhere([
                    'or',
                    ['like', 'donations.city', $this->city],
                    ['like', 'donations.zip_code', $this->city],
                ]);
            }


            if (isset($this->created_at) && $this->created_at != '') {

                $date_explode = explode(" - ", $this->created_at);
                $date1 = trim($date_explode[0]);
                $date2 = trim($date_explode[1]);
                $query->andFilterWhere(['between', 'created_at', $date1, $date2]);
            }

            if (isset($this->updated_at) && $this->updated_at != '') {
                $date_explode = explode(" - ", $this->updated_at);
                $date1 = trim($date_explode[0]);
                $date2 = trim($date_explode[1]);
                $query->andFilterWhere(['between', 'updated_at', $date1, $date2]);
            }
            $id_type = array();
            if(isset($params['DonationsSearch']['id_type1'])){
                $id_type[] = $params['DonationsSearch']['id_type1'];
            }

            if(isset($params['DonationsSearch']['id_type2'])){
                $id_type[] = $params['DonationsSearch']['id_type2'];
            }
            if(count($id_type)){
                $query->andFilterWhere(['id_type'=> $id_type]);
            }
            
            if(isset($this->id_category)){
                
                $query->andFilterWhere(['id_category' => $this->id_category] );
            }
            
            $query->andFilterWhere(['like', 'id_public', $this->id_public])
                ->andFilterWhere(['like', 'description', $this->description])
                ->andFilterWhere(['like', 'why_need', $this->why_need])
                ->andFilterWhere(['like', 'keywords', $this->keywords]);

        }

        return $dataProvider;
    }

    public function getDonationsByType($params, $type){
        $query = Donations::find();

        $query->joinWith('profile_account');
        $query->joinWith('user');

        $dataProvider = new ActiveDataProvider([
                'query' => $query,
        ]); 
        
        $this->load($params);

        if(!$this->validate()){
            return $dataProvider;
        }

        $query->andFilterWhere([
            'checked' => 1,
            'id_type' => $type
            
        ]);

        return $dataProvider;
    }
}
