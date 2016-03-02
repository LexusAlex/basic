<?php

namespace app\assets;

use yii\web\AssetBundle;


class NavAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/flexnav';
    /**
     * @var array
     */
    public $css = [
        'css/flexnav.css',
    ];

    public $js = [
        'js/jquery.flexnav.js'
    ];
}
