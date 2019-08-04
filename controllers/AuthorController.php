<?php
/**
 * Created by PhpStorm.
 * User: triest
 * Date: 02.08.2019
 * Time: 23:59
 */

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\controllers;

use app\models\Author;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\rest\ActiveController;


class AuthorController extends ActiveController
{
    public $modelClass = 'app\models\Author';

    /*
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
    */
    /*     public function actionUpdate($id)
         {
             return $id;
             $request = Yii::$app->request;
             if ($request->isPut) {
                 $item = Author::find()->where(['id' => $id])->one();
                 if ($item == null) {
                     return 404;
                 }
                 $name = $request->getQueryParam('name');

                 $author = Author::find()->where(['id' => $id])->one();
                 if ($author == null) {
                     return 405;
                 }
                 $author->name = $name;
                 $author->save(false);
                 return 204;
             }
             return 503;
         }
 */
}
