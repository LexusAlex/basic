<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Post */

?>

<h1><?= Html::encode($this->title.' id - '.$model->id.' title - '.$model->title) ?></h1>

<?= $this->render('_form', ['model' => $model,'category'=>$category]) ?>
