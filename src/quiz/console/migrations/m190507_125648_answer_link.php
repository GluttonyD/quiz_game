<?php

use yii\db\Migration;

/**
 * Class m190507_125648_answer_link
 */
class m190507_125648_answer_link extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('answer','question_id',$this->bigInteger());
        $this->createIndex('answer-question','answer','question_id');
        $this->addForeignKey('answer-to-question','answer','question_id','question','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('answer-to-question','answer');
        $this->dropIndex('answer-question','answer');
        $this->dropColumn('answer','question_id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_125648_answer_link cannot be reverted.\n";

        return false;
    }
    */
}
