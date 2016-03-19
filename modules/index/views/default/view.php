<?php
/**
 * @var $model app\modules\index\models\Post
 */
use dosamigos\disqus\Comments;
use \yii\helpers\Html;

?>

<div class="grid justify-center no-pad">
    <div class="span-12 text-center-md">
        <h1 class="text-center"><?php echo Html::encode($this->title); ?></h1>
    </div>
    <div class="span-12">
        <?php echo $model->anons; ?>
        <br>
        <?php echo $model->content; ?>
        <?php
        echo Comments::widget([
            // see http://help.disqus.com/customer/portal/articles/472098-javascript-configuration-variables
            'shortname' => 'sporthock',
            'identifier' => $model->slug
        ]);
        ?>
    </div>
</div>