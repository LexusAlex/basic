<?php
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
            <ul>
                <li><a href='#'><span>Home</span></a></li>
                <li class='active has-sub'><a href='#'><span>Products</span></a>
                    <ul>
                        <li class='has-sub'><a href='#'><span>Product 1</span></a>
                            <ul>
                                <li><a href='#'><span>Sub Product</span></a></li>
                                <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>
                        </li>
                        <li class='has-sub'><a href='#'><span>Product 2</span></a>
                            <ul>
                                <li><a href='#'><span>Sub Product</span></a></li>
                                <li class='last'><a href='#'><span>Sub Product</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href='#'><span>About</span></a></li>
                <li class='last'><a href='#'><span>Contact</span></a></li>
                <li class='last'><a href='#'><span>Contact</span></a></li>
                <li class='last'><a href='#'><span>Contact</span></a></li>
                <li class='last'><a href='#'><span>Contact</span></a></li>
                <li class='last'><a href='#'><span>Contact</span></a></li>
            </ul>
        </div>
    </div>
</div>