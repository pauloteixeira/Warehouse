<?php

use yii\db\Migration;
use app\components\StringUtils;

/**
 * Handles the creation of table `stock`.
 */
class m170227_165312_create_stock_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('stocks', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'quantity' => $this->integer()->notNull(),
            'observations' => $this->text(),
            'created_at' => $this->dateTime()->notNull()->defaultValue(StringUtils::currentSqlDate()),
        ]);

        $this->createIndex(
            'idx-stocke_has_product',
            'stocks',
            'product_id'
        );

        $this->addForeignKey(
            'fk-stock_has_product',
            'stocks',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('stock');
    }
}
