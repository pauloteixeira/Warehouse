<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\data\Pagination;

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
    /**
     * Get products that the one of categories is the selected one.
     * @param integer $category_id
     * @return \yii\db\ActiveQuery
     */
    public static function getProductsByCategory( $id )
    {
    	$result = self::find()->select('
    									p.id, 
    									p.name, 
    									p.description,
    									p.price,
    									p.image
    								')
    	->from( self::tableName() . ' p')
    	->innerJoin( ProductCategory::tableName() . ' c', 'p.id = c.product_id')
    	->where(['c.category_id' => $id]);

        $countQuery = clone $result;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $result = $result->offSet( $pages->offset )
                            ->limit( $pages->limit )
                            ->all();

        return ['result' => $result, 'pages' => $pages];
    }

    /**
     * Get all products to show in home.
     * @param integer $category_id
     * @return \yii\db\ActiveQuery
     */
    public static function getHomeProducts()
    {
        $result = self::find();

        $countQuery = clone $result;
        $pages = new Pagination(['totalCount' => $countQuery->count()]);
        $result = $result->offSet( $pages->offset )
                            ->limit( $pages->limit )
                            ->all();

        return ['result' => $result, 'pages' => $pages];
    }
}
