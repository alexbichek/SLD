<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AttributeCategory;

/**
 * AttributeCategorySearch represents the model behind the search form about `app\models\AttributeCategory`.
 */
class AttributeCategorySearch extends AttributeCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attributeCategoryId'], 'integer'],
            [['attributeCategoryName'], 'safe'],
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
        $query = AttributeCategory::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'attributeCategoryId' => $this->attributeCategoryId,
        ]);

        $query->andFilterWhere(['like', 'attributeCategoryName', $this->attributeCategoryName]);

        return $dataProvider;
    }
}
