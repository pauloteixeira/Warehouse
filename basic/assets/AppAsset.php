<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'vendors/bootstrap/dist/css/bootstrap.min.css',
        'vendors/bootstrap/dist/css/bootstrap-theme.min.css',
        'vendors/font-awesome/css/font-awesome.min.css',
        'vendors/select2/dist/css/select2.css',
    ];
    public $js = [
      'vendors/bootstrap/dist/js/bootstrap.min.js',
      'vendors/jquery-scrollintoview/jquery.scrollintoview.min.js',
      'vendors/notify/pnotify.core.js',
      'vendors/notify/pnotify.buttons.js',
      'vendors/notify/pnotify.nonblock.js',
      'vendors/select2/dist/js/select2.min.js',
      'vendors/moment/min/moment-with-locales.min.js',
      'js/app-resources.js?release=1',
      'js/handlers/nav.min.js?release=1',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
