<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Attribute".
 *
 * @property integer $productId
 * @property integer $AttrCatId
 * @property integer $Value
 *
 * @property AttributeCategory $attrCat
 */
class Attribute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Attribute';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productId', 'AttrCatId', 'Value'], 'required'],
            [['productId', 'AttrCatId', 'Value'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'productId' => 'Product ID',
            'AttrCatId' => 'Attr Cat ID',
            'Value' => 'Value',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttrCat()
    {
        return $this->hasOne(AttributeCategory::className(), ['attributeCategoryId' => 'AttrCatId']);
    }
}
