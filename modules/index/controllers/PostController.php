<?php

namespace app\modules\index\controllers;


use app\modules\index\models\Post;
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