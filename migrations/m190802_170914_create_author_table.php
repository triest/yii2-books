<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%author}}`.
 */
class m190802_170914_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%authors}}', [
                'id' => $this->primaryKey(),
                'family' => $this->string()->notNull(),
                'name' => $this->string(),
                'year_of_birth' => $this->date(),
                'country' => $this->string()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%author}}');
    }
}
