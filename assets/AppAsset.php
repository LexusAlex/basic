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
        //'css/kube.css',
        'css/site.css',
        'css/typography.css',
        'css/flex.css',
        'css/buttons.css',
        //'css/buttonslite.css',
        'css/tables.css',
        'css/forms.css',
        'css/lists.css',
        'css/alert.css',
        'css/nav.css'
    ];
    public $js = [
        //'js/responsive-nav.js'
    ];
    public $depends = [
        'app\assets\NormalizeAsset',
        //'app\assets\FlexAsset',
        'yii\web\YiiAsset',
        //'app\assets\NavAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}