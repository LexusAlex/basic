<?php
/**
 * @var $this \yii\web\View
 * @var $model app\modules\index\models\Post
 */
?>
<div class="grid justify-center">
    <div class="span-12">
        <div class="grid justify-space-around">
            <div class="span-9 span-10-sm span-10-md text-center-md">
                <h2>
                    <a href="<?php echo \yii\helpers\Url::to(['view', 'slug' => $model->slug]); ?>"><?php echo $model->title; ?></a>
                </h2>
            </div>
            <div class="span-3 span-10-sm span-10-md text-center-md">
                <h5><?php echo Yii::$app->formatter->asDate($model->created_at, 'medium'); ?></h5>
                <?php /*if($model->updated_at > $model->created_at){echo 'обновлено '.Yii::$app->formatter->asDate($model->updated_at, 'medium');}*/?>
            </div>
        </div>
        <div class="grid no-pad text-left">
            <div class="span-6">
                <?php if($model->category !== null){echo '<h6><em>'.$model->category->title.'</em></h6>';}?>
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