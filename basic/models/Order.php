<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%Order}}".
 *
 * @property integer $Id
 * @property integer $customerId
 * @property integer $productId
 * @property integer $quantity
 * @property string $dateTime
 *
 * @property Customer $customer
 * @property Product $product
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%Order}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Id', 'customerId', 'productId', 'quantity'], 'required'],
            [['Id', 'customerId', 'productId', 'quantity'], 'integer'],
            [['dateTime'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'customerId' => 'Customer ID',
            'productId' => 'Product ID',
            'quantity' => 'Quantity',
            'dateTime' => 'Date Time',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customerId' => 'customerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['productId' => 'productId']);
    }
}
