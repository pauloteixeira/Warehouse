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
    
}
