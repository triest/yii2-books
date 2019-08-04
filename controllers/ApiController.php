<?php

namespace app\controllers;

use app\models\Author;
use app\models\Book;
use Yii;
use yii\db\ActiveRecord;
use yii\filters\AccessControl;
use yii\rest\ActiveController;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ApiController extends Controller
{
    public function behaviors()
    {
        return [
                'verbs' => [
                        'class' => \yii\filters\VerbFilter::className(),
                        'actions' => [
                                'index' => ['GET'],
                                'view' => ['GET'],
                                'create' => ['GET', 'POST'],
                                'update' => ['GET', 'PUT', 'POST'],
                                'delete' => ['DELETE'],
                        ],
                ],
        ];
    }

    public function actionIndex()
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $book = Book::find()->all();
        return $book;
    }

    public function actionView($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $book = Book::find()->where(['id_author' => $id])->all();
        return $book;
    }

    public function actionDelete($id)
    {
        Yii::$app->controller->enableCsrfValidation = false;
        $this->enableCsrfValidation = false;//
        $author = Author::find()->where(['id' => $id])->one();
        if ($author == null) {
            return 405;
        }
        $author->delete();
        return 204;
    }

    public function actionCreate()
    {
        Yii::$app->controller->enableCsrfValidation = false;
        $this->enableCsrfValidation = false;//
        $model = new  Book();
        $request = Yii::$app->request;
        if ($request->isPost) { /* текущий запрос является POST запросом */
            $model->title = $request->post("title");
            $model->year = $request->post("year");

            $author_id = $request->getQueryParam('id_author');
            if ($author_id != null) {
                $author = Author::find()->where(['id' => $author_id])->one();
                if ($author == null) {
                    return 405;
                }
            }
            $model->id_author = $request->post("id_author");
            $model->id_publishing = $request->post("id_publishing");
            if ($model->save()) {
                return 201;
            } else {
                return 503;
            }
        }
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return 405;
    }

    public function actionUpdate($id)
    {
        $request = Yii::$app->request;
        if ($request->isPut) {
            $book = Book::find()->where(['id' => $id])->one();
            if ($book == null) {
                return 404;
            }
            $author_id = $request->getQueryParam('id_author');
            if ($author_id == null) {
                return 503;
            }
            $author = Author::find()->where(['id' => $author_id])->one();
            if ($author == null) {
                return 405;
            }
            $book->id_author = $author->id;
            $book->save(false);
            return 204;
        }
        return 503;
    }


}
