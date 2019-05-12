<?php

use yii\db\Migration;

/**
 * Class m190507_204720_quiz_to_section
 */
class m190507_204720_quiz_to_section extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quiz_section',[
           'id'=>$this->bigPrimaryKey(),
           'quiz_id'=>$this->bigInteger(),
           'section_id'=>$this->bigInteger(),
           'question_count'=>$this->integer(),
        ]);

        $this->createIndex('qs_quiz','quiz_section','quiz_id');
        $this->createIndex('qs_section','quiz_section','section_id');
        $this->addForeignKey('qs-to-quiz','quiz_section','quiz_id','quiz','id');
        $this->addForeignKey('qs-to-section','quiz_section','section_id','section','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('qs-to-section','quiz_section');
        $this->dropForeignKey('qs-to-quiz','quiz_section');
        $this->dropIndex('qs_section','quiz_section');
        $this->dropIndex('qs_quiz','quiz_section');
        $this->dropTable('quiz_section');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_204720_quiz_to_section cannot be reverted.\n";

        return false;
    }
    */
}
