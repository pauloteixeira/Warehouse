<?php

use yii\db\Migration;

class m170228_202740_add_column_quantity_stock_products_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products', 'quantity', $this->integer()->notNull()->defaultValue(0));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('products', 'quantity');
    }
}
