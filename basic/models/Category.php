<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 *
 * @property ProductsHasCategories[] $productsHasCategories
 */
class Category extends base\Categories
{
	/**
     * Get categories that the product_id is the seleted one
     * @param integer $product_id
     * @return \yii\db\ActiveQuery
     */
    public static function getCategoriesByProduct($id)
    {
    	return self::find()->select('c.id, c.name')->from(self::tableName() . ' c')->innerJoin(ProductCategory::tableName() . ' p', 'c.id = p.category_id')->where(['p.product_id' => $id])->all();
    }
}
