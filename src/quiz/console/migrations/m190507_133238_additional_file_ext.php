<?php

use yii\db\Migration;

/**
 * Class m190507_133238_additional_file_ext
 */
class m190507_133238_additional_file_ext extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('question','file_ext',$this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('question','file_ext');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_133238_additional_file_ext cannot be reverted.\n";

        return false;
    }
    */
}
