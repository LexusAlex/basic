<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Post */
/* @var $form ActiveForm */

?>

<h1>Обновить запись № <?php echo $model->id?></h1>
<div class="grid justify-center">

    <div class="span-10 span-12-md">
        <?php $form = ActiveForm::begin(['options' => ['class' => 'forms']]); ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>
        <?= $form->field($model, 'anons')->textarea([]) ?>
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>
        <?= $form->field($model, 'status')->dropDownList(
            [\app\modules\index\models\Post::STATUS_DRAFT => 'Черновик', \app\modules\index\models\Post::STATUS_PUBLISH => 'Опубликован']
        ) ?>


        <div class="form-group">
            <?= Html::submitButton('Отправить', ['class' => 'button button-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
