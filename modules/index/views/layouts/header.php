<?php
/**
 * @var $this \yii\web\View
 */
?>
<div class="grid">
    <div class="span-12">
        <div id='cssmenu'>
            <?php
            echo \yii\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Главная', 'url' => ['default/index']],
                    ['label' => 'Посты', 'url' => ['post/index'], 'options' => ['class' => 'has-sub'] ,'visible' => !\Yii::$app->user->isGuest,'items' => [
                        ['label' => 'Создать', 'url' => ['post/create']],
                    ]],
                    ['label' => 'Вход', 'url' => ['default/login'],'visible' => \Yii::$app->user->isGuest,],
                    ['label' => 'Выход', 'url' => ['default/logout'],'visible' => !\Yii::$app->user->isGuest],
                    ['label' => 'Написать автору', 'url' => ['default']],
                ],
                //'itemOptions' => ['class' => 'has-sub',],
                'lastItemCssClass' => 'last',
                'linkTemplate' => '<a href="{url}"><span>{label}</span></a>',
                'activateParents' => true
            ]);
            ?>
        </div>
    </div>
</div>