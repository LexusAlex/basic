<?php
/* @var $this yii\web\View */
/* @var $form ActiveForm */
/* @var $model app\modules\index\models\LoginForm */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="grid justify-center">
    <div class="span-10 span-12-md">
        <?php $form = ActiveForm::begin(['options' => ['class' => 'forms'],'errorCssClass' =>'alert alert-error',/*'successCssClass' => 'alert'*/]); ?>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <?= $form->field($model, 'rememberMe')->checkbox() ?>

        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'button button-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>