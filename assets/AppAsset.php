<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';
    public $css = [
        'css/site.css',
        'chart.js/Chart.min.css',
    ];
    public $js = [
        'js/modal.js',
        'chart.js/Chart.bundle.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        //'dmstr\adminlte\web\AdminLteAsset',
    ];
}
