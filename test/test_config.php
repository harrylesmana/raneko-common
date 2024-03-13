<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

use \Raneko\Common\Helper as Helper;

echo Helper::getConfig("APP_ENV") . PHP_EOL;
echo Helper::getConfig("APP_TEST_CONFIG_1") . PHP_EOL;
echo Helper::getConfig("APP_TEST_CONFIG_2") . PHP_EOL;