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

use yii\console\Controller;
use yii\console\ExitCode;
use yii\rest\ActiveController;


class AuthorController extends ActiveController
{
    public $modelClass = 'app\models\Authors';
    /*
        protected function verbs()
        {
            return [
                    'index' => ['GET', 'HEAD'],
                    'view' => ['GET', 'HEAD'],
                    'create' => ['POST'],
                    'update' => ['PUT', 'PATCH'],
                    'delete' => ['DELETE'],
            ];
        }
    */
}
