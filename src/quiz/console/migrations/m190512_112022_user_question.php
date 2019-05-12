<?php

use yii\db\Migration;

/**
 * Class m190512_112022_user_question
 */
class m190512_112022_user_question extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_question',[
            'id'=>$this->bigPrimaryKey(),
            'user_id'=>$this->integer(),
            'question_id'=>$this->bigInteger(),
        ]);

        $this->addColumn('quiz','current_question',$this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_question');
        $this->dropColumn('quiz','current_question');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190512_112022_user_question cannot be reverted.\n";

        return false;
    }
    */
}
