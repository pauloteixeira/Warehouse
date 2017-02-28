<?php

use yii\db\Migration;

/**
 * Handles the creation of table `users`.
 */
class m170227_165156_create_users_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'name' => $this->string(128)->notNull(),
            'email' => $this->string(128)->notNull(),
            'username' => $this->string(128)->notNull()->unique(),
            'password' => $this->string(64)->notNull(),
            'is_active' => $this->boolean(1)->notNull()->defaultValue(1),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('users');
    }
}
