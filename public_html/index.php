<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

define ('DS', DIRECTORY_SEPARATOR);
define ('SITE_PATH_ROOT', dirname(__FILE__) . DS . '..' . DS); //
define ('SITE_PATH_SITE', SITE_PATH_ROOT . 'public_html' . DS); // public_html/
define ('SITE_PATH_PROTECTED', SITE_PATH_SITE . 'protected' . DS); // public_html/protected/
define ('SITE_PATH_CONFIG', SITE_PATH_PROTECTED . 'config' . DS); // public_html/protected/config/
define ('SITE_PATH_EXTENSION', SITE_PATH_PROTECTED . 'extensions' . DS); // public_html/protected/extensions/

$sYii = SITE_PATH_ROOT . 'framework-1.1.14/yii.php';
$sConfig = SITE_PATH_CONFIG . 'site_main.php';

define('YII_DEBUG', true);
// defined('YII_DEBUG') or

require_once($sYii);

Yii::createWebApplication($sConfig)->run();