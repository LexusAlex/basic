<?php

namespace app\modules\index\controllers;

use app\modules\index\models\Category;
use Yii;
use app\modules\index\models\Post;
use app\modules\index\models\PostSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * Class PController
 * @package app\modules\index\controllers
 */
class PostController extends Controller
{
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
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $this->view->title = 'Все посты';
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = "Запись № {$model->id} {$model->title} успешно создана";
            \Yii::$app->session->setFlash('success', $msg);
            return $this->redirect(['/' . $model->slug]);
        } else {
            $this->view->title = 'Создать пост';
            $cat = new Category();
            return $this->render('create', [
                'model' => $model,
                'category' => $cat->getAllCategories(),
            ]);
        }
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $msg = "Запись № {$model->id} {$model->title} успешно обновлена";
            \Yii::$app->session->setFlash('info', $msg);
            return $this->redirect(['/' . $model->slug]);
        } else {
            $this->view->title = 'Обновить пост';
            $cat = new Category();
            return $this->render('update', [
                'model' => $model,
                'category' => $cat->getAllCategories(),
            ]);
        }
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        $msg = "Запись удалена";
        \Yii::$app->session->setFlash('info', $msg);
        return $this->redirect(['post/index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
