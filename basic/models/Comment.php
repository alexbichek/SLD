<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Comment".
 *
 * @property integer $customerId
 * @property integer $productId
 * @property string $text
 * @property string $datetime
 *
 * @property Product $product
 * @property Customer $customer
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerId', 'productId', 'text', 'datetime'], 'required'],
            [['customerId', 'productId'], 'integer'],
            [['datetime'], 'safe'],
            [['text'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerId' => 'Customer ID',
            'productId' => 'Product ID',
            'text' => 'Text',
            'datetime' => 'Datetime',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customerId' => 'customerId']);
    }
}
