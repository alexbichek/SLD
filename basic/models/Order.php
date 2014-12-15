<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Order".
 *
 * @property integer $Id
 * @property integer $customerId
 * @property integer $productId
 * @property integer $quantity
 * @property string $dateTime
 *
 * @property Product $product
 * @property Customer $customer
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerId', 'productId', 'quantity'], 'required'],
            [['customerId', 'productId', 'quantity'], 'integer'],
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
