<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "AttributeCategory".
 *
 * @property integer $attributeCategoryId
 * @property string $attributeCategoryName
 *
 * @property Attribute[] $attributes
 */
class AttributeCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'AttributeCategory';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attributeCategoryName'], 'required'],
            [['attributeCategoryName'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'attributeCategoryId' => 'Attribute Category ID',
            'attributeCategoryName' => 'Attribute Category Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttributes()
    {
        return $this->hasMany(Attribute::className(), ['AttrCatId' => 'attributeCategoryId']);
    }
}
