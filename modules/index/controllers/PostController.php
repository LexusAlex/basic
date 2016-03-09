<?php

namespace app\modules\index\controllers;


use app\modules\index\models\Post;
use vova07\imperavi\actions\GetAction;
use yii\data\ActiveDataProvider;
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
            /*'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
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
            'images-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => 'http://app.yii2/images/', // Directory URL address, where files are stored.
                'path' => '@webroot/images', // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_IMAGES,
            ],
            'files-get' => [
                'class' => 'vova07\imperavi\actions\GetAction',
                'url' => 'http://app.yii2/files/', // Directory URL address, where files are stored.
                'path' => '@webroot/files', // Or absolute path to directory where files are stored.
                'type' => GetAction::TYPE_FILES,
            ],
            'image-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => 'http://app.yii2/images/', // Directory URL address, where files are stored.
                'path' => '@webroot/images' // Or absolute path to directory where files are stored.
            ],
            'file-upload' => [
                'class' => 'vova07\imperavi\actions\UploadAction',
                'url' => 'http://app.yii2/files/', // Directory URL address, where files are stored.
                'path' => '@webroot/files', // Or absolute path to directory where files are stored.
                'uploadOnlyImage' => false, // For not image-only uploading.
            ],
        ];
    }

    /**
     * @return string
     * @throws \Exception
     */
    public function actionIndex()
    {
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
            return $this->redirect(['post/index']);
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
            return $this->redirect(['post/index']);
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