<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<div>

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="alert alert-error block-center">
        <h2> <?= nl2br(Html::encode($message)) ?></h2>
    </div>
</div>
