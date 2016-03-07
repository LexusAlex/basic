<?php

namespace app\modules\index\controllers;


use app\modules\index\models\Post;
use vova07\imperavi\actions\GetAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * Class PostController
 * @package app\modules\index\controllers
 */
class PostController extends Controller
{
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

    public function actionCreate()
    {
        $model = new Post();
            //$model->save()
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                //var_dump($model);
                return $this->refresh();
            }
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

    public function actionUpdate($id)
    {
        $model = Post::findOne($id);
        if ($model == null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }

            //$model->save()
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                //var_dump($model);
                return $this->refresh();
            }
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

    public function actionDelete($id)
    {
        $model = Post::findOne($id);
        if ($model == null){
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        else{
            $model->delete();
        }
        return $this->redirect(['index']);
    }
}