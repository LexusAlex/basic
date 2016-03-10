<?php
/* @var $this \yii\web\View */
$str = <<<'EOD'
( function( $ ) {
$( document ).ready(function() {
$('#cssmenu').prepend('<div id="menu-button">Menu</div>');
	$('#cssmenu #menu-button').on('click', function(){
		var menu = $(this).next('ul');
		if (menu.hasClass('open')) {
			menu.removeClass('open');
		}
		else {
			menu.addClass('open');
		}
	});
});
} )( jQuery );
EOD;
$this->registerJs($str);?>
<div class="grid">
    <div class="span-12">
        <div id='cssmenu'>
            <?php
            echo \yii\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Главная', 'url' => ['default/index']],
                    ['label' => 'Посты', 'url' => ['post/index'], 'options' => ['class' => 'has-sub'] /*,'visible' => false*/,'items' => [
                        ['label' => 'Создать', 'url' => ['post/create']],
                    ]],
                    ['label' => 'Вход', 'url' => ['default/login'],'visible' => \Yii::$app->user->isGuest],
                    ['label' => 'Выход', 'url' => ['default/logout'],'visible' => !\Yii::$app->user->isGuest],
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