<?php

namespace app\modules\index\controllers;

use app\modules\index\models\Post;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class DefaultController
 * @package app\modules\index\controllers
 */
class DefaultController extends Controller
{

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where('status=1')->orderBy('id DESC'),
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

    public function actionView($slug)
    {
        $model = Post::find()->where('slug = :name AND status = 1',[':name'=>$slug])->one();
        if ($model !== null)
        {
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }

    }
}