<?php
/**
 *  @var $model app\modules\index\models\Post
 */
?>

<h1><?php echo $model->title?></h1>
<div class="grid">
    <div class="span-12">
        <?php echo $model->anons;?>
        <?php echo $model->content;?>
    </div>
</div>
