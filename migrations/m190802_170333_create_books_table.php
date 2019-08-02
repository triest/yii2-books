<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m190802_170333_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books', [
                'id' => $this->primaryKey(),
                'title' => $this->text()->notNull(),
                'year' => $this->date()->null(),
                'id_autor' => $this->integer(),
                'id_publishing' => $this->integer(),
        ]);

        $this->createIndex(
                'idx-book-id_author',
                'books',
                'id_autor'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
