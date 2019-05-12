<?php

use yii\db\Migration;

/**
 * Class m190507_125135_section_table
 */
class m190507_125135_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('section',[
           'id'=>$this->bigPrimaryKey(),
            'name'=>$this->string(),
            'background'=>$this->string(),
        ]);
        $this->addColumn('question','section_id',$this->bigInteger());
        $this->addColumn('question','info',$this->string());
        $this->createIndex('question-section','question','section_id');
        $this->addForeignKey('question-to-section','question','section_id','section','id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('question-to-section','question');
        $this->dropIndex('question-section','question');
        $this->dropColumn('question','info');
        $this->dropColumn('question','section_id');
        $this->dropTable('section');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190507_125135_section_table cannot be reverted.\n";

        return false;
    }
    */
}
