<?php

use yii\db\Migration;

class m160316_110151_add_column_index_fkey_category_id_table_post extends Migration
{
    public function up()
    {
        $this->addColumn('{{%post}}','category_id','int');
        $this->createIndex('FK_post_category', '{{%post}}', 'category_id');
        $this->addForeignKey('FK_post_category', //name foreignKey
                            '{{%post}}', // table foreignKey
                            'category_id', // column foreignKey
                            '{{%category}}', // table ref
                            'id', // column ref
                            //RESTRICT === NO ACTION - error
                            //CASCADE - cascade delete or update
                            //SET DEFAULT - No InnoDb
                            //SET NULL - NULL
                            'SET NULL', //action DELETE
                            'CASCADE' //action UPDATE
        );
    }

    public function down()
    {

        $this->dropForeignKey('FK_post_category','{{%post}}');
        $this->dropIndex('FK_post_category','{{%post}}');
        $this->dropColumn('{{%post}}','category_id');

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
