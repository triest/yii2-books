<?php

use yii\db\Migration;

/**
 * Class m190802_171727_add_foregin_key_from_books_to_author
 */
class m190802_171727_add_foregin_key_from_books_to_author extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {


        // add foreign key for table `city`
        $this->addForeignKey(
                'fk-book-id_autor',
                'books',
                'id_autor',
                'authors',
                'id',
                'SET NULL'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190802_171727_add_foregin_key_from_books_to_author cannot be reverted.\n";

        return false;
    }
    */
}
