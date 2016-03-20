<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class SuperFishAsset
 * @package app\assets
 */
class SuperFishAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/superfish/dist';
    /**
     * @var array
     */
    public $css = [
        'css/superfish.css',
    ];
    public $js = [
        'js/superfish.min.js',
    ];
}
