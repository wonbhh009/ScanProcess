<?php

use yii\helpers\Html;
use yii\helpers\Url;
use order_limiketang_com\assets\AppAsset;

AppAsset::register($this);
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <!-- 导航条  -->
    <nav class="navbar-inverse navbar-static-top navbar" role="navigation">
        <div class="container">
            <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= Yii::$app->homeUrl?>">狸米订单管理系统</a>
            </div>
            <div class="collapse navbar-collapse bs-navbar-collapse">
                <ul class="navbar-nav navbar-right nav">
                   <?php
                        echo '<li>'.Html::a('登录',Url::to(['site/login'])).'</li>';
                        echo "<li>";
                        echo "  <a href='javascript:void(0);' class='dropdown-toggle' data-toggle='dropdown'>bootcss示例<span class='caret'></span></a>";
                        echo "  <ul class='dropdown-menu' role='menu'>";
                        echo "      <li><a href='/deduction/index'>抵扣卷管理</a></li>";                        
                        echo "      <li><a href='/bootcss/index-stru'>基本页面结构</a></li>";
                        echo "      <li><a href='/bootcss/index-stru-pageheader'>基本页面结构-导航区</a></li>";
                        echo "      <li><a href='/bootcss/index-stru-control'>基本页面结构-操作区</a></li>";
                        echo "      <li role='separator' class='divider'></li>";
                        echo "      <li><a href='/bootcss/index-table-simple'>表格-最简样式</a></li>";
                        echo "      <li><a href='/bootcss/index-table-button'>表格-按键与链接</a></li>";
                        echo "      <li><a href='/bootcss/index-table-popup'>表格-弹出框</a></li>";
                        echo "      <li role='separator' class='divider'></li>";
                        echo "      <li><a href='/bootcss/index-form'>表单</a></li>";
                        echo "      <li role='separator' class='divider'></li>";
                        echo "      <li><a href='/bootcss/index-affix1'>固定附加栏</a></li>";                        
                        echo "  </ul>";
                        echo "</li>";
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 页面主体  -->
    <div class="container">
        <?= $content ?>
    </div>
</div>

<!-- 页脚  -->
<footer class="footer">
    <div class="container text-center">
        <p>&copy; Copyright 2014-<?= date('Y') ?> by 狸米科技</p>
        <p>All Rights Reserved.</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
