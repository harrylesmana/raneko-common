<?php

/**
 * Bootstrap for testing.
 * @author Harry Lesmana <harry.lesmana@msn.com>
 * @since 2022-04-04
 */
require_once(__DIR__ . "/../vendor/autoload.php");

// Report all PHP errors
error_reporting(E_ALL);

use \Raneko\Common\Helper as Helper;

Helper::setConfigIni(__DIR__ . DIRECTORY_SEPARATOR . "app.ini");
Helper::setRootPath(__DIR__ . "/..");
Helper::setEnvironment(Helper::getConfig("APP_ENV"));