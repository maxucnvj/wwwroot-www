<?php
header("Content-type: text/html; charset=utf-8"); // utf-8 输出
define('_FILEPATH', dirname(__FILE__).'/application/');
include _FILEPATH.'common/function.php'; // 引入公共函数
$config = include _FILEPATH.'common/config/config.inc.php'; //加载配置信息
define('_CONFIG', serialize($config));
define('_PREFIX', 'clofood_');//cookie 前辍
session_start();
// 定义控制器名
if (empty($_GET['c'])) { // 控制器
	define('_MODEL', 'index');
} else {
	define('_MODEL', $_GET['c']);
}
// 定义方法名
if (empty($_GET['a'])) { // 控制器
	define('_ACTION', 'run');
} else {
	define('_ACTION', $_GET['a']);
}

if (!file_exists(_FILEPATH . 'controller/' . _MODEL . '.class.php')) {
	echo '非法的提交,请查看来源';
	die;
}
include _FILEPATH . 'controller/' . _MODEL . '.class.php';
$model = _MODEL;
$models = new $model(); // 动态调用类
if (! method_exists($models, _ACTION)) { // 检查类方法是否存在
	echo '类方法不存在';
	die;
}
$action =_ACTION;
$models->$action(); // 调用方法

?>