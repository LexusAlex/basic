<?php
/**
 * @var $this \yii\web\View
 */
?>
<div class="preloader" style="display: none;"></div>
<div class="mobile-menu show-block-xs show-block-sm hide">
    <a href="#" class="toggle-menu"><span></span></a>
    <b>Меню</b>
</div>
<div class='top-line hide-sm hide-xs'>
    <?php
    echo \yii\widgets\Menu::widget([
        'items' => [
            ['label' => 'Главная', 'url' => ['default/index']],
            ['label' => 'Вход', 'url' => ['default/login'], 'visible' => \Yii::$app->user->isGuest,],
            ['label' => 'Выход', 'url' => ['default/logout'], 'visible' => !\Yii::$app->user->isGuest],
            ['label' => 'Написать автору', 'url' => ['default/contact']],
            ['label' => 'Книги', 'url' => ['default/books']],
            ['label' => 'О проекте', 'url' => ['default/about']],

            ['label' => 'Администрирование', 'url' => ['post/index'], 'options' => [], 'visible' => !\Yii::$app->user->isGuest, 'items' => [
                ['label' => 'Посты', 'url' => ['post/index'], 'items' => [
                    ['label' => 'Создать', 'url' => ['post/create'], 'visible' => !\Yii::$app->user->isGuest],
                ]],
                ['label' => 'Категории', 'url' => ['category/index'], 'items' => [
                    ['label' => 'Создать', 'url' => ['category/create'], 'visible' => !\Yii::$app->user->isGuest],
                ]],
                ['label' => 'Мои записи', 'url' => ['post/my'], 'visible' => !\Yii::$app->user->isGuest],
            ]],
        ],
        //'itemOptions' => ['class' => 'has-sub',],
        //'lastItemCssClass' => 'last',
        //'linkTemplate' => '<a href="{url}"><span>{label}</span></a>',
        'activateParents' => true,
        'options' => ['class' => 'sf-menu'],
    ]);
    ?>
</div>