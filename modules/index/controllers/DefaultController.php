<?php

namespace app\modules\index\controllers;

use yii\web\Controller;

/**
 * Class DefaultController
 * @package app\modules\index\controllers
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        return $this->render('index');
    }
}