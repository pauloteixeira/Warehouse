<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $price
 * @property string $image
 *
 * @property ProductsHasCategories[] $productsHasCategories
 * @property Stocks[] $stocks
 */
class Product extends base\Products
{
    public static function getProductsByCategory( $id )
    {
    	return self::find()->select('
    									p.id, 
    									p.name, 
    									p.description,
    									p.price,
    									p.image
    								')
    	->from( self::tableName() . ' p')
    	->innerJoin( ProductCategory::tableName() . ' c', 'p.id = c.product_id')
    	->where(['c.category_id' => $id])->all();
    }
}
