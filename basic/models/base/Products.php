<?php

namespace app\models\base;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $image
 * @property integer $quantity
 *
 * @property ProductsHasCategories[] $productsHasCategories
 * @property Stocks[] $stocks
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'price', 'image'], 'required'],
            [['description'], 'string'],
            [['quantity'], 'integer'],
            [['name', 'image'], 'string', 'max' => 200],
            [['price'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'price' => 'Price',
            'image' => 'Image',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsHasCategories()
    {
        return $this->hasMany(ProductsHasCategories::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStocks()
    {
        return $this->hasMany(Stocks::className(), ['product_id' => 'id']);
    }
}
