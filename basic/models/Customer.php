<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Customer".
 *
 * @property integer $customerId
 * @property string $customerName
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $photo
 *
 * @property Comment[] $comments
 * @property Product[] $products
 * @property Order[] $orders
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customerName', 'email', 'password', 'phone'], 'required'],
            [['customerName', 'email', 'password', 'photo'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 11]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customerId' => 'Customer ID',
            'customerName' => 'Customer Name',
            'email' => 'Email',
            'password' => 'Password',
            'phone' => 'Phone',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['customerId' => 'customerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['productId' => 'productId'])->viaTable('Comment', ['customerId' => 'customerId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::className(), ['customerId' => 'customerId']);
    }
}
