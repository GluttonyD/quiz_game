<?php

use yii\db\Migration;

/**
 * Class m190514_105651_add_current_section
 */
class m190514_105651_add_current_section extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('quiz','current_section',$this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('quiz','current_section');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190514_105651_add_current_section cannot be reverted.\n";

        return false;
    }
    */
}
