<?php

/**
 * @var $this \yii\web\View
 * @var $listView string
 */
use \yii\helpers\Html;
?>
    <h1 class="text-center"><?php echo Html::encode($this->title); ?></h1>
<?
echo $listView;
?>
<div class="grid">
    <div class="span-6 text-center">
        <h1>Категории</h1>
        <div class="category">
            <?php echo \app\widgets\Categories::widget(); ?>
        </div>
    </div>
    <div class="span-6"></div>
</div>

