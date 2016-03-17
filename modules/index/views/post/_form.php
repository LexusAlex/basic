<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>


    <?php $form = ActiveForm::begin(['options' => ['class' => 'forms'],'errorCssClass' =>'alert alert-error',/*'successCssClass' => 'alert'*/]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?php
    echo $form->field($model, 'anons')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions(['elfinder'],['preset'=>'standart','inline'=>false]),
    ]);
    ?>

    <?php
    echo $form->field($model, 'content')->widget(CKEditor::className(),[
        'editorOptions' => ElFinder::ckeditorOptions(['elfinder'],['preset'=>'full','inline'=>false]),
    ]);
    ?>

    <?= $form->field($model, 'status')->dropDownList(
        [\app\modules\index\models\Post::STATUS_DRAFT => 'Черновик',
            \app\modules\index\models\Post::STATUS_PUBLISH => 'Опубликован',
            \app\modules\index\models\Post::STATUS_PRIVATE => 'Закрытый'],
        ['prompt' => 'Выбрать тип поста']
    //\yii\helpers\ArrayHelper::map(\app\modules\index\models\Post::find()->all(),'id','title')
    ) ?>
        <?= $form->field($model, 'category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map($category, 'id', 'title'),
            ['prompt' => 'Выбрать категорию']
        ) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'button button-primary' : 'button button-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

