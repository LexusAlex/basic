<?php

namespace app\widgets;

use app\modules\index\models\Category;
use yii\base\Widget;
use yii\helpers\Html;

class Categories extends Widget
{

    public function init()
    {
        parent::init();

    }

    public function run()
    {
        $model = new Category();
        $model->viewCategories();
    }
}