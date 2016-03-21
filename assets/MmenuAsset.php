<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class MmenuAsset
 * @package app\assets
 */
class MmenuAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/mmenu/dist';
    /**
     * @var array
     */
    public $css = [
        'css/jquery.mmenu.all.css',
    ];
    public $js = [
        'js/jquery.mmenu.all.min.js',
    ];
}
