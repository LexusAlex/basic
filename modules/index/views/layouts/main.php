<?php $this->beginContent('@app/views/layouts/main.php'); ?>
    <div class="">
        <?= \yii\widgets\Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?php echo $content; ?>
    </div>
<?php $this->endContent(); ?>