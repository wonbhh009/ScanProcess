<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace order_limiketang_com\assets;

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
        'css/myself.css',
        'http://jic.lxc100.com/support/css/jquery-ui.min.css',
        'http://jic.lxc100.com/support/css/jquery-ui-timepicker-addon.css',
    ];
    public $js = [
        'js/popup.js',
        'http://jic.lxc100.com/support/js/jquery.cookie.js',
        'http://jic.lxc100.com/support/js/bootstrap.min.js',
        'http://jic.lxc100.com/support/js/params.js',
        'http://jic.lxc100.com/support/js/collapse.js',
        'http://jic.lxc100.com/support/js/cityarea.js',
        'http://jic.lxc100.com/support/js/jquery-ui.min.js',
        'http://jic.lxc100.com/support/js/jquery-ui-timepicker-addon.js',
        'http://jic.lxc100.com/support/js/timepicker-cn.js',
        'http://jic.lxc100.com/support/js/datepicker-cn.js',
        'http://jic.lxc100.com/support/js/self.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
    public $jsOptions = [
        'position' => \yii\web\View::POS_HEAD
    ];      
    //定义按需加载JS方法，注意加载顺序在最后  
    public static function addScript($view, $jsfile) {  
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'mengshang_limiketang_com\assets\AppAsset']);  
    }
}