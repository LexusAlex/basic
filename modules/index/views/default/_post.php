<?php
/**
 * @var $this \yii\web\View
 * @var $model app\modules\index\models\Post
 */
?>
<div class="grid no-pad">
    <div class="span-12">
        <h2 class="text-center">
            <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]); ?>"><?php echo $model->title; ?></a>
        </h2>
        <div class="date text-center">
            <?php echo Yii::$app->formatter->asDate($model->created_at, 'full'); ?>
        </div>
        <?php echo $model->anons; ?>
        <div>
            <?php if($model->category !== null){echo $model->category->title;} ?>
        </div>
        <br>
        <a class=""
           href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]); ?>">
            Читать далее
        </a>
    </div>
</div>

<div class="border"></div>