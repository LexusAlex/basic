<?php

namespace app\modules\index\controllers;

use app\modules\index\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

/**
 * Class DefaultController
 * @package app\modules\index\controllers
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where('status=1'),
            'pagination' => [
                'pageSize' => 3,
                'pageSizeParam' => false
            ],
        ]);

        $listView = \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '@app/modules/index/views/default/_post',
            //'itemOptions' =>
            //'layout' => "{summary}\n{items}\n{pager}"
            //'summary' => 'Запись - {begin} и {end}({count}) из {totalCount} Страница - {page} из {pageCount}',
            'summary' => '<div>Показано {count} из {totalCount} Страница {page} из {pageCount}</div>',
            'summaryOptions' => [
                'tag' => 'span',
                'class' => 'my-summary'
            ],
            'emptyText' => 'Список пуст',
            /*'pager' => [
                'firstPageLabel' => 'Первая',
                'lastPageLabel' => 'Последняя',
                'nextPageLabel' => 'Следующая',
                'prevPageLabel' => 'Предыдущая',
                'maxButtonCount' => 5,
            ],*/
        ]);
        return $this->render('index', [
            'listView' => $listView,
        ]);
    }
}