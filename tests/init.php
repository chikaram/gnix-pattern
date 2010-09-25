<?php
set_include_path(get_include_path() . PATH_SEPARATOR . '/data/App/Shared');

require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
$autoloader->setFallbackAutoloader(true);

mb_internal_encoding('UTF-8');

error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);