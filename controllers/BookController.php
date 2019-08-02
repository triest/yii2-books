<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\controllers;

use yii\console\Controller;
use yii\console\ExitCode;


class BookController extends Controller
{

    public function actionIndex()
    {
        echo "test";
        return ExitCode::OK;
    }
}
