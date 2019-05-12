<?php

use yii\db\Migration;

/**
 * Class m190507_125902_quiz_to_question
 */
class m190507_125902_quiz_to_question extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quiz_question',[
           'id'=>$this->bigPrimaryKey(),
           'quiz_id'=>$this->bigInteger(),
           'question_id'=>$this->bigInteger()
        ]);
        $this->createIndex('quiz_link','quiz_question','quiz_id');
        $this->createIndex('question_link','quiz_question','question_id');
        $this->addForeignKey('qq_to_quiz','quiz_question','quiz_id','quiz','id');
        $this->addForeignKey('qq_to_question','quiz_question','question_id','question','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('qq_to_question','quiz_question');
        $this->dropForeignKey('qq_to_quiz','quiz_question');
        $this->dropIndex('question_link','quiz_question');
        $this->dropIndex('quiz_link','quiz_question');
        $this->dropTable('quiz_question');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_125902_quiz_to_question cannot be reverted.\n";

        return false;
    }
    */
}
