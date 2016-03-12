<?php

namespace app\modules\index\controllers;


use app\modules\index\models\Post;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class PostController
 * @package app\modules\index\controllers
 */
class PostController extends Controller
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
                    /*[
                        'actions' => ['index'],
                        'allow' => false, // Могут выполнять
                        'roles' => ['admin'], // Только авторизованные пользователи
                    ],*/
                    [
                        'allow' => true, // Могут выполнять
                        'roles' => ['@'], // Только авторизованные пользователи
                    ],
                    [
                        'allow' => false,
                    ]
                ],
            ],

        ];
    }

    /**
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
            'query' => Post::find(),
        ]);
        $gridView = GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => [
                'class' => ''
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'id',
                'title',
                [
                    'attribute' => 'created_at',
                    'label' => 'Создано',
                    'format' => 'datetime', // Доступные модификаторы - date:datetime:time
                    //'headerOptions' => ['width' => '200'],
                ],
                [
                    'attribute' => 'updated_at',
                    'label' => 'Обновлено',
                    'format' => 'datetime', // Доступные модификаторы - date:datetime:time
                    //'headerOptions' => ['width' => '200'],
                ],
                [
                    'attribute' => 'status',
                    'label' => 'Статус',
                    'content' => function ($model, $key, $index, $column) {
                        if ($model->status === 1) {
                            return 'Опубликован';
                        } else {
                            return 'Черновик';
                        }
                    }
                ],

                //'anons:html',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Действия',
                    'headerOptions' => ['width' => '80'],
                    'template' => '{update} {delete} {view}',
                    'buttons' => [
                        'update' => function ($url, $model, $key) {
                            $options = array_merge([
                                'title' => 'Update',
                                'aria-label' => 'Update',
                                'data-pjax' => '0',
                                'class' => 'button button-primary button-small',
                            ]);
                            return \yii\helpers\Html::a('update', $url, $options);
                        },
                        'delete' => function ($url, $model, $key) {
                            $options = array_merge([
                                'title' => 'Delete',
                                'aria-label' => 'Delete',
                                'data-confirm' => 'Are you sure you want to delete this item?',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class' => 'button button-primary button-small',
                            ]);
                            return \yii\helpers\Html::a('delete', $url, $options);
                        },
                        'view' => function ($url, $model, $key) {
                            $options = array_merge([
                                'title' => 'View',
                                'aria-label' => 'View',
                                'data-method' => 'post',
                                'data-pjax' => '0',
                                'class' => 'button button-primary button-small',
                                'target' => "_blank",
                            ]);
                            $u = Url::to(['/index/default/view', 'slug' => $model->slug]);
                            return \yii\helpers\Html::a('view', $u, $options);
                        },
                    ],
                ],
            ],
        ]);
        return $this->render('index', [
            'gridView' => $gridView,
        ]);
    }

    /**
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            $msg = "Запись № {$model->id} {$model->title} успешно создана";
            \Yii::$app->session->setFlash('success', $msg);
            return $this->redirect(['/'.$model->slug]);
        } else {
            //$model->author_id = \Yii::$app->user->id;
            return $this->render('create', [
                'model' => $model,
                //'category' => Category::find()->all(),
                //'tags' => Tags::find()->all(),
                //'authors' => User::find()->all()
            ]);
        }
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
    {
        $model = Post::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        //$model->save()
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            $msg = "Запись № {$model->id} {$model->title} успешно обновлена";
            \Yii::$app->session->setFlash('info', $msg);
            return $this->redirect(['/'.$model->slug]);
        } else {
            //$model->author_id = \Yii::$app->user->id;
            return $this->render('update', [
                'model' => $model,
                //'category' => Category::find()->all(),
                //'tags' => Tags::find()->all(),
                //'authors' => User::find()->all()
            ]);
        }
    }

    /**
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionDelete($id)
    {
        $model = Post::findOne($id);
        if ($model == null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            $model->delete();
        }
        return $this->redirect(['post/index']);
    }
}