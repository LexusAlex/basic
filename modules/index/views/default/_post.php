<?php
/* @var $this \yii\web\View */
/* @var $model app\modules\index\models\Post */
?>
<div class="grid justify-center">
    <div class="span-12">
        <div class="grid justify-space-around">
            <div class="span-9 span-10-sm">
                <h2><a href="<?php echo \yii\helpers\Url::to(['view','slug' => $model->slug]);?>"><?php echo $model->title;?></a></h2>
            </div>
            <div class="span-3 span-10-sm">
                <h5><?php echo Yii::$app->formatter->asDate($model->created_at === $model->updated_at ? $model->created_at : $model->updated_at, 'medium'); ?></h5>
            </div>
        </div>
        <div class="grid no-pad">
            <div class="span-12">
                <?php echo $model->anons;?>
            </div>
        </div>
    </div>
</div>

<hr>