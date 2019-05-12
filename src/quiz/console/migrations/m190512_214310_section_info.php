<?php

use yii\db\Migration;

/**
 * Class m190512_214310_section_info
 */
class m190512_214310_section_info extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('section','rules',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('section','rules');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190512_214310_section_info cannot be reverted.\n";

        return false;
    }
    */
}
