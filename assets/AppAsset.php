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
        //"app-assets/css/bootstrap.css",
        "app-assets/fonts/feather/style.min.css",
        "app-assets/fonts/font-awesome/css/font-awesome.min.css",
        "app-assets/fonts/flag-icon-css/css/flag-icon.min.css",
        "app-assets/vendors/css/extensions/pace.css",
        "app-assets/vendors/css/forms/icheck/icheck.css",
        "app-assets/css/bootstrap-extended.css",
        "app-assets/css/app.css",
        "app-assets/css/colors.css",
        "sympel-assets/css/style.css"
    ];
    public $js = [
        "app-assets/vendors/js/vendors.min.js",
        "app-assets/vendors/js/forms/icheck/icheck.min.js",
        "app-assets/js/core/app-menu.js",
        "app-assets/js/core/app.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    
}
