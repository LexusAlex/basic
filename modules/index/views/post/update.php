<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Post */
/* @var $form ActiveForm */
?>

<h1>Обновить запись № <?php echo $model->id?></h1>
<div class="grid justify-center">

    <div class="span-10 span-12-md">
        <?php $form = ActiveForm::begin(['options' => ['class' => 'forms']]); ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'slug')->textInput(['maxlength' => 255]) ?>
        <?php
        echo $form->field($model, 'anons')->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions(['elfinder'],['preset'=>'standart','inline'=>false]),
        ]);

        echo $form->field($model, 'content')->widget(CKEditor::className(),[
            'editorOptions' => ElFinder::ckeditorOptions(['elfinder'],['preset'=>'full','inline'=>false]),
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
