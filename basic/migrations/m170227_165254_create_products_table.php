<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m170227_165254_create_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(60)->notNull(),
            'description' => $this->string(3)->notNull(),
            'price' => $this->string(20)->notNull(),
            'image' => $this->string(200)->notNull(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('products');
    }
}
