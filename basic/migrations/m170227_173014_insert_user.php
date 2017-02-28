<?php

use yii\db\Migration;
use app\components\StringUtils;

class m170227_173014_insert_user extends Migration
{
    public function up()
    {
        $this->insert('users',array(
            'name' => 'Paulo A. Teixeira',
            'email'=>'admin@admin.com',
            'username' =>'admin@admin.com',
            'password' => StringUtils::hash('password123'),
            'is_active' => 1,
        ));
    }

    public function down()
    {
        echo "m170227_173014_insert_user cannot be reverted.\n";

        return false;
    }
}
