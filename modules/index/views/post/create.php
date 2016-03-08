<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;

/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Post */
/* @var $form ActiveForm */

?>

<h1>Создать запись</h1>
<div class="grid justify-center">

    <div class="span-10 span-12-md">
        <?php $form = ActiveForm::begin(['options' => ['class' => 'forms'],'errorCssClass' =>'alert alert-error','successCssClass' => 'alert']); ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

        <?php
        echo $form->field($model, 'anons')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 100,
                'imageManagerJson' => \yii\helpers\Url::to(['/index/post/images-get']),
                'imageUpload' => \yii\helpers\Url::to(['/index/post/image-upload']),
                'fileManagerJson' => \yii\helpers\Url::to(['/index/post/files-get']),
                'fileUpload' => \yii\helpers\Url::to(['/index/post/file-upload']),
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                    'filemanager',
                    'fontcolor',
                    'fontfamily',
                    'fontsize',
                    'table',
                ],
            ],

        ]);
        ?>

        <?php
        echo $form->field($model, 'content')->widget(Widget::className(), [
            'settings' => [
                'lang' => 'ru',
                'minHeight' => 200,
                'imageManagerJson' => \yii\helpers\Url::to(['/index/post/images-get']),
                'imageUpload' => \yii\helpers\Url::to(['/index/post/image-upload']),
                'fileManagerJson' => \yii\helpers\Url::to(['/index/post/files-get']),
                'fileUpload' => \yii\helpers\Url::to(['/index/post/file-upload']),
                'plugins' => [
                    'clips',
                    'fullscreen',
                    'imagemanager',
                    'filemanager',
                    'fontcolor',
                    'fontfamily',
                    'fontsize',
                    'table',
                ],
            ],

        ]);
        ?>

        <?= $form->field($model, 'status')->dropDownList(
            [\app\modules\index\models\Post::STATUS_DRAFT => 'Черновик', \app\modules\index\models\Post::STATUS_PUBLISH => 'Опубликован']
        ) ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'button button-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
