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

    /**
     * View all posts ListView
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
        \Yii::$container->set('yii\widgets\LinkPager', [
            'options' => ['class' => 'cd-pagination no-space move-buttons custom-icons'],
            'firstPageCssClass' => '',
            'firstPageLabel' => 'Первая',
            'lastPageLabel' => 'Последняя',
            'nextPageLabel' => 'Следующая',
            'prevPageLabel' => 'Предыдущая',
            'activePageCssClass' => 'current',
            'maxButtonCount' => 3,
        ]);
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->where('status=1')->orderBy('id DESC'),
            'pagination' => [
                'pageSize' => 5,
                'pageSizeParam' => false,
            ],
        ]);

        $listView = \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '@app/modules/index/views/default/_post',
            'summary' => '<div>Показано {count} из {totalCount} Страница {page} из {pageCount}</div>',
            'summaryOptions' => [
                'tag' => 'span',
                'class' => 'my-summary'
            ],
            'emptyText' => 'Список пуст',
        ]);
        return $this->render('index', [
            'listView' => $listView,
        ]);
    }

    /**
     * View post
     * @param $slug
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionView($slug)
    {
        $model = Post::find()->where('slug = :name AND status = 1', [':name' => $slug])->one();
        if ($model !== null) {
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }

    }
}