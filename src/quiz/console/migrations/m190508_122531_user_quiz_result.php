<?php

use yii\db\Migration;

/**
 * Class m190508_122531_user_quiz_result
 */
class m190508_122531_user_quiz_result extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quiz_result',[
           'id'=>$this->bigPrimaryKey(),
           'user_id'=>$this->integer(),
           'quiz_id'=>$this->bigInteger(),
           'result'=>$this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('quiz_result');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190508_122531_user_quiz_result cannot be reverted.\n";

        return false;
    }
    */
}
