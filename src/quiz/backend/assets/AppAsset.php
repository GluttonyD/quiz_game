<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/select2.css',
        'css/game.css'
    ];
    public $js = [
        'js/centrifuge/centrifuge.js',
        'js/select2.js',
        'js/question/create.js',
        'js/quiz/create.js',
        'js/game/game.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
