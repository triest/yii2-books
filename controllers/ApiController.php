<?php

namespace app\controllers;

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
        //  $id = Yii::$app->request->getQueryParam("id"); //
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $id = $request->get('id');
        if ($id == null) {
            return null;
        }
        $book = Book::find()->where(['id_author' => $id])->all();
        return $book;
    }

    public function actionView($id)
    {
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $author = $request->get('author');
        $book = Book::find()->where(['id_author' => $id])->all();
        return $book;
    }

    public function actionDelete($id)
    {
        return "delete";
    }

    public function actionCreate()
    {
        $this->enableCsrfValidation = false;//
        // $id = Yii::$app->request->getQueryParam("id"); //
        $model = new  Book();
        $request = Yii::$app->request;
        if ($request->isPost) { /* текущий запрос является POST запросом */
            $model->title = $request->post("title");
            $model->year = $request->post("year");
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
        //  return $this->render('index');
    }

    public function actionUpdate()
    {
        return "update";
    }


}
