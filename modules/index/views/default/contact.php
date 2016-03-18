<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

?>
<h1><?php echo Html::encode($this->title); ?></h1>

<?php /*Yii::$app->session->hasFlash('contactFormSubmitted'); */?>

<?php /*$form = ActiveForm::begin(['id' => 'contact-form']); */?>

<?/*= $form->field($model, 'name') */?>

<?/*= $form->field($model, 'email') */?>

<?/*= $form->field($model, 'subject') */?>

<?/*= $form->field($model, 'body')->textArea(['rows' => 6]) */?>

<? /*= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div class="grid"><div class="span-2">{image}</div><div class="span-10">{input}</div></div>',
                    'captchaAction' => '/index/default/captcha',
                ]) */ ?>


<?/*= Html::submitButton('Отправить', ['class' => 'button', 'name' => 'contact-button']) */?>


<?php /*ActiveForm::end(); */?>

По всем интересующимся вопросам вы можете написать на <a href="mailto:mail@sporthock.ru">mail@sporthock.ru</a>