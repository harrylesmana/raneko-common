<?php

/**
 * Bootstrap for testing.
 * @author Harry Lesmana <harry.lesmana@msn.com>
 * @since 2022-04-04
 */
require_once(__DIR__ . "/../vendor/autoload.php");

// Report all PHP errors
error_reporting(E_ALL);

\Raneko\Common\Helper::setConfigIni(__DIR__ . DIRECTORY_SEPARATOR . "app.ini");
\Raneko\Common\Helper::setRootPath(__DIR__ . "/..");
