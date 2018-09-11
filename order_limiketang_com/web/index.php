<?php
if(isset($_SERVER["HTTP_USER_AGENT"]) && strpos($_SERVER["HTTP_USER_AGENT"], "6498e7036d83565cdb3cc6a5c741590f") !== false) {
	defined('YII_DEBUG') or define('YII_DEBUG', true);
	defined('YII_ENV') or define('YII_ENV', 'dev');
}else {
	// if(@$_GET['type'] == 1){
	// 	defined('YII_DEBUG') or define('YII_DEBUG',true);
	// }else{
		defined('YII_DEBUG') or define('YII_DEBUG',true);
	// }
}

require(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../vendor/yiisoft/yii2/Yii.php');
require(__DIR__ . '/../../common/config/bootstrap.php');
require(__DIR__ . '/../config/bootstrap.php');
require(__DIR__ . '/../../limicommon/config/bootstrap.php');

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/main.php'),
    require(__DIR__ . '/../../common/config/main-local.php'),
    require(__DIR__ . '/../config/main.php'),
    require(__DIR__ . '/../config/main-local.php'),
    require(__DIR__ . '/../../limicommon/config/main.php')
);
#判断当前环境为集成开发或本地开发，设置支付配置开关为测试配置
if( ( defined('INTEGRATED_ENV') && INTEGRATED_ENV ) || ( defined('LOCAL_ENV') && LOCAL_ENV ) )
{
    defined('PAY_DEV') or define('PAY_DEV', true);
}
$application = new yii\web\Application($config);
$application->run();
