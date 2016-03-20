<?php
/**
 * @var $this \yii\web\View
 * @var $content string
 */
?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>

<?php echo $this->renderFile('@app/modules/index/views/layouts/header.php'); ?>

    <div class="grid justify-center">
        <div class="span-8 span-10-md span-12-sm span-12-xs">
            <?= \app\widgets\Alert::widget() ?>
            <?php echo $content; ?>
        </div>
        <?php /*if ($this->context->id === 'default') {
            echo $this->render('rightcolumn');
        }*/
        ?>
    </div>

<?php echo $this->renderFile('@app/modules/index/views/layouts/footer.php'); ?>

<?php $this->endContent(); ?>