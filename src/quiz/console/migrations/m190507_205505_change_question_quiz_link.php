<?php

use yii\db\Migration;

/**
 * Class m190507_205505_change_question_quiz_link
 */
class m190507_205505_change_question_quiz_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('quiz_question','section_id',$this->bigInteger());
        $this->createIndex('quiz-question-section','quiz_question','section_id');
        $this->addForeignKey('quiz_question-to-section','quiz_question','section_id','section','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('quiz_question-to-section','quiz_question');
        $this->dropIndex('quiz-question-section','quiz_question');
        $this->dropColumn('quiz_question','section_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_205505_change_question_quiz_link cannot be reverted.\n";

        return false;
    }
    */
}
