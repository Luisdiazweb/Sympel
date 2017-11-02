<?php

namespace app\assets;

use yii\web\AssetBundle;

class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "admin/css/bootstrap.css",
        "admin/fonts/feather/style.min.css",
        "admin/fonts/font-awesome/css/font-awesome.min.css",
        "admin/fonts/flag-icon-css/css/flag-icon.min.css",
        "admin/vendors/css/extensions/pace.css",
        "admin/vendors/css/extensions/unslider.css",
        "admin/vendors/css/weather-icons/climacons.min.css",
        "admin/fonts/meteocons/style.css",
        "admin/vendors/css/charts/morris.css",
        "admin/css/bootstrap-extended.css",
        "admin/css/app.css",
        "admin/css/colors.css",
        "admin/css/core/menu/menu-types/vertical-menu.css",
        "admin/css/core/menu/menu-types/vertical-overlay-menu.css",
        "admin/css/core/colors/palette-gradient.css",
        "admin/fonts/simple-line-icons/style.css",
        "admin/css/core/colors/palette-gradient.css",
        "admin/css/pages/timeline.css",
        "admin/css/style.css"
    ];
    public $js = [
        "admin/vendors/js/vendors.min.js",
        "admin/js/core/app-menu.js",
        "admin/js/core/app.js"
    ];
    public $depends = [
        'yii\web\YiiAsset'
    ];
}