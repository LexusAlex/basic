<div class="grid justify-center">
    <div class="span-12">
        <div class="grid justify-space-around">
            <div class="span-9 span-10-sm">
                <h2><a href=""><?php echo $model->title;?></a></h2>
            </div>
            <div class="span-3 span-10-sm">
                <h6><?php echo Yii::$app->formatter->asDatetime($model->created_at, 'medium'); ?></h6>
            </div>
        </div>
        <div class="grid">
            <div class="span-12">
                <p>
                    <?php echo $model->anons;?>
                </p>
            </div>
        </div>
    </div>
</div>


<hr>