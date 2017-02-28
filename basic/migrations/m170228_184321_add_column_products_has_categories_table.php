<?php

use yii\db\Migration;

class m170228_184321_add_column_products_has_categories_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('products_has_categories', 'id', $this->primaryKey());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('products_has_categories', 'id');
    }
}
