<?php
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <?php echo $this->renderFile('@app/modules/index/views/layouts/header.php');?>

    <div class="grid no-pad">
        <div class="span-12">
            <div class="grid justify-space-around no-pad">
                <div class="span-3">1</div>
                <div class="span-9">
                    <?= \yii\widgets\Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->renderFile('@app/modules/index/views/layouts/footer.php');?>

<?php $this->endContent(); ?>