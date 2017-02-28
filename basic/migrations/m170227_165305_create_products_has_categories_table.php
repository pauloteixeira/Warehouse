<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products_has_categories`.
 */
class m170227_165305_create_products_has_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products_has_categories', [
            'product_id' => $this->integer()->notNull(),
            'category_id' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-products_has_categories',
            'products_has_categories',
            'product_id'
        );

        $this->createIndex(
            'idx-categories_has_product',
            'products_has_categories',
            'category_id'
        );

        $this->addForeignKey(
            'fk-products_has_categories',
            'products_has_categories',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-categories_has_products',
            'products_has_categories',
            'category_id',
            'categories',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products_has_categories');
    }
}
