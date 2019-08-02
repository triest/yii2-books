<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\rest\ActiveController;


class BookController extends ActiveController
{
    public $modelClass = 'app\models\Book';

   
}
