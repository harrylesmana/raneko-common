<?php

require_once "bootstrap.php";

echo "--- Testing UUID ---" . PHP_EOL;
$uuid = \Raneko\Common\Helper::uuid4();
$uuidBin = \Raneko\Common\Helper::uuid4ToBin($uuid);
echo "UUID String            : " . $uuid . PHP_EOL;
echo "UUID String To Bin(16) : " . $uuidBin . PHP_EOL;
echo "UUID Bin(16) to String : " . \Raneko\Common\Helper::uuid4FromBin($uuidBin) . PHP_EOL;
echo PHP_EOL . PHP_EOL;

echo "--- Testing Config ---" . PHP_EOL;
echo "APP_ENV           : " . \Raneko\Common\Helper::getConfig("APP_ENV") . PHP_EOL;
echo "APP_TEST_CONFIG_1 : " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_1") . PHP_EOL;
echo "APP_TEST_CONFIG_2 : " . \Raneko\Common\Helper::getConfig("APP_TEST_CONFIG_2") . PHP_EOL;
echo PHP_EOL . PHP_EOL;

echo "--- Testing Array Transfer ---" . PHP_EOL;
$sourceArray = [
    "first_name" => "John ",
    "middle_name" => "",
    "last_name" => "Doe",
    "salutation" => null,
    "email" => "john.doe@example.net",
    "mobile_phone_country_code" => "65",
    "mobile_phone" => "88887654",
    "phone_country_code" => "65",
    "phone" => "12348888"
];
$mapArray = [
    "first_name",
    "last_name",
    "middle_name",
    "salutation",
    "mobile_phone_country_code",
    "mobile_phone",
    "phone_country_code",
    "phone"
];
$targetArray = \Raneko\Common\Helper::transferArray($sourceArray, $mapArray);
echo "Source Array : " . PHP_EOL;
var_dump($sourceArray);
echo "Target Array : " . PHP_EOL;
var_dump($targetArray);

echo "--- Testing GIT version ---" . PHP_EOL;
echo "APP version : " . \Raneko\Common\Helper::getVersion() . PHP_EOL;