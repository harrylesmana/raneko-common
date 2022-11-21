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

echo "Testing Array Transfer" . PHP_EOL;
$sourceArray = [
    "first_name" => "John",
    "last_name" => "Doe",
    "mobile_phone" => "12345678",
    "unwanted_field" => "Not Wanted!"
];
$mapArray = [
    "first_name",
    "last_name",
    "mobile_phone" => "phone"
];
$targetArray = \Raneko\Common\Helper::transferArray($sourceArray, $mapArray);
echo "Source Array : " . PHP_EOL;
var_dump($sourceArray);
echo "Target Array : " . PHP_EOL;
var_dump($targetArray);
