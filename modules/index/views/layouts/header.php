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
                    ['label' => 'Вход', 'url' => ['default/login'], 'visible' => \Yii::$app->user->isGuest,],
                    ['label' => 'Выход', 'url' => ['default/logout'], 'visible' => !\Yii::$app->user->isGuest],
                    ['label' => 'Написать автору', 'url' => ['default/contact']],
                    ['label' => 'Книги', 'url' => ['default/books']],
                    ['label' => 'О проекте', 'url' => ['default/about']],

                    ['label' => 'Администрирование', 'url' => ['post/index'], 'options' => ['class' => 'has-sub'], 'visible' => !\Yii::$app->user->isGuest, 'items' => [
                        ['label' => 'Посты', 'url' => ['post/index'], 'items' => [
                            ['label' => 'Создать', 'url' => ['post/create']],
                        ]],
                        ['label' => 'Категории', 'url' => ['category/index'], 'items' => [
                            ['label' => 'Создать', 'url' => ['category/create']],
                        ]],
                        ['label' => 'Мои записи', 'url' => ['default/my'], 'visible' => !\Yii::$app->user->isGuest],
                    ]],
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