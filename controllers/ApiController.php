<?php

namespace app\controllers;

use app\models\Book;
use Yii;
use yii\filters\AccessControl;
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
                                'delete' => ['POST', 'DELETE'],
                        ],
                ],
        ];
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }


    public function actionIndex()
    {
        //  $id = Yii::$app->request->getQueryParam("id"); //
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $book = Book::find()->all();
        return $book;
        // return "ok";
    }


    public function actionGet()
    {
        // $id = Yii::$app->request->getQueryParam("id"); //
        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return "get";
        //  return $this->render('index');
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
            if ($model->save(false)) {
                return 201;
            } else {
                return 503;
            }
            /*  if ($model->load($request->post())) {
                  return "post";
              } else {
                  return "not load";
              }*/
        }

        Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return "create";
        //  return $this->render('index');
    }


}
