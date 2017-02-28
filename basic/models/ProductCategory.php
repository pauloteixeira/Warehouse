<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products_has_categories".
 *
 * @property integer $product_id
 * @property integer $category_id
 *
 * @property Categories $category
 * @property Products $product
 */
class ProductCategory extends base\ProductsHasCategories
{
	/**
     * Delete all products_has_categories that belongs the selected product_id
     * @param integer $product_id
     * @return boolean
     */
    public static function deleteByProduct( $id )
    {
    	\Yii::$app
            ->db
            ->createCommand()
            ->delete(ProductCategory::tableName(), ['product_id' => $id])
            ->execute();

        return true;
    }
}
