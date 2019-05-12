<?php

use yii\db\Migration;

/**
 * Class m190505_155013_quiz_table
 */
class m190505_155013_quiz_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('quiz',[
            'id'=>$this->bigPrimaryKey(),
            'name'=>$this->string(),
            'created_by'=>$this->integer(),
        ]);
        $this->createIndex('quiz_creator','quiz','created_by');
        $this->addForeignKey('quiz_to_user','quiz','created_by','user','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('quiz_to_user','quiz');
        $this->dropIndex('quiz_creator','quiz');
        $this->dropTable('quiz');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190505_155013_quiz_table cannot be reverted.\n";

        return false;
    }
    */
}
