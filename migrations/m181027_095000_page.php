<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181027_095000_page
 */
class m181027_095000_page extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
		$this->createTable('page', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'created' => Schema::TYPE_DATETIME,
			'content' => Schema::TYPE_TEXT,
			'img' => Schema::TYPE_STRING,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('page');

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181027_095000_page cannot be reverted.\n";

        return false;
    }
    */
}
