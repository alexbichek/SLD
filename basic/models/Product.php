<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Product".
 *
 * @property integer $productId
 * @property string $productName
 * @property string $description
 * @property double $price
 * @property double $old_price
 * @property integer $quantity
 * @property integer $categoryId
 * @property string $photo
 * @property integer $rating
 *
 * @property Comment[] $comments
 * @property Customer[] $customers
 * @property Order[] $orders
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productName', 'description', 'price', 'quantity', 'categoryId'], 'required'],
            [['price', 'old_price'], 'number'],
            [['quantity', 'categoryId', 'rating'], 'integer'],
            [['productName', 'description', 'photo'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'productName' => 'Product Name',
            'description' => 'Description',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'quantity' => 'Quantity',
            'categoryId' => 'Category ID',
            'photo' => 'Photo',
            'rating' => 'Rating',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(Customer::className(), ['customerId' => 'customerId'])->viaTable('Comment', ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['productId' => 'productId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['categoryId' => 'categoryId']);
    }
}
