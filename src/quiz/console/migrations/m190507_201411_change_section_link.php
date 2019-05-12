<?php

use yii\db\Migration;

/**
 * Class m190507_201411_change_section_link
 */
class m190507_201411_change_section_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('question-to-section','question');
        $this->dropIndex('question-section','question');
        $this->dropColumn('question','section_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->addColumn('question','section_id',$this->bigInteger());
        $this->createIndex('question-section','question','section_id');
        $this->addForeignKey('question-to-section','question','section_id','section','id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_201411_change_section_link cannot be reverted.\n";

        return false;
    }
    */
}
