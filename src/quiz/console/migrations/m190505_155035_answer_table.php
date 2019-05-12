<?php

use yii\db\Migration;

/**
 * Class m190505_155035_answer_table
 */
class m190505_155035_answer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('answer',[
            'id'=>$this->bigPrimaryKey(),
            'text'=>$this->string(),
            'is_right'=>$this->boolean(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190505_155035_answer_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190505_155035_answer_table cannot be reverted.\n";

        return false;
    }
    */
}
