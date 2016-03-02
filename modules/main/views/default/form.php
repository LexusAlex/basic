<?php

/**
 * @var $this yii\base\View
 * @var $form yii\widgets\ActiveForm
 * @var $model app\modules\main\models\ContactForm
 */

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'form-input-example', // если не указано то w0
    //'enableAjaxValidation' => true,
    'options' => [
        'style' => '',
        'class' => 'forms',
        //'enctype' => 'multipart/form-data'
        'fieldConfig' => [
            'template' => "{label}\n{input}\n{error}",
            //'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ],
]);

echo $form->field($model, 'text')->textInput(['class' => "input-success"])->label('Текстовое поле');
echo $form->field($model, 'textArea')->textarea(['rows' => 10, 'cols' => 50])->label('Многострочное текстовое поле');
echo Html::submitButton('Отправить', ['class' => 'button button-primary']);

ActiveForm::end();