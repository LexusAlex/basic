<?php

namespace app\modules\index\controllers;

use app\modules\index\models\Category;
use app\modules\index\models\ContactForm;
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

    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_DEV ? 't' : null,
                //'minLength'=>2,
                //'maxLength'=>4,
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
            'options' => ['class' => 'paginator'],
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
        $this->view->registerMetaTag(['name' => 'description','content' => 'Статьи ,заметки, советы, собственный опыт о программировании, администрировании, it и не только']);
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
            $this->view->registerMetaTag(['name' => 'description','content' => $model->title]);
            return $this->render('view', [
                'model' => $model,
            ]);
        } else {
            throw new NotFoundHttpException('The requested post does not exist.');
        }

    }

    /**
     * @return string|\yii\web\Response
     */
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

    /**
     * @return \yii\web\Response
     */
    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionContact()
    {
        /*$model = new ContactForm();
        if ($model->load(\Yii::$app->request->post()) && $model->contact('a@b.ru')) {
            \Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);*/
        $this->view->title = 'Написать автору';
        $this->view->registerMetaTag(['name' => 'description','content' =>'Обратная связь с автором статей.']);
        return $this->render('contact');

    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCategory($id)
    {
        $c = new Category();
        $posts = $c->getPostsFromCategory($id);
        if ($posts == null) {
            throw new NotFoundHttpException('The requested post does not exist.');
        }

        $this->view->title = 'Записи в категории ' . $c->getName($id);
        $this->view->registerMetaTag(['name' => 'description','content' => 'Записи в категории '. $c->getName($id)]);
        $this->view->registerMetaTag(['name' => 'keywords','content' => $c->getName($id)]);
        return $this->render('categories', ['posts' => $posts]);
    }

    /**
     * @return string
     */
    public function actionBooks()
    {
        $this->view->title = 'Книги';
        $this->view->registerMetaTag(['name' => 'description','content' => 'Нужные полезные книги.']);
        return $this->render('books');
    }

    /**
     * @return string
     */
    public function actionAbout()
    {
        $this->view->title = 'О проекте';
        $this->view->registerMetaTag(['name' => 'description','content' => 'О проекте sporthock.ru']);
        return $this->render('about');
    }
}