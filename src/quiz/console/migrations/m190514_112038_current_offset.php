<?php

use yii\db\Migration;

/**
 * Class m190514_112038_current_offset
 */
class m190514_112038_current_offset extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('quiz','offset',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('quiz','offset');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_112038_current_offset cannot be reverted.\n";

        return false;
    }
    */
}
