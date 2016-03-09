<?php
/* @var $this \yii\web\View */
/* @var $content string */
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

    <?php echo $this->renderFile('@app/modules/index/views/layouts/header.php');?>

    <div class="grid no-pad">
        <div class="span-12">
            <div class="grid justify-space-around">
                <div class="span-8 span-10-xl span-10-lg span-12-md span-12-sm span-12-xs">
                    <?/*= \yii\widgets\Breadcrumbs::widget([
                        'activeItemTemplate' => "<li class=\"current\">{link}</li>\n",
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) */?>
                    <?php echo $content; ?>
                </div>
            </div>
        </div>
    </div>

    <?php echo $this->renderFile('@app/modules/index/views/layouts/footer.php');?>

<?php $this->endContent(); ?>