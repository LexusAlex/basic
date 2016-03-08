<?php

use yii\db\Migration;

class m160308_174812_add_column_slug_table_post extends Migration
{
    public function up()
    {
        $this->addColumn('{{%post}}','slug','varchar(255) NOT NULL');
    }

    public function down()
    {
        $this->dropColumn('{{%post}}','slug');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
