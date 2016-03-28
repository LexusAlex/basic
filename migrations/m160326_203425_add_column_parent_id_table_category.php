<?php

use yii\db\Migration;

class m160326_203425_add_column_parent_id_table_category extends Migration
{
    public function up()
    {
        $this->addColumn('{{%category}}','parent_id','int');
        $this->createIndex('idx-category-parent_id', '{{%category}}', 'parent_id');
        $this->addForeignKey('fk-category-parent', '{{%category}}', 'parent_id', '{{%category}}', 'id', 'SET NULL', 'RESTRICT');
    }

    public function down()
    {
        $this->dropForeignKey('fk-category-parent','{{%category}}');
        $this->dropIndex('idx-category-parent_id','{{%category}}');
        $this->dropColumn('{{%category}}','parent_id');
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
