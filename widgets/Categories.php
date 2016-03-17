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
        $allCategories = $model->getAllCategories();
        foreach($allCategories as $v){
            echo Html::a($v->title,['default/category','id'=>$v->id]).' ('.count($v->posts).')'.'<br>';
        }
    }
}