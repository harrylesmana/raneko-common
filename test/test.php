<?php

require_once "bootstrap.php";

echo "Testing UUID" . PHP_EOL;
echo \Raneko\Common\Helper::uuid4();
echo PHP_EOL . PHP_EOL;

echo "Testing Config" . PHP_EOL;
echo "APP_ENV: " . \Raneko\Common\Helper::getConfig("APP_ENV") . PHP_EOL;
echo "APP_TEST_CONFIG_1: " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_1") . PHP_EOL;
echo "APP_TEST_CONFIG_2: " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_2") . PHP_EOL;
echo PHP_EOL . PHP_EOL;
