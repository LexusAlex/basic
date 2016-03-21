<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Class PopupAsset
 * @package app\assets
 */
class PopupAsset extends AssetBundle
{
    /**
     * @var string
     */
    public $sourcePath = '@bower/magnific-popup/dist';
    /**
     * @var array
     */
    public $css = [
        'magnific-popup.css',
    ];
    public $js = [
        'jquery.magnific-popup.min.js',
    ];
}
