<?php

use yii\db\Migration;

/**
 * Class m190513_123541_question_extra_files
 */
class m190513_123541_question_extra_files extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('extra_files',[
           'id'=>$this->bigPrimaryKey(),
           'question_id'=>$this->bigInteger(),
           'file'=>$this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('extra_files');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190513_123541_question_extra_files cannot be reverted.\n";

        return false;
    }
    */
}
