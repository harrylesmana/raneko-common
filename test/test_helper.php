<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . "bootstrap.php";

use \Raneko\Common\Helper as Helper;

echo "--- Testing UUID ---" . PHP_EOL;
$uuid = Helper::uuid4();
$uuidBin = Helper::uuid4ToBin($uuid);
echo "UUID String            : " . $uuid . PHP_EOL;
echo "UUID String To Bin(16) : " . $uuidBin . PHP_EOL;
echo "UUID Bin(16) to String : " . Helper::uuid4FromBin($uuidBin) . PHP_EOL;
echo PHP_EOL;

echo "--- Testing Config ---" . PHP_EOL;
echo "APP_ENV           : " . Helper::getConfig("APP_ENV") . PHP_EOL;
echo "APP_TEST_CONFIG_1 : " . Helper::getConfig("APP_TEST_CONFIG_1") . PHP_EOL;
echo "APP_TEST_CONFIG_2 : " . Helper::getConfig("APP_TEST_CONFIG_2") . PHP_EOL;
echo PHP_EOL;

echo "--- Testing Environment ---" . PHP_EOL;
echo "Environment            : " . Helper::getEnvironment() . " (" . Helper::isEnvironmentProduction() . ")" . PHP_EOL;
Helper::setEnvironment("dev");
echo "Environment (modified) : " . Helper::getEnvironment() . " (" . Helper::isEnvironmentProduction() . ")" . PHP_EOL;
echo PHP_EOL;

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
$targetArray = Helper::transferArray($sourceArray, $mapArray);
echo "Source Array : " . PHP_EOL;
var_dump($sourceArray);
echo "Target Array : " . PHP_EOL;
var_dump($targetArray);
echo PHP_EOL;

echo "--- Testing GIT version ---" . PHP_EOL;
echo "APP version         : " . Helper::getVersion() . " " . PHP_EOL;
echo "APP version (other) : " . Helper::getVersion("C:/VHOST/source-php/raneko-stg") . PHP_EOL;
echo PHP_EOL;
