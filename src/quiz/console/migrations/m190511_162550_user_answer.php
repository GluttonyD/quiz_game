<?php

use yii\db\Migration;

/**
 * Class m190511_162550_user_answer
 */
class m190511_162550_user_answer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user_answer',[
            'id'=>$this->bigPrimaryKey(),
            'user_id'=>$this->integer(),
            'question_id'=>$this->bigInteger(),
            'answer_id'=>$this->bigInteger(),
            'is_right'=>$this->boolean(),
            'text'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user_answer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190511_162550_user_answer cannot be reverted.\n";

        return false;
    }
    */
}
