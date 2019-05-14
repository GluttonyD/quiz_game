<?php

use yii\db\Migration;

/**
 * Class m190514_075905_dumps_tables
 */
class m190514_075905_dumps_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('tmp_user_answer',[
            'id'=>$this->bigPrimaryKey(),
            'user_id'=>$this->integer(),
            'question_id'=>$this->bigInteger(),
            'answer_id'=>$this->bigInteger(),
            'is_right'=>$this->boolean(),
            'text'=>$this->string(),
        ]);

        $this->createTable('tmp_user_question',[
            'id'=>$this->bigPrimaryKey(),
            'user_id'=>$this->integer(),
            'question_id'=>$this->bigInteger(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190514_075905_dumps_tables cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_075905_dumps_tables cannot be reverted.\n";

        return false;
    }
    */
}
