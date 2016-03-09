<?php /* @var $this \yii\web\View */ ?>
<h1>Все посты</h1>
<?php
\yii\widgets\Pjax::begin();
echo $gridView;
\yii\widgets\Pjax::end();