<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\index\models\Category */

?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
