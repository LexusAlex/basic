<?php

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    //public $basePath = '@webroot';
    //public $baseUrl = '@web';
    public $sourcePath = '@app/web';
    public $css = [
        'css/site.css',
        'css/gridflex.css',
    ];
    public $js = [
      'js/common.js'
    ];
    public $depends = [
        'app\assets\SuperFishAsset',
        'app\assets\NormalizeAsset',
        'yii\web\YiiAsset',

    ];
}