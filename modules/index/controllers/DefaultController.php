<?php

namespace app\modules\index\controllers;

use app\modules\index\models\LoginForm;
use app\modules\index\models\Post;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class DefaultController
 * @package app\modules\index\controllers
 */
class DefaultController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout','index'],
                'rules' => [
                    [
                        'actions' => ['login'], // Данное действие
                        'allow' => true, // Могут выполнять
                        'roles' => ['?'], // Только гости
                    ],
                    [
                        'actions' => ['logout'], // Данное действие
                        'allow' => true, // Могут выполнять
                        'roles' => ['@'], // Только авторизованные пользователи
                    ],
                    [
                        'allow' => true,
                    ]
                ],
            ],
            /*'verbs' => [ // Какие WEB методы могут применяться
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'], // Для action logout может быть только применен web метод post
                ],
            ],*/

        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

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
            //'summary' => '<div>Показано {count} из {totalCount} Страница {page} из {pageCount}</div>',
            'summary' => false,
            'summaryOptions' => [
                'tag' => 'span',
                'class' => 'my-summary'
            ],
            'emptyText' => 'Список пуст',
        ]);
        $this->view->title = 'Технические статьи и заметки';
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
            $this->view->title = $model->title;
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }

    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
            //return $this->redirect(['/']);
        }
        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
            //return $this->redirect(['/']);
        } else {
            $this->view->title = 'Авторизация';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }
}