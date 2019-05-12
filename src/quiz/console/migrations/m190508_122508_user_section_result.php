<?php

use yii\db\Migration;

/**
 * Class m190508_122508_user_section_result
 */
class m190508_122508_user_section_result extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('section_result',[
            'id'=>$this->bigInteger(),
            'user_id'=>$this->integer(),
            'section_id'=>$this->bigInteger(),
            'quiz_id'=>$this->bigInteger(),
            'result'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('section_result');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190508_122508_user_section_result cannot be reverted.\n";

        return false;
    }
    */
}
