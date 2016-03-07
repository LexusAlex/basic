<?php

use yii\db\Migration;

class m160306_225823_update_columns_table_post extends Migration
{
    public function up()
    {
        $this->alterColumn('{{%post}}','created_at','INTEGER NOT NULL');
        $this->alterColumn('{{%post}}','updated_at','INTEGER NOT NULL');
    }

    public function down()
    {
        $this->alterColumn('{{%post}}','created_at','TIMESTAMP DEFAULT \'0000-00-00 00:00:00\'');
        $this->alterColumn('{{%post}}','updated_at','TIMESTAMP DEFAULT \'0000-00-00 00:00:00\'');
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
