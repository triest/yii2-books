<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property int $id_author
 * @property int $id_publishing
 *
 * @property Authors $autor
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
                [['title'], 'required'],
                [['title'], 'string'],
                [['year'], 'safe'],
                [['id_author', 'id_publishing'], 'integer'],
                [
                        ['id_author'],
                        'exist',
                        'skipOnError' => true,
                        'targetClass' => Authors::className(),
                        'targetAttribute' => ['id_author' => 'id']
                ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
                'id' => 'ID',
                'title' => 'Title',
                'year' => 'Year',
                'id_author' => 'Id Author',
                'id_publishing' => 'Id Publishing',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAutor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'id_author']);
    }
}
