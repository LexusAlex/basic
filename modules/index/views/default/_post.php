<?php
/**
 * @var $this \yii\web\View
 * @var $model app\modules\index\models\Post
 */
?>
<div class="grid no-pad">
    <div class="span-12">
        <h2 class="text-left text-center-md">
            <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]); ?>"><?php echo $model->title; ?></a>
        </h2>
        <div class="grid no-pad">
            <div class="span-6 text-left">
                <h6><em><?php echo Yii::$app->formatter->asDate($model->created_at, 'medium'); ?></em></h6>
            </div>
            <div class="span-6 text-right">
                <h6><em><?php if($model->category !== null){echo $model->category->title;} ?></em></h6>
            </div>
        </div>
        <div class="grid no-pad">
            <div class="span-12">
                <?php echo $model->anons; ?>
                <a class="button button-primary"
                   href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]); ?>">
                    Читать далее
                </a>
            </div>
        </div>
    </div>
</div>

<hr>