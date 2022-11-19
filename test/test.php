<?php

require_once "bootstrap.php";

echo "Testing UUID" . PHP_EOL;
$uuid = \Raneko\Common\Helper::uuid4();
$uuidBin = \Raneko\Common\Helper::uuid4ToBin($uuid);
echo "UUID String            : " . $uuid . PHP_EOL;
echo "UUID String To Bin(16) : " . $uuidBin . PHP_EOL;
echo "UUID Bin(16) to String : " . \Raneko\Common\Helper::uuid4FromBin($uuidBin) . PHP_EOL;
echo PHP_EOL . PHP_EOL;

echo "Testing Config" . PHP_EOL;
echo "APP_ENV           : " . \Raneko\Common\Helper::getConfig("APP_ENV") . PHP_EOL;
echo "APP_TEST_CONFIG_1 : " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_1") . PHP_EOL;
echo "APP_TEST_CONFIG_2 : " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_2") . PHP_EOL;
echo PHP_EOL . PHP_EOL;
