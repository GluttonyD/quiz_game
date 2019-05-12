<?php

use yii\db\Migration;

/**
 * Class m190505_155027_question_table
 */
class m190505_155027_question_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('question',[
            'id'=>$this->bigPrimaryKey(),
            'text'=>$this->string(),
            'addition_file'=>$this->string(),
            'type'=>$this->smallInteger()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('question');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190505_155027_question_table cannot be reverted.\n";

        return false;
    }
    */
}
